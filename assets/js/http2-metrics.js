/**
 * HTTP/2 Performance Metrics
 * 
 * Este script detecta o uso de HTTP/2 e HTTP/3 e registra métricas de desempenho
 * para análise e otimização contínua.
 */

// Namespace para o módulo de métricas
const HTTP2Metrics = {
    
    // Configurações
    config: {
        debug: true,
        sendMetrics: true,
        metricsEndpoint: '/api/metrics',
        sampleRate: 0.1 // 10% dos usuários
    },
    
    // Status da detecção
    status: {
        http2Supported: false,
        http3Supported: false,
        protocolsDetected: false,
        resourcesLoaded: 0,
        resourcesViaHTTP2: 0,
        resourcesViaHTTP3: 0,
        resourcesViaHTTP1: 0
    },
    
    // Métricas coletadas
    metrics: {
        navigationTiming: {},
        resourceTiming: [],
        protocolInfo: {},
        userAgent: navigator.userAgent,
        connection: {}
    },
    
    /**
     * Inicializa o módulo
     */
    init: function() {
        // Verificar suporte à Performance API
        if (!window.performance || !window.performance.getEntriesByType) {
            this.log('Performance API não suportada');
            return;
        }
        
        // Verificar taxa de amostragem (para não coletar dados de todos os usuários)
        if (Math.random() > this.config.sampleRate) {
            this.log('Usuário não está na amostra para coleta de métricas');
            return;
        }
        
        // Adicionar eventos
        window.addEventListener('load', () => this.onLoad());
        
        // Coletar informações de conexão
        this.collectConnectionInfo();
        
        this.log('HTTP2Metrics inicializado');
    },
    
    /**
     * Quando a página terminar de carregar
     */
    onLoad: function() {
        // Aguardar um momento para que todos os recursos sejam carregados
        setTimeout(() => {
            this.detectProtocols();
            this.collectNavigationTiming();
            this.collectResourceTiming();
            
            if (this.config.sendMetrics) {
                this.sendMetrics();
            }
            
            this.logSummary();
        }, 1000);
    },
    
    /**
     * Coleta informações sobre a conexão do navegador
     */
    collectConnectionInfo: function() {
        if (navigator.connection) {
            this.metrics.connection = {
                effectiveType: navigator.connection.effectiveType,
                rtt: navigator.connection.rtt,
                downlink: navigator.connection.downlink,
                saveData: navigator.connection.saveData
            };
        }
    },
    
    /**
     * Detecta protocolos HTTP utilizados
     */
    detectProtocols: function() {
        const resources = performance.getEntriesByType('resource');
        
        // Zerar contadores
        this.status.resourcesLoaded = resources.length;
        this.status.resourcesViaHTTP2 = 0;
        this.status.resourcesViaHTTP3 = 0;
        this.status.resourcesViaHTTP1 = 0;
        
        // Verificar recursos
        for (let i = 0; i < resources.length; i++) {
            const resource = resources[i];
            
            // nextHopProtocol pode ser h2, h3, http/1.1, etc.
            if (resource.nextHopProtocol) {
                if (resource.nextHopProtocol === 'h2') {
                    this.status.http2Supported = true;
                    this.status.resourcesViaHTTP2++;
                } else if (resource.nextHopProtocol === 'h3') {
                    this.status.http3Supported = true;
                    this.status.resourcesViaHTTP3++;
                } else if (resource.nextHopProtocol.indexOf('http/1') === 0) {
                    this.status.resourcesViaHTTP1++;
                }
            }
        }
        
        this.status.protocolsDetected = true;
        
        // Calcular porcentagens
        this.metrics.protocolInfo = {
            http2Supported: this.status.http2Supported,
            http3Supported: this.status.http3Supported,
            resourcesTotal: this.status.resourcesLoaded,
            resourcesViaHTTP2: this.status.resourcesViaHTTP2,
            resourcesViaHTTP3: this.status.resourcesViaHTTP3,
            resourcesViaHTTP1: this.status.resourcesViaHTTP1,
            percentHTTP2: this.status.resourcesLoaded > 0 ? 
                (this.status.resourcesViaHTTP2 / this.status.resourcesLoaded * 100).toFixed(2) : 0,
            percentHTTP3: this.status.resourcesLoaded > 0 ? 
                (this.status.resourcesViaHTTP3 / this.status.resourcesLoaded * 100).toFixed(2) : 0,
            percentHTTP1: this.status.resourcesLoaded > 0 ? 
                (this.status.resourcesViaHTTP1 / this.status.resourcesLoaded * 100).toFixed(2) : 0
        };
        
        return this.metrics.protocolInfo;
    },
    
    /**
     * Coleta métricas de timing de navegação
     */
    collectNavigationTiming: function() {
        const navEntry = performance.getEntriesByType('navigation')[0];
        
        if (!navEntry) return;
        
        this.metrics.navigationTiming = {
            fetchStart: navEntry.fetchStart,
            domContentLoadedEventEnd: navEntry.domContentLoadedEventEnd,
            loadEventEnd: navEntry.loadEventEnd,
            domComplete: navEntry.domComplete,
            timeToFirstByte: navEntry.responseStart - navEntry.requestStart,
            domContentLoaded: navEntry.domContentLoadedEventEnd - navEntry.fetchStart,
            loadTime: navEntry.loadEventEnd - navEntry.fetchStart,
            domInteractive: navEntry.domInteractive - navEntry.fetchStart,
            firstPaint: 0
        };
        
        // First Paint se disponível
        if (window.performance.getEntriesByType &&
            window.performance.getEntriesByName('first-paint').length) {
            this.metrics.navigationTiming.firstPaint = 
                window.performance.getEntriesByName('first-paint')[0].startTime;
        }
        
        return this.metrics.navigationTiming;
    },
    
    /**
     * Coleta métricas detalhadas sobre o carregamento de recursos
     */
    collectResourceTiming: function() {
        const resources = performance.getEntriesByType('resource');
        
        // Limitar quantidade de recursos para não ficar muito grande
        const maxResources = 30;
        const sampleSize = Math.min(resources.length, maxResources);
        
        for (let i = 0; i < sampleSize; i++) {
            const res = resources[i];
            
            // Pegar apenas dados relevantes para não sobrecarregar
            this.metrics.resourceTiming.push({
                name: res.name.split('?')[0], // Remover query string
                protocol: res.nextHopProtocol,
                initiatorType: res.initiatorType,
                duration: res.duration,
                transferSize: res.transferSize,
                encodedBodySize: res.encodedBodySize,
                decodedBodySize: res.decodedBodySize
            });
        }
        
        return this.metrics.resourceTiming;
    },
    
    /**
     * Envia métricas para o servidor
     */
    sendMetrics: function() {
        try {
            fetch(this.config.metricsEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    timestamp: new Date().toISOString(),
                    page: window.location.pathname,
                    metrics: this.metrics
                })
            }).catch(e => this.log('Erro ao enviar métricas:', e));
        } catch (e) {
            this.log('Erro ao enviar métricas:', e);
        }
    },
    
    /**
     * Exibe um resumo no console
     */
    logSummary: function() {
        if (!this.config.debug) return;
        
        console.group('HTTP/2 Metrics Summary');
        console.log('Protocolo HTTP/2 suportado:', this.status.http2Supported);
        console.log('Protocolo HTTP/3 suportado:', this.status.http3Supported);
        console.log('Total de recursos:', this.status.resourcesLoaded);
        console.log('Recursos via HTTP/2:', this.status.resourcesViaHTTP2);
        console.log('Recursos via HTTP/3:', this.status.resourcesViaHTTP3);
        console.log('Recursos via HTTP/1.x:', this.status.resourcesViaHTTP1);
        
        if (this.metrics.navigationTiming.loadTime) {
            console.log('Tempo de carregamento da página:', 
                (this.metrics.navigationTiming.loadTime / 1000).toFixed(2) + 's');
        }
        
        if (this.metrics.navigationTiming.timeToFirstByte) {
            console.log('Time to First Byte (TTFB):', 
                (this.metrics.navigationTiming.timeToFirstByte).toFixed(2) + 'ms');
        }
        
        console.groupEnd();
    },
    
    /**
     * Utilitário para logging
     */
    log: function(...args) {
        if (this.config.debug) {
            console.log('[HTTP2Metrics]', ...args);
        }
    }
};

// Inicializar automaticamente
document.addEventListener('DOMContentLoaded', function() {
    HTTP2Metrics.init();
}); 
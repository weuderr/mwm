/**
 * Script para melhorar a experiência do usuário e prevenir cliques mortos
 * MWM Softwares
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Melhorar o feedback visual para elementos clicáveis
    enhanceClickables();
    
    // 2. Melhorar a navegação com ancoragem suave
    setupSmoothScrolling();
    
    // 3. Detectar e corrigir cliques mortos
    detectDeadClicks();
    
    // 4. Melhorar o carregamento de conteúdo
    setupLazyLoading();
    
    // 5. Inicializar carrosséis e componentes interativos
    initializeComponents();
    
    // 6. Registrar eventos do Meta Pixel
    setupMetaPixelEvents();
    
    // 7. Otimizar para visitantes do Facebook
    optimizeForFacebookVisitors();
});

/**
 * Melhora o feedback visual para elementos clicáveis
 */
function enhanceClickables() {
    // Encontrar todos os elementos que devem ser clicáveis
    const clickableElements = document.querySelectorAll('a, button, .card, .clickable, [role="button"]');
    
    clickableElements.forEach(element => {
        // Verificar se já tem a classe no-hover para evitar duplicação
        if (element.classList.contains('no-hover')) {
            return;
        }
        
        // Adicionar indicador visual ao passar o mouse
        element.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.2s ease';
            if (!this.classList.contains('no-hover')) {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            }
        });
        
        // Remover indicador visual ao sair
        element.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
        
        // Adicionar feedback de clique
        element.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(1px)';
        });
        
        element.addEventListener('mouseup', function() {
            this.style.transform = '';
        });
        
        // Adicionar um efeito de toque para dispositivos móveis
        element.addEventListener('touchstart', function() {
            this.style.transform = 'translateY(1px)';
        }, { passive: true });
        
        element.addEventListener('touchend', function() {
            this.style.transform = '';
        }, { passive: true });
    });
    
    // Adicionar indicador visual para elementos ativos na página (como menu ativo)
    const currentPath = window.location.pathname;
    document.querySelectorAll('a[href]').forEach(link => {
        if (link.getAttribute('href') === currentPath || 
            (currentPath === '/' && link.getAttribute('href') === '') ||
            (link.getAttribute('href') !== '/' && currentPath.includes(link.getAttribute('href')))) {
            link.classList.add('active-link');
        }
    });
}

/**
 * Configura rolagem suave para links âncora
 */
function setupSmoothScrolling() {
    // Encontrar todos os links com # que não são apenas '#'
    const anchorLinks = document.querySelectorAll('a[href*="#"]:not([href="#"])');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Verificar se o link é interno e tem uma âncora
            if (
                location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname
            ) {
                const target = document.querySelector(this.hash);
                if (target) {
                    e.preventDefault();
                    
                    // Registrar o clique se o Facebook Pixel estiver disponível
                    if (typeof fbq !== 'undefined') {
                        fbq('trackCustom', 'AnchorLinkClick', {
                            target: this.hash,
                            text: this.textContent.trim()
                        });
                    }
                    
                    window.scrollTo({
                        top: target.offsetTop - 70, // 70px de compensação para a barra de navegação fixa
                        behavior: 'smooth'
                    });
                    
                    // Atualizar URL sem recarregar a página
                    history.pushState(null, null, this.hash);
                    
                    // Destacar visualmente a seção de destino
                    target.classList.add('highlight-section');
                    setTimeout(() => {
                        target.classList.remove('highlight-section');
                    }, 1500);
                }
            }
        });
    });
}

/**
 * Detecta e corrige cliques mortos
 */
function detectDeadClicks() {
    // Contador para rastrear cliques sem ação
    let deadClickCounter = {};
    let deadClickAreas = [];
    
    document.addEventListener('click', function(e) {
        // Verificar se o clique foi em um elemento não interativo
        if (
            !e.target.closest('a') &&
            !e.target.closest('button') &&
            !e.target.closest('input') &&
            !e.target.closest('select') &&
            !e.target.closest('textarea') &&
            !e.target.closest('[role="button"]') &&
            !e.target.closest('.clickable') &&
            !e.target.closest('.card') &&
            !e.target.closest('label')
        ) {
            // Registrar coordenadas do clique com uma tolerância
            const clickX = Math.round(e.clientX / 10) * 10;
            const clickY = Math.round(e.clientY / 10) * 10;
            const clickId = `${clickX}-${clickY}`;
            
            if (!deadClickCounter[clickId]) {
                deadClickCounter[clickId] = 0;
            }
            
            deadClickCounter[clickId]++;
            
            // Verificar se há múltiplos cliques na mesma área
            if (deadClickCounter[clickId] >= 2) {
                // Registrar áreas com cliques mortos para análise posterior
                if (!deadClickAreas.find(area => area.id === clickId)) {
                    deadClickAreas.push({
                        id: clickId,
                        x: e.clientX,
                        y: e.clientY,
                        count: deadClickCounter[clickId],
                        timestamp: new Date().toISOString(),
                        pageUrl: window.location.href,
                        elementClicked: e.target.tagName
                    });
                    
                    // Registrar para análise se o Facebook Pixel estiver disponível
                    if (typeof fbq !== 'undefined') {
                        fbq('trackCustom', 'DeadClick', {
                            x: e.clientX,
                            y: e.clientY,
                            target: e.target.tagName,
                            pageUrl: window.location.href
                        });
                    }
                }
                
                const nearbyClickable = findNearbyClickable(e.clientX, e.clientY);
                
                if (nearbyClickable) {
                    // Destacar visualmente o elemento para o usuário
                    nearbyClickable.classList.add('highlight-clickable');
                    
                    // Adicionar uma dica sobre o elemento interativo
                    const tooltip = document.createElement('div');
                    tooltip.className = 'dead-click-tooltip';
                    tooltip.style.position = 'absolute';
                    tooltip.style.left = `${e.clientX}px`;
                    tooltip.style.top = `${e.clientY - 30}px`;
                    tooltip.style.backgroundColor = 'rgba(0, 123, 255, 0.9)';
                    tooltip.style.color = 'white';
                    tooltip.style.padding = '5px 10px';
                    tooltip.style.borderRadius = '3px';
                    tooltip.style.fontSize = '12px';
                    tooltip.style.zIndex = '1000';
                    tooltip.style.pointerEvents = 'none';
                    tooltip.textContent = 'Clique aqui';
                    document.body.appendChild(tooltip);
                    
                    setTimeout(() => {
                        nearbyClickable.classList.remove('highlight-clickable');
                        if (tooltip.parentNode) {
                            tooltip.parentNode.removeChild(tooltip);
                        }
                    }, 3000);
                    
                    // Limpar o contador
                    deadClickCounter[clickId] = 0;
                }
            }
        }
    });
    
    // Enviar as áreas de cliques mortos para análise a cada 30 segundos
    setInterval(() => {
        if (deadClickAreas.length > 0 && typeof fbq !== 'undefined') {
            fbq('trackCustom', 'DeadClickAreas', {
                areas: JSON.stringify(deadClickAreas),
                count: deadClickAreas.length
            });
            
            // Limpar o array após o envio
            deadClickAreas = [];
        }
    }, 30000);
}

/**
 * Encontra o elemento clicável mais próximo das coordenadas fornecidas
 */
function findNearbyClickable(x, y) {
    const clickables = document.querySelectorAll('a, button, [role="button"], .clickable, .card, input[type="submit"], input[type="button"]');
    let closestElement = null;
    let minDistance = 50; // Distância máxima em pixels
    
    clickables.forEach(element => {
        const rect = element.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        
        const distance = Math.sqrt(Math.pow(centerX - x, 2) + Math.pow(centerY - y, 2));
        
        if (distance < minDistance) {
            minDistance = distance;
            closestElement = element;
        }
    });
    
    return closestElement;
}

/**
 * Configura carregamento preguiçoso para imagens e conteúdo
 */
function setupLazyLoading() {
    // Verificar se o navegador suporta IntersectionObserver
    if ('IntersectionObserver' in window) {
        const lazyElements = document.querySelectorAll('.lazy-load, img:not([loading="eager"])');
        
        // Adicionar atributo loading="lazy" para navegadores que suportam
        lazyElements.forEach(element => {
            if (element.tagName === 'IMG' && !element.hasAttribute('loading')) {
                element.setAttribute('loading', 'lazy');
            }
        });
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // Se for uma imagem
                    if (element.tagName === 'IMG') {
                        if (element.dataset.src) {
                            element.src = element.dataset.src;
                        }
                        if (element.dataset.srcset) {
                            element.srcset = element.dataset.srcset;
                        }
                    } 
                    // Se for um elemento de fundo
                    else if (element.dataset.background) {
                        element.style.backgroundImage = `url('${element.dataset.background}')`;
                    }
                    
                    // Adicionar classe loaded para animar entrada
                    element.classList.add('loaded');
                    element.classList.remove('lazy-load');
                    observer.unobserve(element);
                }
            });
        }, {
            rootMargin: '200px 0px', // Carregar antes de entrar na viewport
            threshold: 0.01
        });
        
        lazyElements.forEach(element => {
            observer.observe(element);
        });
    }
}

/**
 * Inicializa componentes interativos
 */
function initializeComponents() {
    // Inicializar Owl Carousel se estiver presente (agora é carregado sob demanda no footer)
    
    // Inicializar tooltips se o Bootstrap estiver presente
    setTimeout(() => {
        if (typeof $.fn.tooltip !== 'undefined') {
            $('[data-toggle="tooltip"]').tooltip();
        }
    }, 1000); // Atrasar para não bloquear o carregamento
    
    // Tornar cards clicáveis
    const cards = document.querySelectorAll('.card:not(.non-clickable)');
    cards.forEach(card => {
        const link = card.querySelector('a');
        if (link) {
            card.classList.add('clickable');
            card.addEventListener('click', function(e) {
                // Não seguir o link se o clique foi em um botão ou outro link
                if (
                    !e.target.closest('button') && 
                    !e.target.closest('a') || 
                    e.target.closest('a') === link
                ) {
                    // Registrar o clique no card
                    if (typeof fbq !== 'undefined') {
                        fbq('trackCustom', 'CardClick', {
                            cardTitle: card.querySelector('.card-title')?.textContent.trim() || '',
                            linkHref: link.getAttribute('href')
                        });
                    }
                    
                    link.click();
                }
            });
        }
    });
    
    // Adicionar tratamento especial para elementos que costumam receber cliques mortos
    document.querySelectorAll('.section-title, h1, h2, h3, h4, h5, h6').forEach(element => {
        if (!element.closest('a') && !element.querySelector('a')) {
            element.style.cursor = 'default';
            
            // Se o título estiver próximo a um link ou botão, torná-lo clicável para esse elemento
            const nearbyLink = findNearbyInteractive(element);
            if (nearbyLink) {
                element.classList.add('clickable');
                element.style.cursor = 'pointer';
                
                element.addEventListener('click', function() {
                    nearbyLink.click();
                });
            }
        }
    });
}

/**
 * Encontra o elemento interativo mais próximo de um elemento dado
 */
function findNearbyInteractive(element) {
    // Verificar elementos irmãos
    let sibling = element.nextElementSibling;
    while (sibling) {
        const interactive = sibling.querySelector('a, button, input[type="submit"]');
        if (interactive) {
            return interactive;
        }
        sibling = sibling.nextElementSibling;
    }
    
    // Verificar elementos pai
    let parent = element.parentNode;
    if (parent && parent !== document.body) {
        const interactive = parent.querySelector('a, button, input[type="submit"]');
        if (interactive && interactive !== element && !element.contains(interactive)) {
            return interactive;
        }
    }
    
    return null;
}

/**
 * Configura eventos adicionais para o Meta Pixel
 */
function setupMetaPixelEvents() {
    // Verificar se o fbq está disponível
    if (typeof fbq !== 'undefined') {
        // Rastrear cliques em seções específicas
        document.querySelectorAll('.track-click, .btn, .nav-link').forEach(element => {
            element.addEventListener('click', function() {
                const eventName = this.dataset.eventName || 'ElementClick';
                const eventCategory = this.dataset.eventCategory || '';
                
                fbq('trackCustom', eventName, {
                    content_category: eventCategory,
                    content_name: this.textContent.trim(),
                    element_type: this.tagName,
                    element_class: this.className,
                    url: window.location.href
                });
            });
        });
        
        // Rastrear tempo de permanência na página
        let startTime = new Date();
        let minTimeTracked = false;
        
        // Rastrear o tempo na página a cada 30 segundos
        setInterval(() => {
            const timeSpent = Math.floor((new Date() - startTime) / 1000); // Tempo em segundos
            
            // Rastrear apenas após 30 segundos e depois a cada minuto
            if (timeSpent >= 30 && !minTimeTracked) {
                fbq('trackCustom', 'MinTimeOnPage', {
                    seconds: timeSpent,
                    page: window.location.pathname
                });
                minTimeTracked = true;
            } else if (timeSpent >= 60 && timeSpent % 60 === 0) {
                fbq('trackCustom', 'TimeOnPage', {
                    minutes: Math.floor(timeSpent / 60),
                    page: window.location.pathname
                });
            }
        }, 30000);
        
        // Também rastrear ao sair da página
        window.addEventListener('beforeunload', function() {
            const endTime = new Date();
            const timeSpent = Math.floor((endTime - startTime) / 1000); // Tempo em segundos
            
            fbq('trackCustom', 'LeavePageTime', {
                seconds: timeSpent,
                page: window.location.pathname
            });
        });
        
        // Rastrear rolagem profunda
        let maxScroll = 0;
        let lastTrackedPercentage = 0;
        
        window.addEventListener('scroll', function() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const clientHeight = window.innerHeight || document.documentElement.clientHeight;
            
            const scrollPercentage = Math.floor((scrollTop / (scrollHeight - clientHeight)) * 100);
            
            if (scrollPercentage > maxScroll) {
                maxScroll = scrollPercentage;
                
                // Rastrear marcos de rolagem (25%, 50%, 75%, 90%, 100%)
                const thresholds = [25, 50, 75, 90, 100];
                for (const threshold of thresholds) {
                    if (maxScroll >= threshold && lastTrackedPercentage < threshold) {
                        fbq('trackCustom', 'ScrollDepth', {
                            percentage: threshold,
                            page: window.location.pathname
                        });
                        lastTrackedPercentage = threshold;
                        break; // Rastrear apenas um milestone por vez
                    }
                }
            }
        });
        
        // Rastrear formulários submissões
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const formId = this.id || this.getAttribute('name') || 'unknown';
                const formAction = this.getAttribute('action') || 'unknown';
                
                fbq('trackCustom', 'FormSubmission', {
                    form_id: formId,
                    form_action: formAction,
                    page: window.location.pathname
                });
            });
        });
    }
}

/**
 * Otimiza a experiência para visitantes vindos do Facebook
 */
function optimizeForFacebookVisitors() {
    // Verificar se o usuário veio do Facebook
    const fromFacebook = document.referrer.includes('facebook.com') || localStorage.getItem('fromFacebook') === 'true';
    
    if (fromFacebook) {
        // Armazenar essa informação para uso em páginas subsequentes
        localStorage.setItem('fromFacebook', 'true');
        
        // Registrar o atributo de origem para o Pixel
        if (typeof fbq !== 'undefined') {
            fbq('trackCustom', 'FacebookReferral', {
                landing_page: window.location.pathname,
                referrer: document.referrer
            });
        }
        
        // Adicionar classe especial para visitantes do Facebook
        document.body.classList.add('facebook-visitor');
        
        // Destacar elementos importantes para visitantes do Facebook
        const importantElements = [
            '.hero-content',
            '.welcome-section',
            '.service-item',
            '.cta-section'
        ];
        
        importantElements.forEach(selector => {
            document.querySelectorAll(selector).forEach(element => {
                element.classList.add('welcome-highlight');
            });
        });
        
        // Adicionar eventos de rastreamento especiais para visitantes do Facebook
        document.querySelectorAll('a, button, .card, .clickable').forEach(element => {
            element.addEventListener('click', function() {
                if (typeof fbq !== 'undefined') {
                    fbq('trackCustom', 'FacebookVisitorInteraction', {
                        element_type: this.tagName,
                        element_text: this.textContent.trim(),
                        url: window.location.href
                    });
                }
            });
        });
    }
} 
// Configuração do Popup Inteligente
const popupConfig = {
    facebook: {
        title: 'Bem-vindo do Facebook!',
        message: 'Que bom ter você aqui! Temos uma oferta especial para visitantes do Facebook.',
        cta: 'Ver Oferta Especial',
        link: '/servicos#oferta-facebook'
    },
    instagram: {
        title: 'Olá, seguidor do Instagram!',
        message: 'Adoramos seu interesse! Confira nosso portfólio exclusivo.',
        cta: 'Ver Portfólio',
        link: '/portfolio'
    },
    default: {
        title: 'Bem-vindo à MWM!',
        message: 'Conheça nossas soluções em tecnologia e desenvolvimento.',
        cta: 'Conhecer Serviços',
        link: '/servicos'
    }
};

// Configuração do Chatbot
const chatbotConfig = {
    initialMessage: 'Olá! Como posso ajudar você hoje?',
    quickReplies: [
        {
            text: 'Quero um orçamento',
            action: 'showContactForm'
        },
        {
            text: 'Conhecer serviços',
            action: 'showServices'
        },
        {
            text: 'Suporte técnico',
            action: 'showSupport'
        }
    ],
    responses: {
        showContactForm: {
            message: 'Ótimo! Vou te ajudar com o orçamento. Qual serviço você precisa?',
            options: ['Site/Sistema Web', 'Aplicativo Mobile', 'Consultoria', 'Outro']
        },
        showServices: {
            message: 'Temos várias soluções disponíveis. Qual área mais te interessa?',
            options: ['Desenvolvimento Web', 'Apps Mobile', 'Consultoria em TI']
        },
        showSupport: {
            message: 'Como posso ajudar com suporte?',
            options: ['Reportar Problema', 'Dúvidas', 'Falar com Técnico']
        }
    }
};

// Classe do Popup Inteligente
class SmartPopup {
    constructor(config) {
        this.config = config;
        this.shown = false;
        this.createPopup();
        this.initializeEvents();
    }

    createPopup() {
        const popup = document.createElement('div');
        popup.className = 'smart-popup';
        popup.style.display = 'none';
        document.body.appendChild(popup);
        this.popup = popup;
    }

    showPopup(type = 'default') {
        if (this.shown || localStorage.getItem('popupShown')) return;

        const config = this.config[type] || this.config.default;
        this.popup.innerHTML = `
            <div class="popup-content animate__animated animate__fadeInUp">
                <button class="popup-close">&times;</button>
                <h3>${config.title}</h3>
                <p>${config.message}</p>
                <a href="${config.link}" class="popup-cta">${config.cta}</a>
            </div>
        `;

        this.popup.style.display = 'flex';
        this.shown = true;
        localStorage.setItem('popupShown', 'true');
    }

    initializeEvents() {
        this.popup.addEventListener('click', (e) => {
            if (e.target.classList.contains('popup-close')) {
                this.popup.style.display = 'none';
            }
        });

        // Detectar origem do usuário
        if (document.referrer.includes('facebook.com')) {
            setTimeout(() => this.showPopup('facebook'), 5000);
        } else if (document.referrer.includes('instagram.com')) {
            setTimeout(() => this.showPopup('instagram'), 5000);
        } else {
            setTimeout(() => this.showPopup('default'), 10000);
        }
    }
}

// Classe do Chatbot
class SimpleChat {
    constructor(config) {
        this.config = config;
        this.createChat();
        this.initializeEvents();
    }

    createChat() {
        const chat = document.createElement('div');
        chat.className = 'simple-chat';
        chat.innerHTML = `
            <button class="chat-toggle">
                <i class="fas fa-comments"></i>
            </button>
            <div class="chat-container" style="display: none;">
                <div class="chat-header">
                    <h4>Atendimento Online</h4>
                    <button class="chat-close">&times;</button>
                </div>
                <div class="chat-messages"></div>
                <div class="chat-input">
                    <div class="quick-replies"></div>
                </div>
            </div>
        `;
        document.body.appendChild(chat);
        this.chat = chat;
        this.messagesContainer = chat.querySelector('.chat-messages');
        this.quickReplies = chat.querySelector('.quick-replies');
    }

    addMessage(message, isUser = false) {
        const messageEl = document.createElement('div');
        messageEl.className = `chat-message ${isUser ? 'user' : 'bot'}`;
        messageEl.innerHTML = `<p>${message}</p>`;
        this.messagesContainer.appendChild(messageEl);
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
    }

    showQuickReplies(replies) {
        this.quickReplies.innerHTML = replies.map(reply => `
            <button class="quick-reply" data-action="${reply.action}">
                ${reply.text}
            </button>
        `).join('');
    }

    handleReply(action) {
        const response = this.config.responses[action];
        if (response) {
            this.addMessage(response.message);
            this.showOptions(response.options);
        }
    }

    showOptions(options) {
        const optionsHtml = options.map(option => `
            <button class="chat-option">${option}</button>
        `).join('');
        this.quickReplies.innerHTML = optionsHtml;
    }

    initializeEvents() {
        this.chat.querySelector('.chat-toggle').addEventListener('click', () => {
            const container = this.chat.querySelector('.chat-container');
            container.style.display = container.style.display === 'none' ? 'flex' : 'none';
            
            if (container.style.display === 'flex' && !this.initialized) {
                this.addMessage(this.config.initialMessage);
                this.showQuickReplies(this.config.quickReplies);
                this.initialized = true;
            }
        });

        this.chat.querySelector('.chat-close').addEventListener('click', () => {
            this.chat.querySelector('.chat-container').style.display = 'none';
        });

        this.quickReplies.addEventListener('click', (e) => {
            if (e.target.classList.contains('quick-reply')) {
                const action = e.target.dataset.action;
                const text = e.target.textContent;
                this.addMessage(text, true);
                this.handleReply(action);
            } else if (e.target.classList.contains('chat-option')) {
                const text = e.target.textContent;
                this.addMessage(text, true);
                this.addMessage('Ótimo! Um de nossos consultores entrará em contato em breve.');
                this.quickReplies.innerHTML = '';
            }
        });
    }
}

// Estilos para o Popup e Chatbot
const styles = `
    .smart-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        max-width: 400px;
        position: relative;
        text-align: center;
    }

    .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        border: none;
        background: none;
        font-size: 24px;
        cursor: pointer;
    }

    .popup-cta {
        display: inline-block;
        padding: 10px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        transition: all 0.3s ease;
    }

    .popup-cta:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }

    .simple-chat {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9998;
    }

    .chat-toggle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .chat-toggle:hover {
        transform: scale(1.1);
    }

    .chat-container {
        position: absolute;
        bottom: 70px;
        right: 0;
        width: 300px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-header {
        background: #007bff;
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-header h4 {
        margin: 0;
    }

    .chat-close {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }

    .chat-messages {
        padding: 15px;
        max-height: 300px;
        overflow-y: auto;
    }

    .chat-message {
        margin-bottom: 10px;
        max-width: 80%;
    }

    .chat-message.bot {
        margin-right: auto;
    }

    .chat-message.user {
        margin-left: auto;
    }

    .chat-message p {
        margin: 0;
        padding: 10px;
        border-radius: 10px;
        background: #f0f0f0;
    }

    .chat-message.user p {
        background: #007bff;
        color: white;
    }

    .chat-input {
        padding: 15px;
        border-top: 1px solid #eee;
    }

    .quick-replies {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .quick-reply, .chat-option {
        padding: 8px 15px;
        background: #f0f0f0;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quick-reply:hover, .chat-option:hover {
        background: #e0e0e0;
    }
`;

// Adicionar estilos ao documento
const styleSheet = document.createElement('style');
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);

// Inicializar componentes
document.addEventListener('DOMContentLoaded', () => {
    const popup = new SmartPopup(popupConfig);
    const chat = new SimpleChat(chatbotConfig);
}); 
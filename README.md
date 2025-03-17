# MWM Softwares - Site Institucional

Site institucional da MWM Softwares, desenvolvido em PHP com arquitetura MVC.

## Estrutura do Projeto

```
mwm/
├── .htaccess                # Configurações do Apache
├── index.php                # Ponto de entrada da aplicação
├── app/                     # Diretório principal da aplicação
│   ├── config/              # Configurações da aplicação
│   │   └── config.php       # Arquivo de configuração
│   ├── controllers/         # Controladores
│   │   ├── Controller.php   # Controlador base
│   │   ├── HomeController.php  # Controlador da página inicial
│   │   └── ContactController.php  # Controlador de contato
│   ├── helpers/             # Funções auxiliares
│   │   ├── Autoloader.php   # Carregador automático de classes
│   │   └── functions.php    # Funções auxiliares
│   ├── models/              # Modelos de dados
│   ├── views/               # Visualizações
│   │   ├── pages/           # Páginas do site
│   │   │   ├── home.php     # Página inicial
│   │   │   ├── sobre.php    # Página sobre
│   │   │   ├── servicos.php # Página serviços
│   │   │   ├── portfolio.php # Página portfólio
│   │   │   ├── contato.php  # Página contato
│   │   │   └── 404.php      # Página de erro 404
│   │   └── templates/       # Templates reutilizáveis
│   │       ├── header.php   # Cabeçalho
│   │       └── footer.php   # Rodapé
│   └── Router.php           # Roteador da aplicação
├── assets/                  # Arquivos estáticos
│   ├── css/                 # Estilos CSS
│   │   └── style.css        # Estilos personalizados
│   ├── js/                  # Scripts JavaScript
│   │   └── main.js          # Scripts personalizados
│   └── img/                 # Imagens
└── README.md                # Documentação do projeto
```

## Requisitos

- PHP 7.4 ou superior
- Servidor web (Apache, Nginx)
- Módulo de reescrita de URL habilitado (mod_rewrite para Apache)

## Instalação

1. Clone o repositório para o diretório do seu servidor web:
   ```
   git clone https://github.com/seu-usuario/mwm-site.git
   ```

2. Configure o servidor web para apontar para o diretório do projeto.

3. Certifique-se de que o módulo de reescrita de URL está habilitado.

4. Ajuste as configurações no arquivo `app/config/config.php` conforme necessário.

## Configuração

Edite o arquivo `app/config/config.php` para configurar:

- URL base do site
- Configurações de e-mail
- Configurações de ambiente (desenvolvimento/produção)

## Desenvolvimento

### Adicionar Nova Página

1. Crie um novo método no controlador apropriado (ou crie um novo controlador).
2. Crie o arquivo de visualização em `app/views/pages/`.
3. Adicione a rota no método `registerRoutes()` da classe `Router`.

### Estilos e Scripts

- Adicione estilos personalizados em `assets/css/style.css`.
- Adicione scripts personalizados em `assets/js/main.js`.

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo LICENSE para detalhes.

## Contato

MWM Softwares - mwmechnology@gmail.com 
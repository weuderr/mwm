<?php
$heroItems = [
    [
        'title' => 'Desenvolvimento Web Profissional',
        'subtitle' => 'Criamos soluções web modernas e responsivas',
        'cta' => 'Solicitar Orçamento',
        'cta_link' => base_url('contato'),
        'image' => asset_url('img/hero/web-dev.webp'),
        'bg_class' => 'bg-primary'
    ],
    [
        'title' => 'Aplicativos Mobile Inovadores',
        'subtitle' => 'Apps nativos e híbridos para iOS e Android',
        'cta' => 'Conhecer Soluções',
        'cta_link' => base_url('servicos'),
        'image' => asset_url('img/hero/mobile-dev.webp'),
        'bg_class' => 'bg-success'
    ],
    [
        'title' => 'Consultoria em TI',
        'subtitle' => 'Expertise técnica para seu negócio crescer',
        'cta' => 'Falar com Especialista',
        'cta_link' => base_url('contato'),
        'image' => asset_url('img/hero/consulting.webp'),
        'bg_class' => 'bg-info'
    ]
];
?>

<div class="hero-section">
    <div class="hero-slider owl-carousel">
        <?php foreach ($heroItems as $item): ?>
        <div class="hero-item <?= $item['bg_class'] ?>">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6 hero-content" data-aos="fade-right">
                        <h1 class="display-4 text-white mb-4 animate__animated animate__fadeInDown">
                            <?= $item['title'] ?>
                        </h1>
                        <p class="lead text-white mb-5 animate__animated animate__fadeInUp">
                            <?= $item['subtitle'] ?>
                        </p>
                        <a href="<?= $item['cta_link'] ?>" class="btn btn-light btn-lg animate__animated animate__fadeInUp">
                            <?= $item['cta'] ?>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                    <div class="col-lg-6 hero-image" data-aos="fade-left">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" class="img-fluid animate__animated animate__zoomIn">
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Hero Controls -->
    <div class="hero-controls">
        <button class="hero-prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="hero-next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    
    <!-- Hero Scroll Indicator -->
    <div class="hero-scroll">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div>
            <span class="scroll-arrow">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </div>
</div>

<style>
.hero-section {
    position: relative;
    overflow: hidden;
}

.hero-item {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 100px 0;
}

.hero-content {
    z-index: 2;
}

.hero-image {
    position: relative;
    z-index: 1;
}

.hero-image img {
    animation-delay: 0.3s;
}

.hero-controls {
    position: absolute;
    bottom: 30px;
    right: 30px;
    z-index: 3;
}

.hero-controls button {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.hero-controls button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Mouse Scroll Animation */
.hero-scroll {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
}

.mouse {
    width: 26px;
    height: 40px;
    border: 2px solid #fff;
    border-radius: 13px;
    margin: 0 auto 10px;
    position: relative;
}

.wheel {
    width: 4px;
    height: 8px;
    background: #fff;
    border-radius: 2px;
    position: absolute;
    top: 4px;
    left: 50%;
    transform: translateX(-50%);
    animation: mouse-wheel 1.5s infinite;
}

.scroll-arrow {
    display: block;
    width: 20px;
    height: 20px;
    position: relative;
}

.scroll-arrow span {
    display: block;
    width: 8px;
    height: 8px;
    border-right: 2px solid #fff;
    border-bottom: 2px solid #fff;
    transform: rotate(45deg);
    margin: -2px 0;
    animation: mouse-scroll 1s infinite;
}

@keyframes mouse-wheel {
    0% { opacity: 1; transform: translateX(-50%) translateY(0); }
    100% { opacity: 0; transform: translateX(-50%) translateY(10px); }
}

@keyframes mouse-scroll {
    0% { opacity: 0; transform: rotate(45deg) translate(-5px, -5px); }
    50% { opacity: 1; }
    100% { opacity: 0; transform: rotate(45deg) translate(5px, 5px); }
}
</style> 
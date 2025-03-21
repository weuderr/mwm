<?php
$highlights = [
    [
        'icon' => 'fas fa-laptop-code',
        'title' => 'Desenvolvimento Web',
        'description' => 'Sites responsivos, sistemas web e e-commerces com as melhores tecnologias do mercado.',
        'stats' => [
            'Projetos Entregues' => '50+',
            'Clientes Satisfeitos' => '98%'
        ],
        'link' => base_url('servicos#web')
    ],
    [
        'icon' => 'fas fa-mobile-alt',
        'title' => 'Apps Mobile',
        'description' => 'Aplicativos nativos e híbridos para iOS e Android, com foco em performance e usabilidade.',
        'stats' => [
            'Apps Publicados' => '30+',
            'Downloads' => '100k+'
        ],
        'link' => base_url('servicos#mobile')
    ],
    [
        'icon' => 'fas fa-server',
        'title' => 'Consultoria em TI',
        'description' => 'Análise técnica, planejamento estratégico e soluções personalizadas para seu negócio.',
        'stats' => [
            'Horas de Consultoria' => '1000+',
            'ROI Médio' => '300%'
        ],
        'link' => base_url('servicos#consultoria')
    ]
];
?>

<section class="highlights-section py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Nossas Soluções em Destaque</h2>
        
        <div class="row">
            <?php foreach ($highlights as $index => $highlight): ?>
            <div class="col-lg-4 mb-4">
                <div class="highlight-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="highlight-icon">
                        <i class="<?= $highlight['icon'] ?>"></i>
                    </div>
                    
                    <h3 class="highlight-title">
                        <?= $highlight['title'] ?>
                    </h3>
                    
                    <p class="highlight-description">
                        <?= $highlight['description'] ?>
                    </p>
                    
                    <div class="highlight-stats">
                        <?php foreach ($highlight['stats'] as $label => $value): ?>
                        <div class="stat-item">
                            <span class="stat-value"><?= $value ?></span>
                            <span class="stat-label"><?= $label ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <a href="<?= $highlight['link'] ?>" class="highlight-link">
                        Saiba mais
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.highlight-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.highlight-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.highlight-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #007bff, #00ff88);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.highlight-card:hover::before {
    transform: scaleX(1);
}

.highlight-icon {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.highlight-card:hover .highlight-icon {
    transform: scale(1.1);
}

.highlight-title {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

.highlight-description {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
}

.highlight-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 15px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.stat-item {
    text-align: center;
}

.stat-value {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    color: #007bff;
}

.stat-label {
    font-size: 0.9rem;
    color: #666;
}

.highlight-link {
    display: inline-flex;
    align-items: center;
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.highlight-link i {
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.highlight-link:hover {
    color: #0056b3;
    text-decoration: none;
}

.highlight-link:hover i {
    transform: translateX(5px);
}

@media (max-width: 768px) {
    .highlight-stats {
        flex-direction: column;
        gap: 10px;
    }
    
    .stat-item {
        padding: 10px 0;
    }
}
</style> 
<?php
/**
 * Classe HomeController
 * Responsável por gerenciar as páginas principais do site
 */
class HomeController extends Controller
{
    /**
     * Página inicial
     */
    public function index()
    {
        $this->render('home');
    }
    
    /**
     * Página sobre
     */
    public function sobre()
    {
        $this->render('sobre');
    }
    
    /**
     * Página serviços
     */
    public function servicos()
    {
        $this->render('servicos');
    }
    
    /**
     * Página portfólio
     */
    public function portfolio()
    {
        $this->render('portfolio');
    }
} 
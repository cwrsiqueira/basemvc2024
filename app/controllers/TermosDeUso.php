<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;

class TermosDeUso extends Controller
{
    private ?array $data = ['pagina' => 'Termos de uso e políticas de privacidade'];

    public function index(): void
    {
        $this->data['contato'] = ENV['EMAIL_SUPORTE'];
        $this->loadTemplate('termos-de-uso-e-politica-de-privacidade', $this->data);
    }
}

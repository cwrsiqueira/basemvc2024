<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;

class Home extends Controller
{
    private ?array $data = ['pagina' => 'Opinyo - Transforme Feedback em Resultados'];

    public function index(): void
    {
        $this->loadGuestTemplate('welcome', $this->data);
    }
}

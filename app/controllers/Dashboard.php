<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;

class Dashboard extends Controller
{
    private ?array $data = ['pagina' => 'Dashboard'];

    public function index(): void
    {
        $this->loadTemplate('pages/dashboard', $this->data);
    }
}

<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;

class Sobre extends Controller
{
    private ?array $data = ['pagina' => 'Sobre'];

    public function index(): void
    {
        $this->loadTemplate('pages/sobre', $this->data);
    }
}

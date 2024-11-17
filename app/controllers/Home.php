<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;

class Home extends Controller
{
    private ?array $data = ['pagina' => 'Home'];

    public function __construct()
    {
        if (isset($_SESSION['loggedUser'])) {
            header("Location: " . URL . "dashboard");
            exit;
        }
    }

    public function index(): void
    {
        $this->loadGuestTemplate('welcome', $this->data);
    }
}

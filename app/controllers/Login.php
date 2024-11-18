<?php

namespace App\Controllers;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Controller;
use App\Models\Usuario;
use SendGrid\Mail\Mail;

class Login extends Controller
{
    private ?array $data = ['pagina' => 'Login'];

    public function index(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if ($email) {

            $usuario = new Usuario();
            if (!$usuario->exists($email)) {
                $_SESSION['alert'] = [
                    'campo' => '',
                    'msg' => "<div class='alert alert-danger' role='alert'>Usuário não cadastrado. Faça o <a href='" . URL . "login/cadastro' class='alert-link'>CADASTRO</a>.</div>",
                    'old' => [],
                ];
                header('Location: ' . URL . 'login');
                exit;
            }

            if (!$usuario = $usuario->login($email)) {
                $_SESSION['alert'] = [
                    'campo' => '',
                    'msg' => "<div class='alert alert-danger' role='alert'>Algo deu errado! Tente novamente.</div>",
                    'old' => [],
                ];
                header("Location: " . URL . "login");
                exit;
            }

            $this->enviarEmailLoginSendGrid($usuario['nome'], $usuario['email'], $usuario['senha']);

            $_SESSION['alert'] = [
                'campo' => '',
                'msg' => "<div class='alert alert-warning' role='alert'>ATENÇÃO! Acesse seu e-mail para entrar no sistema.</div>",
                'old' => [],
            ];

            header("Location: " . URL . "dashboard");
            exit;
        }

        $this->loadGuestTemplate('autenticacao/login', $this->data);
    }

    public function logar()
    {
        $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
        $token = filter_input(INPUT_GET, 'token', FILTER_DEFAULT);

        if (!$email) {
            $_SESSION['alert'] = [
                'campo' => 'email',
                'msg' => "<div class='alert alert-danger' role='alert'>O campo Email é obrigatório.</div>",
                'old' => [
                    'email' => $email,
                ],
            ];
            header("Location: " . URL . "login");
            exit;
        }

        if (!$token) {
            $_SESSION['alert'] = [
                'campo' => 'password',
                'msg' => "<div class='alert alert-danger' role='alert'>O campo Senha é obrigatório.</div>",
                'old' => [
                    'email' => $email,
                ],
            ];
            header("Location: " . URL . "login");
            exit;
        }

        $usuario = new Usuario();

        if (!$usuario = $usuario->logar($email, $token)) {
            header("Location: " . URL . "login");
            exit;
        }

        $_SESSION['loggedUser'] = $usuario;

        $_SESSION['alert'] = [
            'campo' => '',
            'msg' => "<div class='alert alert-success' role='alert'>Usuário confirmado. Obrigado.</div>",
            'old' => [],
        ];

        header("Location: " . URL . "dashboard");
    }

    public function cadastro(): void
    {
        $this->loadGuestTemplate('autenticacao/cadastro', $this->data);
    }

    public function cadastrar(): void
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$username) {
            $_SESSION['alert'] = [
                'campo' => 'username',
                'msg' => "<div class='alert alert-danger' role='alert'>O campo Nome de Usuário é obrigatório.</div>",
                'old' => [
                    'username' => $username,
                    'email' => $email,
                ],
            ];
            header("Location: " . URL . "login/cadastro");
            exit;
        }

        if (!$email) {
            $_SESSION['alert'] = [
                'campo' => 'email',
                'msg' => "<div class='alert alert-danger' role='alert'>O campo Email é obrigatório.</div>",
                'old' => [
                    'username' => $username,
                    'email' => $email,
                ],
            ];
            header("Location: " . URL . "login/cadastro");
            exit;
        }

        $usuario = new Usuario();
        if ($usuario->exists($email)) {
            $_SESSION['alert'] = [
                'campo' => '',
                'msg' => "<div class='alert alert-danger' role='alert'>Usuário já cadastrado. Faça o <a href='" . URL . "login' class='alert-link'>LOGIN</a>.</div>",
                'old' => [],
            ];
            header("Location: " . URL . "login/cadastro");
            exit;
        }

        if (!$usuario = $usuario->cadastrar(['nome' => $username, 'email' => $email])) {
            $_SESSION['alert'] = [
                'campo' => '',
                'msg' => "<div class='alert alert-danger' role='alert'>Algo deu errado! Tente novamente.</div>",
                'old' => [],
            ];
            header("Location: " . URL . "login/cadastro");
            exit;
        }

        // Enviar email de Login
        $this->enviarEmailCadastroSendGrid($usuario['nome'], $usuario['email'], $usuario['senha']);

        $_SESSION['alert'] = [
            'campo' => '',
            'msg' => "<div class='alert alert-warning' role='alert'>ATENÇÃO! Usuário cadastrado. Acesse seu e-mail para entrar no sistema.</div>",
            'old' => [],
        ];

        header("Location: " . URL . "dashboard");
    }

    public function enviarEmailCadastroSendGrid(string $paraNome, string $paraEmail, string $token): void
    {
        $email = new Mail();
        $email->setFrom(ENV['SENDGRID_SENDER'], ENV['APP_NAME']);
        $email->setSubject("Login " . ENV['APP_NAME']);
        $email->addTo($paraEmail, $paraNome);

        // Corpo do e-mail em HTML
        $conteudoHtml = '
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Poppins", sans-serif;
                background: linear-gradient(to bottom, #d5e4c5, #b2d3ee);
                color: #333;
            }
            .email-container {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                text-align: center;
                background-color: #007f2a;
                padding: 15px;
                border-radius: 8px 8px 0 0;
                color: #fff;
            }
            .email-footer {
                font-size: 0.9em;
                text-align: center;
                color: #666;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="email-header">
                <h1>' . ENV['APP_NAME'] . '</h1>
                <p>' . ENV['APP_SLOGAN'] . '</p>
            </div>
            <div class="email-body my-4">
                <p>Olá, ' . htmlspecialchars($paraNome) . '.</p>
                <p>Obrigado por se cadastrar no ' . ENV['APP_NAME'] . '! Clique no link abaixo para entrar no sistema:</p>
                <p><a href="' . URL . '/login/logar/?token=' . $token . '&email=' . $paraEmail . '" class="btn btn-primary">Acessar ' . ENV['APP_NAME'] . '</a></p>
                <p>Obrigado!</p>
            </div>
            <div class="email-footer">
                <p>&copy; 2024 ' . ENV['APP_NAME'] . ' - Todos os direitos reservados.</p>
                <p><a href="' . URL . 'termos-de-uso" style="color: #007bff;">Termos de Uso e Políticas de Privacidade</a></p>
            </div>
        </div>
    </body>
    </html>';

        // Configura o conteúdo do e-mail
        $email->addContent("text/html", $conteudoHtml);

        // Envio do e-mail
        $sendgrid = new \SendGrid(ENV['SENDGRID_API_KEY']); // Substitua 'SENDGRID_API_KEY' pela sua chave de API SendGrid
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (\Exception $e) {
            echo "Erro ao enviar e-mail: " . $e->getMessage();
        }
    }

    public function enviarEmailLoginSendGrid(string $paraNome, string $paraEmail, string $token): void
    {
        $email = new Mail();
        $email->setFrom(ENV['SENDGRID_SENDER'], ENV['APP_NAME']);
        $email->setSubject("Login " . ENV['APP_NAME']);
        $email->addTo($paraEmail, $paraNome);

        // Corpo do e-mail em HTML
        $conteudoHtml = '
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "Poppins", sans-serif;
                background: linear-gradient(to bottom, #d5e4c5, #b2d3ee);
                color: #333;
            }
            .email-container {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .email-header {
                text-align: center;
                background-color: #007f2a;
                padding: 15px;
                border-radius: 8px 8px 0 0;
                color: #fff;
            }
            .email-footer {
                font-size: 0.9em;
                text-align: center;
                color: #666;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="email-header">
                <h1>' . ENV['APP_NAME'] . '</h1>
                <p>' . ENV['APP_SLOGAN'] . '</p>
            </div>
            <div class="email-body my-4">
                <p>Olá, ' . htmlspecialchars($paraNome) . '.</p>
                <p>Bom te ver de novo no ' . ENV['APP_NAME'] . '! Clique no link abaixo para entrar no sistema:</p>
                <p><a href="' . URL . '/login/logar/?token=' . $token . '&email=' . $paraEmail . '" class="btn btn-primary">Acessar ' . ENV['APP_NAME'] . '</a></p>
                <p>Obrigado!</p>
            </div>
            <div class="email-footer">
                <p>&copy; 2024 ' . ENV['APP_NAME'] . ' - Todos os direitos reservados.</p>
                <p><a href="' . URL . 'termos-de-uso" style="color: #007bff;">Termos de Uso e Políticas de Privacidade</a></p>
            </div>
        </div>
    </body>
    </html>';

        // Configura o conteúdo do e-mail
        $email->addContent("text/html", $conteudoHtml);

        // Envio do e-mail
        $sendgrid = new \SendGrid(ENV['SENDGRID_API_KEY']); // Substitua 'SENDGRID_API_KEY' pela sua chave de API SendGrid
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (\Exception $e) {
            echo "Erro ao enviar e-mail: " . $e->getMessage();
        }
    }

    public function deslogar()
    {
        unset($_SESSION['loggedUser']);
        header("Location: " . URL . "dashboard");
    }
}

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tabs de SEO -->
    <link rel="author" href="<?= ENV['RELAUTHOR'] ?>" />
    <meta name="description" content="<?= ENV['APP_DESCRIPTION'] ?>">
    <meta name="robots" content="<?= ENV['ROBOTS'] ?>">
    <meta name="author" content="<?= ENV['AUTHOR'] ?>" />
    <meta name="keywords" content="<?= ENV['KEYWORDS'] ?>" />
    <meta name="og:title" property="og:title" content="<?= ENV['APP_NAME'] ?> | <?= $viewData['pagina'] ?? 'MVC' ?>">
    <meta property="og:description" content="<?= ENV['APP_DESCRIPTION'] ?>" />
    <meta property="og:url" content="<?= ENV['RELAUTHOR'] ?>" />
    <meta property="og:image" content="<?= URL; ?>public/assets/img/logo.svg" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= ENV['APP_NAME'] ?> | <?= $viewData['pagina'] ?? 'MVC' ?>" />
    <meta name="twitter:description" content="<?= ENV['APP_DESCRIPTION'] ?>" />
    <meta name="twitter:image" content="<?= URL; ?>public/assets/img/logo.svg" />
    <!--  -->

    <link rel="shortcut icon" href="<?= URL; ?>public/assets/img/favicon.ico" type="image/x-icon">
    <title><?= $viewData['pagina'] ?? 'MVC' ?> | <?= ENV['APP_NAME'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= URL; ?>public/assets/css/style.css">
    <style>
        label {
            font-weight: bold;
        }

        label small {
            font-weight: lighter;
        }
    </style>
</head>

<body style="font-size:small">

    <div class="content-wrapper d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container text-center text-sm-start justify-content-center justify-content-sm-between">
                <a class="navbar-brand d-flex flex-column flex-sm-row align-items-center align-items-center" href="<?= URL ?>">
                    <img src="<?= URL; ?>public/assets/img/logo.svg" alt="Logomarca" width="100" height="100" class="d-inline-block align-text-top">
                    <div class="ms-3">
                        <h1 class="fs-2 fw-bold text-white mb-0"><small><?= ENV['APP_NAME'] ?></small></h1>
                        <div class="text-secondary text-wrap fs-6 fs-md-3"><?= ENV['APP_DESCRIPTION'] ?></div>
                    </div>
                </a>
                <?php if (!empty($_SESSION['loggedUser'])) : ?>
                    <div>
                        <a href="<?= URL ?>login/deslogar" class="btn btn-sm btn-outline-light">Sair</a>
                    </div>
                <?php else : ?>
                    <div>
                        <a href="<?= URL ?>login/" class="btn btn-sm btn-outline-light mx-1"><small>Login</small></a>
                        <a href="<?= URL ?>login/cadastro" class="btn btn-sm btn-outline-light mx-1"><small>Cadastrar</small></a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>

        <?php $this->loadViewInTemplate($viewName, $viewData);  ?>

        <footer class="footer text-center bg-dark text-light py-3 mt-auto d-flex flex-column gap-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row mb-2">
                        <div class="col">
                            <small>Conheça nossos outros projetos nas redes sociais</small>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="d-flex justify-content-center gap-3">
                                <a target="_blank" title="Github" href="https://github.com/cwrsiqueira"><i class="fa-brands fa-square-github fa-2xl"></i></a>
                                <a target="_blank" title="Linkedin" href="https://www.linkedin.com/in/carloswagner1975/"><i class="fa-brands fa-linkedin fa-2xl"></i></a>
                                <a target="_blank" title="Facebook" href="https://www.facebook.com/carloswagnerdev"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
                                <a target="_blank" title="Youtube" href="https://www.youtube.com/@carlosjornadadev"><i class="fa-brands fa-square-youtube fa-2xl"></i></a>
                                <a target="_blank" title="Site" href="https://carlosdev.com.br"><i class="fa-solid fa-globe fa-2xl"></i></a>
                                <a title="Enviar e-mail" href="mailto:<?= ENV['EMAIL_SUPORTE'] ?>"><i class="fa-solid fa-envelope fa-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col">
                            <small>&copy; 2024 <?= ENV['APP_NAME'] ?> - Todos os direitos reservados.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small><a href="<?= URL ?>home/termos-de-uso-e-politicas-de-privacidade">Termos de Uso e Políticas de Privacidade</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="<?= URL; ?>public/assets/js/script.js"></script>
</body>

</html>
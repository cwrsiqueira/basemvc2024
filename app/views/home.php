<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= URL ?>">
            <img src="<?= URL; ?>public/assets/img/logo.webp" alt="Logomarca" width="50" height="50" class="d-inline-block align-text-top">
            <div class="ms-3">
                <h1 class="h4 fw-bold text-white mb-0"><?= ENV['APP_NAME'] ?></h1>
                <small class="text-secondary"><?= ENV['APP_DESCRIPTION'] ?></small>
            </div>
        </a>
        <?php if (!empty($_SESSION['loggedUser'])) : ?>
            <div class="ms-auto">
                <a href="<?= URL ?>login/deslogar" class="btn btn-sm btn-outline-light">Sair</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="content-wrapper d-flex flex-column min-vh-100-94">
    <div class="container my-5">

        <?php if (empty($success)) : ?>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="fw-bold text-dark">Bem-vindo ao <?= ENV['APP_NAME'] ?>!</h2>
                    <p class="lead text-muted"><?= ENV['APP_DESCRIPTION'] ?></p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 mx-auto text-center">
                    <?php if (!empty($_SESSION['loggedUser'])) : ?>
                        <div class="p-4 bg-light border rounded">
                            <p class="mb-0">Olá, <strong><?= $_SESSION['loggedUser']['nome']; ?></strong>.</p>
                            <p class="fw-bold">Você tem <?= $_SESSION['loggedUser']['creditos']; ?> créditos para utilizar!</p>
                            <a href="<?= URL ?>login/cadastro" class="btn btn-primary btn-sm mt-2">
                                <i class="fa-solid fa-coins fa-beat text-warning"></i>
                                &nbsp; Adquira mais créditos
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="p-4 bg-light border rounded">
                            <p class="fw-bold">Cadastre-se e ganhe 10 créditos para testar!</p>
                            <a href="<?= URL ?>login/cadastro" class="btn btn-primary btn-sm mt-2">
                                <i class="fa-solid fa-coins fa-beat text-warning"></i>
                                &nbsp; Ganhe Créditos
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <hr class="my-4">

        <?php endif; ?>

        <?php if (!empty($_SESSION['alert']['msg'])) {
            echo $_SESSION['alert']['msg'];
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
            unset($_SESSION['alert']['msg']);
        } ?>

        <?php if (!empty($_SESSION['loggedUser'])) : ?>
            <?php if (empty($success)) : ?>
                <div class="row visually-hidden" id="spinner">
                    <div class="col-lg text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Carregando...</span>
                        </div>
                    </div>
                </div>

                <form method="post" class="mt-3 needs-validation" id="form" novalidate>
                    <input type="hidden" name="usuario_id" value="<?= $_SESSION['loggedUser']['id']; ?>">
                    <div class="row mb-3">
                        <div class="col-lg-6 mx-auto text-center">
                            <label for="dategame" class="form-label">Importante:</label>
                            <p>A análise é realizada por uma inteligência artificial com base nos nomes dos times que você informar. Não é necessário que haja uma partida real entre eles: a IA simula um possível confronto e oferece uma análise baseada no desempenho e nas condições atuais das equipes.</p>
                            <p>É importante fornecer nomes de times reais. Nomes fictícios ou inexistentes poderão gerar uma análise especulativa e incorreta, e você poderá ser cobrado por isso. Portanto, para obter uma análise precisa e relevante, forneça nomes de equipes que realmente existam.</p>
                            <p>Lembre-se de que a IA pode cometer erros. As informações fornecidas são apenas indicativas e não representam garantias de acerto. Não nos responsabilizamos e não incentivamos o uso das análises para apostas. Utilize este serviço com responsabilidade.</p>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-lg-5 mx-auto text-center">
                            <label for="teamName1" class="form-label sr-only">Time 1</label>
                            <input type="text" class="form-control form-control-lg text-center" name="teamName1" placeholder="Digite o time 1" value="<?= !empty($_SESSION['alert']['old']['teamName1']) ?? '' ?>" required>
                            <div class="invalid-feedback">
                                Campo Obrigatório.
                            </div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <span class="fs-3 text-dark">X</span>
                        </div>
                        <div class="col-lg-5 mx-auto text-center">
                            <label for="teamName2" class="form-label sr-only">Time 2</label>
                            <input type="text" class="form-control form-control-lg text-center" name="teamName2" placeholder="Digite o time 2" value="<?= !empty($_SESSION['alert']['old']['teamName2']) ?? '' ?>" required>
                            <div class="invalid-feedback">
                                Campo Obrigatório.
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg" name="action" value="consultar" id="btn-enviar">
                            Receber o palpite
                        </button>
                    </div>
                </form>
            <?php else : ?>
                <p class="show-content">
                    <a href="<?php URL; ?>" class="btn btn-secondary mt-3">Voltar</a>
                    <hr>
                    <?= $success ?>
                    <hr>
                <div class="alert alert-danger mt-4">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    IMPORTANTE! A Inteligência Artifical pode cometer erros. verifique informações importantes. Utilize as análises como orientação, mas tome suas próprias decisões. Não nos responsabilizamos por erros ou resultados. Lembre-se, são apenas palpites.
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="text-center mt-4">
                <a href="<?= URL ?>login" class="btn btn-primary btn-lg">Já tenho cadastro</a>
            </div>
        <?php endif; ?>
    </div>

    <footer class="footer text-center bg-dark text-light py-3 mt-auto">
        <p>&copy; 2024 <?= ENV['APP_NAME'] ?> - Todos os direitos reservados.</p>
        <p><a href="<?= URL ?>home/termos-de-uso-e-politicas-de-privacidade">Termos de Uso e Políticas de Privacidade</a></p>
    </footer>

    <div class="cookie-banner" id="cookie-banner">
        Este site e seus parceiros podem utilizar cookies para melhorar a experiência
        do usuário.
        <button onclick="acceptCookies()">OK</button>
    </div>
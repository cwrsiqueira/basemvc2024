<div class="container my-5">

    <h1>Dashboard</h1>

    <?php if (!empty($_SESSION['loggedUser'])): ?>

        Olá, <?= $_SESSION['loggedUser']['nome'] ?>. Você está logado!

    <?php else: ?>

        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold text-dark">Bem-vindo ao <?= ENV['APP_NAME'] ?>!</h2>
                <p class="lead text-muted"><?= ENV['APP_DESCRIPTION'] ?></p>
            </div>
        </div>

        <hr class="my-4">

        <h5>Faça login ou cadastre-se para começar.</h5>

        <?php if (!empty($_SESSION['alert']['msg'])) {
            echo $_SESSION['alert']['msg'];
            unset($_SESSION['alert']['msg']);
        } ?>

    <?php endif; ?>
</div>
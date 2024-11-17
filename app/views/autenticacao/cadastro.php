<div class="auth-container">
    <div class="auth-box">
        <div class="logo-container text-center mb-4">
            <a href="<?= URL ?>dashboard">
                <img src="<?= URL; ?>public/assets/img/icone_transparente.png" alt="Logomarca" width="100">
            </a>
        </div>

        <?php if (!empty($_SESSION['alert']['msg'])) {
            echo $_SESSION['alert']['msg'];
            unset($_SESSION['alert']['msg']);
        } ?>

        <h2 class="auth-title">Cadastro</h2>
        <form method="post" class="auth-form" action="<?= URL ?>login/cadastrar">
            <div class="mb-3">
                <label for="username" class="form-label">Nome de Usuário</label>
                <input type="text" class="form-control form-control-lg <?php @$_SESSION['alert']['campo'] == 'username' ? 'border-danger' : ''; ?>" id="username" name="username" value="<?= @$_SESSION['alert']['old']['username']; ?>" placeholder="Digite seu nome de usuário">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-lg <?php @$_SESSION['alert']['campo'] == 'email' ? 'border-danger' : ''; ?>" id="email" name="email" value="<?= @$_SESSION['alert']['old']['email']; ?>" placeholder="Digite seu email">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg w-100">Cadastrar</button>
            </div>
            <div class="text-center mt-3">
                <a href="<?= URL ?>login" class="text-decoration-none">Já tem uma conta? Faça login</a>
            </div>
        </form>
    </div>
</div>

<script>
    function showPassword() {
        let password = document.querySelector('#password');
        let eye = document.querySelector('#basic-password i');
        (password.getAttribute('type') === 'password') ? password.setAttribute('type', 'text'): password.setAttribute('type', 'password');
        changeEye(eye);
    }

    function showConfirmPassword() {
        let confirm_password = document.querySelector('#confirm-password');
        let eye = document.querySelector('#basic-confirm_password i');
        (confirm_password.getAttribute('type') === 'password') ? confirm_password.setAttribute('type', 'text'): confirm_password.setAttribute('type', 'password');
        changeEye(eye);
    }

    function changeEye(element) {
        console.log(element.classList.contains('fa-eye'))
        if (element.classList.contains('fa-eye')) {
            element.classList.remove('fa-eye');
            element.classList.add('fa-eye-slash');
        } else if (element.classList.contains('fa-eye-slash')) {
            element.classList.add('fa-eye');
            element.classList.remove('fa-eye-slash');
        }
    }
</script>
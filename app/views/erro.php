<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404 - Página não encontrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 0;
        }

        .error-container {
            max-width: 600px;
        }

        .error-code {
            font-size: 8rem;
            font-weight: bold;
        }

        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .btn-back {
            background-color: #ffffff;
            color: #4facfe;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #4facfe;
            color: #ffffff;
        }

        .error-logo {
            width: 150px;
            margin-bottom: 20px;
            transform: scale(1.5);
            /* Aumenta 1.5x */
        }
    </style>
</head>

<body>
    <div class="error-container">
        <img src="<?= URL ?>public/assets/img/opinyo.png" alt="Opinyo Logo" class="error-logo">
        <div class="error-code">404</div>
        <div class="error-message">Ops! Página não encontrada.</div>
        <p>
            A página que você está procurando pode ter sido removida, o nome foi alterado ou está temporariamente indisponível.
        </p>
        <a href="<?= URL ?>" class="btn btn-back"><i class="fas fa-home"></i> Voltar para a página inicial</a>
    </div>
</body>

</html>
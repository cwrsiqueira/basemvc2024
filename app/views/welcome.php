<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinyo - Transforme Feedback em Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .features-section {
            padding: 60px 0;
        }

        .cta-section {
            background: #4facfe;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }

        .pricing-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section position-relative" style="height: 50vh; overflow: hidden;">
        <!-- Vídeo -->
        <video id="heroVideo" autoplay muted class="w-100 h-100 position-absolute top-0 start-0">
            <source src="public/assets/video/opinyo.mp4" type="video/mp4">
            Seu navegador não suporta vídeos em HTML5.
        </video>

        <!-- Conteúdo inicial -->
        <div id="content" class="container text-center text-white d-flex flex-column justify-content-center align-items-center" style="height: 100%; position: relative; opacity: 0; transition: opacity 1.5s;">
            <img src="public/assets/img/logo_transparente.png" alt="Opinyo" style="width: 150px; transform: scale(2);">
            <p class="lead mt-3">Transforme feedbacks em insights poderosos e resultados concretos.</p>
            <a href="#signup" class="btn btn-light btn-lg">Experimente Gratuitamente</a>
        </div>
    </section>



    <!-- Features Section -->
    <section class="features-section">
        <div class="container text-center">
            <h2 class="mb-5">Por que escolher Opinyo?</h2>
            <div class="row">
                <div class="col-md-4">
                    <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                    <h5>Análise de Feedback</h5>
                    <p>Receba relatórios detalhados e transforme as opiniões de seus clientes em melhorias reais.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-bullhorn fa-3x mb-3 text-success"></i>
                    <h5>Automação Inteligente</h5>
                    <p>Automatize respostas e receba alertas instantâneos para feedbacks críticos.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-users fa-3x mb-3 text-danger"></i>
                    <h5>Fidelize Clientes</h5>
                    <p>Mostre aos seus clientes que você se importa, e construa relações duradouras.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="features-section bg-light">
        <div class="container text-center">
            <h2 class="mb-5">Planos de Assinatura</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card p-4">
                        <h4>Básico</h4>
                        <p class="price-display fs-1">R$50/mês</p>
                        <ul class="list-unstyled">
                            <li>Formulários Personalizados</li>
                            <li>Relatórios Básicos</li>
                            <li>Até 100 feedbacks/mês</li>
                        </ul>
                        <a href="#signup" class="btn btn-primary">Assinar</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card p-4">
                        <h4>Profissional</h4>
                        <p class="price-display fs-1">R$100/mês</p>
                        <ul class="list-unstyled">
                            <li>Inclui Automação</li>
                            <li>Relatórios Avançados</li>
                            <li>Até 500 feedbacks/mês</li>
                        </ul>
                        <a href="#signup" class="btn btn-success">Assinar</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card p-4">
                        <h4>Corporativo</h4>
                        <p class="price-display fs-1">Personalizado</p>
                        <ul class="list-unstyled">
                            <li>Feedback Ilimitado</li>
                            <li>Suporte Exclusivo</li>
                            <li>Relatórios Personalizados</li>
                        </ul>
                        <a href="#signup" class="btn btn-dark">Fale Conosco</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <h3>Pronto para transformar sua empresa?</h3>
        <p>Comece hoje mesmo e descubra como Opinyo pode ajudar a melhorar a satisfação dos seus clientes.</p>
        <a href="#signup" class="btn btn-light btn-lg">Cadastre-se Agora</a>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Opinyo. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
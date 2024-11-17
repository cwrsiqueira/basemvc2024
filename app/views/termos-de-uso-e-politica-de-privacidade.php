<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
        line-height: 1.6;
    }

    .container {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    h1,
    h2,
    h3 {
        color: #007bff;
    }

    .list-group-item {
        background-color: transparent;
    }

    footer {
        background-color: #343a40;
        color: white;
        padding: 10px;
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Termos de Uso e Política de Privacidade</h1>
        <p class="lead text-center">Última atualização: 14 de novembro de 2024</p>

        <h2>Termos de Uso</h2>
        <p>Bem-vindo à plataforma Opinyo! Ao acessar ou usar nossos serviços, você concorda com os seguintes termos:</p>
        <ul class="list-group mb-4">
            <li class="list-group-item">1. O Opinyo é uma plataforma SaaS voltada para a coleta e análise de feedbacks de clientes, destinada a empresas e profissionais.</li>
            <li class="list-group-item">2. O usuário é responsável por fornecer informações corretas e atualizadas ao se cadastrar.</li>
            <li class="list-group-item">3. É proibido utilizar o Opinyo para fins ilícitos ou que violem direitos de terceiros.</li>
            <li class="list-group-item">4. Reservamo-nos o direito de suspender ou encerrar contas que violem estes Termos de Uso.</li>
            <li class="list-group-item">5. As funcionalidades estão sujeitas a alterações para melhorias ou adaptações legais.</li>
        </ul>

        <h2>Política de Privacidade</h2>
        <p>Esta Política descreve como coletamos, utilizamos e protegemos suas informações pessoais, em conformidade com a <strong>LGPD</strong> (Lei Geral de Proteção de Dados).</p>

        <h3>1. Dados Coletados</h3>
        <p>Coletamos os seguintes tipos de dados:</p>
        <ul class="list-group mb-4">
            <li class="list-group-item">Dados de cadastro: nome, e-mail, telefone, e CNPJ (quando aplicável).</li>
            <li class="list-group-item">Dados de uso: informações sobre como você utiliza a plataforma, incluindo IP, navegador e interações.</li>
            <li class="list-group-item">Feedbacks: informações fornecidas pelos clientes dos usuários do Opinyo, como avaliações e comentários.</li>
        </ul>

        <h3>2. Uso dos Dados</h3>
        <p>Utilizamos os dados coletados para:</p>
        <ul class="list-group mb-4">
            <li class="list-group-item">Fornecer e personalizar os serviços da plataforma.</li>
            <li class="list-group-item">Gerar relatórios e análises de feedbacks.</li>
            <li class="list-group-item">Realizar comunicações relacionadas aos serviços.</li>
            <li class="list-group-item">Cumprir obrigações legais e regulatórias.</li>
        </ul>

        <h3>3. Compartilhamento de Dados</h3>
        <p>Os dados podem ser compartilhados com:</p>
        <ul class="list-group mb-4">
            <li class="list-group-item">Parceiros tecnológicos, para suporte e melhoria do sistema.</li>
            <li class="list-group-item">Autoridades legais, quando necessário.</li>
        </ul>

        <h3>4. Direitos do Titular dos Dados</h3>
        <p>De acordo com a LGPD, você tem os seguintes direitos:</p>
        <ul class="list-group mb-4">
            <li class="list-group-item">Solicitar acesso aos dados pessoais coletados.</li>
            <li class="list-group-item">Corrigir ou atualizar informações incorretas.</li>
            <li class="list-group-item">Solicitar a exclusão de seus dados, quando aplicável.</li>
            <li class="list-group-item">Revogar o consentimento para o uso dos dados.</li>
        </ul>

        <h3>5. Segurança dos Dados</h3>
        <p>Adotamos medidas técnicas e organizacionais para proteger suas informações contra acesso não autorizado, uso indevido e perda.</p>

        <h3>6. Contato</h3>
        <p>Para exercer seus direitos ou tirar dúvidas sobre esta Política, entre em contato conosco:</p>
        <p>E-mail: <a href="mailto:<?= ENV['EMAIL_SUPORTE'] ?>"><?= ENV['EMAIL_SUPORTE'] ?></a></p>

        <h3>7. Alterações nesta Política</h3>
        <p>Podemos atualizar esta Política de tempos em tempos. As alterações serão notificadas na plataforma.</p>
    </div>

    <footer>
        <p>&copy; 2024 Opinyo. Todos os direitos reservados.</p>
    </footer>
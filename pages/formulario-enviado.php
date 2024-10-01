<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Envio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,html {
            overflow-y: hidden !important;
            height: 100% !important;
            width: 100% !important;
            position: absolute !important;
            background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(253, 187, 45, 1) 100%) !important;
        }
        .confirmation-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
        }
        .confirmation-icon {
            font-size: 50px;
            color: #28a745;
        }
        .btn-back {
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="confirmation-container">
        <div class="mb-4">
            <i class="confirmation-icon bi bi-check-circle-fill"></i>
        </div>
        <h2 class="text-success mb-3">Formulário Enviado com Sucesso!</h2>
        <p class="lead">Obrigado pela preferência.</p>
        <a class="btn btn-primary btn-back mt-4" href="/">Voltar para a página inicial</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/Modo/stylerecuperar.css" id="dark-css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    
    <script src="js/Modo.js"></script>
    <script src="js/click.js"></script>

    <title>MediCare - Alteração Email</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <div class="mode">
        <h1>MediCare</h1>
        <img src="css/media/sol.png" id="MIcon">
    </div>
    <link rel="stylesheet" href="css/Modo/M-stylerecuperar.css" id="light-css" disabled>
    
    <div class="Bloco01">
        <h2>Redefina seu E-mail</h2>
        <p>Insira o novo endereço de e-mail desejado para redefinição. Em seguida, enviaremos um link de confirmação.</p>

        <form method="POST" action="G-ajusteEmailAlterado.php" class="container form">
            <span>E-mail</span>
            <input id="email" name="email" type="email" class="validate" required>

            <div class="button">
                <button class="meuBotao" id="recuperar">Enviar Link</button>

                <div id="overlay-recuperar" class="black"></div>

                <div id="popup-recuperar" class="pop">
                    <img src="css/media/arroba.png" id="apop">
                    <h3>Um link de confirmação foi enviado para seu novo email</h3>
                </div>
            </div>
    </form>

    </div>
    <a href="G-ajustes.html"><img src="css/media/setabranca.png" class="seta"></a>
</body>
</html>
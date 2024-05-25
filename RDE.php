<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylerecuperar.css">
    <link rel="stylesheet" href="css/icons.css">
    <script src="js/click.js"></script>
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    
    <title>MediCare - Alteração Email</title>
</head>

<body>
<div class="mode">
        <h1>MediCare</h1>
        <img src="css/media/sol.png" id="MIcon" onclick="switchMode()">
</div>

    <div class="Bloco01">
        <h2>Redefina seu E-mail</h2>
        <p>Insira o novo endereço de email desejado para redefinição. Em seguida, enviaremos um link de confirmação.</p>

        <form method="POST" action="ajusteEmailAlterado.php" class="container form">
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
    <a href="ajustes.html"><img src="css/media/setabranca.png" class="seta"></a>
</body>
</html>
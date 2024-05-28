<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recuperar.css">
    <link rel="stylesheet" href="css/icons.css">
    <script src="js/darkmode.js"></script>

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/coren.js"></script>

        <title>MediCare - Recuperação</title>
</head>

<body>
<div class="mode">
        <h1>MediCare</h1>
        <img src="css/media/sol.png" id="MIcon" onclick="switchMode()">
</div>

    <div class="Bloco01">
        <h2>Recuperação</h2>
        <p>Insira o e-mail cadastrado no MediCare, enviaremos um link via e-mail para que você possa redefinir sua senha</p>

        <form method="post" action="redefinir.php" class="container form">
            <p>E-mail</p>
            <input id="email" type="email" name="email_enfermeiro" class="validate" maxlength="45" required>
            
            <div class="button">
                <input type="submit" class="meuBotao" id="recuperar" value="Enviar Link">

                <div id="overlay-recuperar" class="black"></div>

                <div id="popup-recuperar" class="pop">
                    <img src="css/media/arroba.png" id="apop">
                    <h3>Um link de recuperação foi enviado para seu email</h3>
                </div>
            </div>
        </form>

    </div>
    <a href="login.php"><img src="css/media/setabranca.png" class="seta"></a>
</body>

</html>
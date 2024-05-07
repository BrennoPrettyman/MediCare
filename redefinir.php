<!DOCTYPE html>
<html lang="pt-BR<!DOCTYPE html>
<html lang=" pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/redefinir.css">
    <link rel="stylesheet" href="css/icons.css">
    <script src="js/senha.js"></script>
    <script src="js/redefinir.js"></script>
   

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Recuperação</title>
</head>

<body>
    <h1>MediCare</h1>

    <div class="Bloco02">
        <form method="post" action="senhaAlterada.php" class="container form">
            <h2>Redefina sua senha</h2>
            <p>Crie uma nova senha forte de no minímo seis caracteres, contendo números, letras e um caracter especial</p>
            
            <p>Crie uma senha</p>
            
            <div class="formRow">
                <input id="senha" type="password" class="validate" name="passnha" required>
                <div class="eyeVisible aberto" id="visibleEye"></div>
            </div>
            <snaN id="passwordVerify">
                <char id="char">• 7 Caracteres</char>
                <num id="num">ﾠ• Número</num>
                <special id="special">ﾠ• Caracter Especial</special>
                </snaN>

            <p>Repita sua senha</p>
            <div class="formRow">
                <input id="senhaConfirm" type="password" class="validate" required>
                <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
            </div>
            <snaF id="wrongPassword"></snaF>
            
            <div class="button">
                <input type="submit" class="meuBotao" id="redefinir" value="Redefinir Senha">
                
                <div id="overlay-redefinir" class="black"></div>
            
                <div id="popup-redefinir" class="pop">
                    <img src="css/media/password.png" id="apop">
                    <h3>Senha redefinida com sucesso</h3>
                </div> 
            </div>
        </form>
    </div>
    <a href="recuperar.php"><img src="css/media/setabranca.png" class="seta"></a>
    <?php
        $email = $_POST['email'];

        session_start(); // inicia o 'localstorage'
        $_SESSION['email_enfermeiro'] = $email; // cria localstorage com nome 'coren_enfemeiro' e insere valor
    ?>
</body>

</html>

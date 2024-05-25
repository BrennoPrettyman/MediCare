<!DOCTYPE html>
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
<div class="mode">
        <h1>MediCare</h1>
        <img src="css/media/sol.png" id="MIcon" onclick="switchMode()">
</div>

    <div class="Bloco02">
        <div class="container form">
            <h2>Redefina sua senha</h2>
            <!-- <p>Crie uma nova senha forte de no minímo seis caracteres, contendo números, letras e um caracter especial</p> -->
            
            <p>Crie uma senha</p>
            
            <div class="formRow">
                <?php        
                $password = $_POST['passnha'];

                echo "<input id='senha' type='password' class='validate' required value='$password'>";
                ?>
                <div class="eyeVisible aberto" id="visibleEye"></div>
            </div>
            <snaN id="passwordVerify">
                <char id="char">• 7 Caracteres</char>
                <num id="num">ﾠ• Número</num>
                <special id="special">ﾠ• Caracter Especial</special>
                </snaN>

            <p>Repita sua senha</p>
            <div class="formRow">
                <?php
                $password = $_POST['passnha'];

                echo "<input id='senhaConfirm' type='password' class='validate' required value='$password'>";
                ?>
                <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
            </div>
            
            <div class="button">
                <button class="meuBotao" id="redefinir">Redefinir Senha</button>
                
                <div id="overlay-redefinir" class="black"></div>
            
                <div id="popup-redefinir" class="pop">
                    <img src="css/media/password.png" id="apop">
                    <h3>Senha redefinida com sucesso</h3>
                </div> 
            </div>
        </div>
    </div>
    <a href="recuperar.html"><img src="css/media/setabranca.png" class="seta"></a>
    <?php
    include "conexao.php";

    session_start(); 
    $coren = $_SESSION['coren_redefinir'];
    $estado = $_SESSION['estado_redefinir'];

    $novaSenha = $_POST['passnha'];

    $sqlVerify = "SELECT * from tb_enfermeiro
    where id_coren_enfermeiro = '$coren' and sg_estado_enfermeiro = '$estado';"; //$sql = SELECT from mysql


    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

    if ($result->num_rows > 0) { // para cada coluna
        while($row = $result->fetch_assoc()) {
          if ($coren && $coren == $row["id_coren_enfermeiro"]
          && $estado && $estado == $row["sg_estado_enfermeiro"]){
            $sql = "UPDATE tb_enfermeiro SET senha_enfermeiro = '". $novaSenha ."' where id_coren_enfermeiro = '$coren' and sg_estado_enfermeiro = '$estado';";
            mysqli_query($conn, $sql);
          }
        }
    }

    echo '<script>
        document.getElementById("overlay-redefinir").classList.add("show");
        document.getElementById("popup-redefinir").classList.add("show");
        setTimeout(function () {
            window.location.href = "login.php";
        }, 2000);
        </script>';

    ?>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/icons.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    
    <script src="js/coren.js"></script>
    <script src="js/senha.js"></script>
    <script src="js/cadastro.js"></script>
    <script src="js/seta.js"></script>

    <title>MediCare - Cadastro</title>
</head>

<body>
    <div class="box2">
        <img src="css/media/setablue.png" id="volta">
        <div class="content">
            <h1>MediCare</h1>
            <span>Cadastro</span>
        </div>
        <div style="width: 35px;"></div>
    </div>

    <div class="container form">
        <p>Nome</p>
        <?php
        $name = $_POST['nm_enfermeiro'];
        echo "<input id='nome' type='text' name='nm_enfermeiro' class='validate' value='$name'>"
        ?>
        <p>E-Mail</p>
        <?php
        $email = $_POST['email_enfermeiro'];
        echo "<input id='email' type='email' name='email_enfermeiro' class='validate' value='$email'>"
        ?>
        <p>Coren</p>
        <input id="coren" type="text" name="nr_coren_enfermeiro" class="validate" placeholder="___.___" maxlength="7">
        <p>Estado</p>
        <select id="estado" name="sg_estado_enfermeiro" class="validate" >
 
        </select>
        <p>Crie uma senha</p>
        <div class="formRow">
            <?php
            $senha = $_POST['senha_enfermeiro'];
            echo "<input id='senha' type='password' name='senha_enfermeiro' class='validate' value='$senha'>"
            ?>
            <div class="eyeVisible aberto" id="visibleEye"></div>
        </div>
        <snaN id="passwordVerify">
        <char id="char" style="color: rgb(13, 44, 97);">✔ Caracteres</char>
        <num id="num" style="color: rgb(13, 44, 97);">✔ Número</num>
        <special id="special" style="color: rgb(13, 44, 97);">✔ Caracter especial</special>
        </snaN>
        <p>Repita sua senha</p>
        <div class="formRow">
            <?php
            $senha = $_POST['senha_enfermeiro'];
            echo "<input id='senhaConfirm' type='password' name='senha_enfermeiro' class='validate' value='$senha'>"
            ?>
            <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
        </div>
        <div class="button">
            <input type="submit" class="meuBotao" id="cdsrt" value="Cadastre-se">
            <p>Já possui um cadastro? <a href="login.html">Entre!</a></p>

            <div id="overlay-cadastro" class="black"></div>

            <div id="popup-cadastro" class="pop">
                <img src="css/media/arroba.png" id="apop">
                <h2>Um link de confirmação foi enviado para seu email</h2>
            </div>
        </div>
    </div>

<?php
    include "conexao.php";

    $name = $_POST['nm_enfermeiro'];
    $email = $_POST['email_enfermeiro'];
    $coren = $_POST['nr_coren_enfermeiro'];
    $estado = $_POST['sg_estado_enfermeiro'];
    $senha = $_POST['senha_enfermeiro'];

    $sqlVerify = "SELECT * from tb_enfermeiro
    where id_coren_enfermeiro = '$coren';"; //$sql = SELECT from mysql


    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

    if ($result->num_rows > 0) { // para cada coluna
        while($row = $result->fetch_assoc()) {
          if ($coren && $coren == $row["id_coren_enfermeiro"]){
            echo '<script>
            history.back();
            </script>'; // volta para página anterior
          }
        }
    }
    else{
        $sql = "INSERT INTO tb_enfermeiro VALUES ('$coren', '$name', '$email', '$estado', '$senha')";
        mysqli_query($conn, $sql);
        echo '<script>
        document.getElementById("overlay-cadastro").classList.add("show");
        document.getElementById("popup-cadastro").classList.add("show");
        setTimeout(function () {
            window.location.href = "login.php";
        }, 2000);
        </script>';
    }
?>

</body>

</html>

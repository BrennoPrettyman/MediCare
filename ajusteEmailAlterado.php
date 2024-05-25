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

    <div class="Bloco01">
        <h2>Redefina seu E-mail</h2>
        <p>Insira o novo endereço de email desejado para redefinição. Em seguida, enviaremos um link de confirmação.</p>

        <div class="container form">
        <span>E-mail</span>
        <input id="email" name="email" type="email" class="validate">

        <div class="button">
            <button class="meuBotao" id="recuperar">Enviar Link</button>

            <div id="overlay-ajustar" class="black"></div>

            <div id="popup-ajustar" class="pop">
                <img src="css/media/arroba.png" id="apop">
                <h3>Um link de confirmação foi enviado para seu novo email</h3>
            </div>
        </div>
        </div>

    </div>
    <a href="ajustes.html"><img src="css/media/setabranca.png" class="seta"></a>
    <?php
    include "conexao.php";

    session_start(); 
    $coren = $_SESSION['coren_enfermeiro'];

    $novoEmail = $_POST['email'];

    $sqlVerify = "SELECT * from tb_enfermeiro
    where id_coren_enfermeiro = '$coren';"; //$sql = SELECT from mysql


    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

    if ($result->num_rows > 0) { // para cada coluna
        while($row = $result->fetch_assoc()) {
          if ($coren && $coren == $row["id_coren_enfermeiro"]){
            $sql = "UPDATE tb_enfermeiro SET email_enfermeiro = '". $novoEmail ."' where id_coren_enfermeiro = '$coren';";
            mysqli_query($conn, $sql);
          }
        }
    }

    echo '<script>
        document.getElementById("overlay-ajustar").classList.add("show");
        document.getElementById("popup-ajustar").classList.add("show");
        setTimeout(function () {
            window.location.href = "ajustes.html";
        }, 2000);
        </script>';

    ?>
</body>

</html>

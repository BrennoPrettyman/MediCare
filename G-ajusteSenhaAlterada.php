<!DOCTYPE html>
<html lang="pt-BR">

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

    <title>MediCare - Redefinir Senha</title>
</head>

<body>
    <h1>MediCare</h1>
    <div class="Bloco02" id="block2">
        <div class="container form">
            <h2>Redefina sua senha</h2>
            <p>Crie uma nova senha forte de no minímo sete caracteres, contendo números, letras e um caracter especial</p>
            
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
                <special id="special">ﾠ• Caractere Especial</special>
            </snaN>

        
            <p>Repita sua senha</p>
            <div class="formRow">
                <?php
                $password = $_POST['passnha'];
                echo "<input id='senhaConfirm' type='password' class='validate' required value='$password'>";
                ?>
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
        </div>
    </div>
    <a href="G-ajustes.html"><img src="css/media/setabranca.png" class="seta"></a>
    <?php
    include "conexao.php";

    session_start(); 
    $coren = $_SESSION['id_coren_coordenador'];

    $novaSenha = $_POST['passnha'];

    $sqlVerify = "SELECT * from tb_coordenador
    where id_coren_coordenador = '$coren';"; //$sql = SELECT from mysql


    $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

    if ($result->num_rows > 0) { // para cada coluna
        while($row = $result->fetch_assoc()) {
          if ($coren && $coren == $row["id_coren_coordenador"]){
            $sql = "UPDATE tb_coordenador SET senha_coordenador = '". $novaSenha ."' where id_coren_coordenador = '$coren';";
            mysqli_query($conn, $sql);
          }
        }
    }
    
    echo '<script>
        document.getElementById("overlay-redefinir").classList.add("show");
        document.getElementById("popup-redefinir").classList.add("show");
        setTimeout(function () {
            window.location.href = "G-ajustes.html";
        }, 2000);
        </script>';

    ?>
</body>

</html>
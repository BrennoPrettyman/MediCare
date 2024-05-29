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
        <input id="nome" type="text" name="nm_enfermeiro" class="validate" maxlength="45" required>
        <p>E-Mail</p>
        <input id="email" type="email" name="email_enfermeiro" class="validate" maxlength="45" required>
        <p>Cargo</p>
        <select id="cargo" name="sg_cargo" class="validate" required>
            <option value="" selected disabled hidden>Selecione um cargo</option>
            <option value="TEnf">Técnico de Enfermagem</option>
            <option value="CEnf">Coordenação de Enfermagem</option>
        </select>
        <p>Coren</p>
        <input id="coren" type="text" name="nr_coren_enfermeiro" class="validate" placeholder="___.___" maxlength="7" required>
        <snaF id="corenVerify"></snaF>
        <p>Estado</p>
        <select id="estado" name="sg_estado_enfermeiro" class="validate" required>
            <option value="" selected disabled hidden>Selecione um estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
        <p>Crie uma senha</p>
        <div class="formRow">
            <input id="senha" type="password" name="senha_enfermeiro" maxlength="45" class="validate" required>
            <div class="eyeVisible aberto" id="visibleEye"></div>
        </div>
        <snaN id="passwordVerify">
        <char id="char">• 7 Caracteres</char>
        <num id="num">• Número</num>
        <special id="special">• Caracter Especial</special>
        </snaN>
        <p>Repita sua senha</p>
        <div class="formRow">
            <input id="senhaConfirm" type="password" class="validate" required>
            <div class="eyeVisible aberto" id="visibleEyeConfirm"></div>
        </div>
        <snaF id="wrongPassword"></snaF>
        <div class="button">
            <input type="submit" class="meuBotao" id="cdsrt" value="Cadastre-se">
            <p>Já possui um cadastro? <a href="login.php">Entre!</a></p>

            <div id="overlay-cadastro" class="black"></div>

            <div id="popup-cadastro" class="pop">
                <img src="css/media/arroba.png" id="apop">
                <h2>Um link de confirmação foi enviado para seu email</h2>
            </div>
        </div>

<?php
    include "conexao.php";

    $name = $_POST['nm_enfermeiro'];
    $email = $_POST['email_enfermeiro'];
    $cargo = $_POST['sg_cargo'];
    $coren = $_POST['nr_coren_enfermeiro'];
    $estado = $_POST['sg_estado_enfermeiro'];
    $senha = $_POST['senha_enfermeiro'];

    print_r ($cargo);
    if ($cargo == "TEnf"){
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
            session_start(); // inicia o 'localstorage'
            $_SESSION['coordenador_coren'] = $coren; // cria localstorage com nome 'coren_enfemeiro' e insere valor
            mysqli_query($conn, $sql);
            echo '<script>
            document.getElementById("overlay-cadastro").classList.add("show");
            document.getElementById("popup-cadastro").classList.add("show");
            setTimeout(function () {
                window.location.href = "login.php";
            }, 2000);
            </script>';
        }
    }
    else if ($cargo == "CEnf"){
        $sqlVerify = "SELECT * from tb_coordenador
        where id_coren_coordenador = '$coren';"; //$sql = SELECT from mysql
    
        $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    
        if ($result->num_rows > 0) { // para cada coluna
            while($row = $result->fetch_assoc()) {
              if ($coren && $coren == $row["id_coren_coordenador"]){
                echo '<script>
                history.back();
                </script>'; // volta para página anterior
              }
            }
        }
        else{
            $sql = "INSERT INTO tb_coordenador VALUES ('$coren', '$name', '$email', '$estado', '$senha')";
            mysqli_query($conn, $sql);
            echo '<script>
            document.getElementById("overlay-cadastro").classList.add("show");
            document.getElementById("popup-cadastro").classList.add("show");
            setTimeout(function () {
                window.location.href = "Gestao.html";
            }, 2000);
            </script>';
        }
    }
?>

</body>

</html>

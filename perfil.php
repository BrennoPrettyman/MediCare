<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/nomeToUpper.js"></script>

    <title>MediCare - Perfil</title>
</head>

<body>
<?php
    include "conexao.php";

    session_start(); 

    $coren = $_SESSION['coren_enfermeiro'];

    $sql = "SELECT * from tb_enfermeiro where id_coren_enfermeiro = '$coren';";
    //coren, sg estado, senha
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo '<h1>MediCare</h1>
        <P>Perfil</P>
            
        <div class="bloco1">
            <img src="pics/perfilblue.png" id="ppic">
            <h2 id="nm_enfermeiro">'; // possui um function
            print_r($row['nm_enfermeiro']); // inserção de dados (Nome)
        echo '</h2>
        </div>
            
        <div id="infos">
            <div class="bloco2">
                <img src="pics/arroba.png" id="iinfo">
                <h3>';
                print_r($row["email_enfermeiro"]); // inserção de dados (Email)
        echo '</h3>
            </div>
            <div class="bloco3">
                <img src="pics/listpeople.png" id="iinfo">
                <h3>';
                print_r($row["id_coren_enfermeiro"]); // inserção de dados (Coren)
                echo "-";
                print_r($row["sg_estado_enfermeiro"]); // inserção de dados (SG Estado)
        echo '</h3>
            </div>
            <div class="bloco3">
                <img src="pics/predio.png" id="iinfo">
                <h3>Andar 01</h3>
            </div>
        </div>';
        }
    }
?>
    <div id="acao">
        <div class="buttons">
            <a href="ajustes.html"><img src="pics/ajst.png" id="aicon"></a>
            <h4>Ajustes</h4>
        </div>
        <div class="buttons">
            <a href="https://nibutera.github.io/MediCareQuemSomos"><img src="pics/quem somos.png" id="aicon"></a>
            <h4>Quem somos</h4>
        </div>
        <div class="buttons">
            <a href="index.html"><img src="pics/sair.png" id="aicon"></a>
            <h4>Encerrar Turno</h4>
        </div>
    </div>
    <div class="navbar">
        <a href="homeC.html"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
        <a href="relatorio.html"><img src="pics/relatorios.png" class="icon" id="PaperIcon"></a>
        <a href="historico.html"><img src="pics/history.png" class="icon" id="ClockIcon"></a>
        <a href="perfil.php"><img src="pics/INperfil.png" class="icon" id="PeopleIcon"> </a>
    </div>

</body>

</html>
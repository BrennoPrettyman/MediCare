<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/G-BarraPesquisa.css">
    <link rel="stylesheet" href="css/G-Pesquisa.css">
    <link rel="stylesheet" href="css/G-Navbar.css">
    <link rel="stylesheet" href="css/G-Icons.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/icons.css">
    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Gestão</title>
</head>

<body>
    <!-- HEADER -->
    <div class="content">
        <h1>MediCare</h1>
        <p>Gestão</p>
    </div>

    
<?php
    include "conexao.php";

    session_start(); 
    $coren = $_SESSION['coordenador_coren'];

    $sql = "SELECT * from tb_coordenador where id_coren_coordenador = '$coren';";
    //coren, sg estado, senha
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo '            
        <div class="bloco1">
            <img src="pics/perfilblue.png" id="ppic">
            <h2 id="nm_enfermeiro">'; // possui um function
            print_r($row['nm_coordenador']); // inserção de dados (Nome)
        echo '</h2>
        </div>
            
        <div id="infos">
            <div class="bloco2">
                <img src="pics/arroba.png" id="iinfo">
                <h3>';
                print_r($row["email_coordenador"]); // inserção de dados (Email)
        echo '</h3>
            </div>
            <div class="bloco3">
                <img src="pics/listpeople.png" id="iinfo">
                <h3>';
                print_r($row["id_coren_coordenador"]); // inserção de dados (Coren)
                echo "-";
                print_r($row["sg_estado_coordenador"]); // inserção de dados (SG Estado)
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
        <a href="Gestao.html"><img src="pics/casaA.png" id="Voltar"></a>
        <div class="BoxSelec">
            <img src="pics/perfilB.png" id="F-Icon">
            <a> <h8>Perfil</h8></a>
        </div>
        <a href="G-Pesquisa.html"><img src="pics/lupaNavA.png" id="Voltar"></a>
    </div>

</body>

</html>
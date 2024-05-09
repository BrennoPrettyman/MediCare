<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/atender.js"></script>
    <title>MediCare - Home</title>
</head>

<body>
    <h1>MediCare</h1>
    <P>Início</P>

    <div class="bloco1">
        <h2>Andar 01</h2>

        <div class="box">
            <img src="pics/relogio.png" class="ClockIcon">
            <h3>Aguardando o chamado do paciente</h3>
        </div>

        <div class="box2">
            <?php
                include "conexao.php";

                $sqlVerify = "SELECT * from tb_quarto;"; //$sql = SELECT from mysql
            
                $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if ($row['cd_quarto'] == 3){
                            echo "<h4>Quarto ".str_pad($row['nr_quarto'],2,"0",STR_PAD_LEFT)."</h4>";
                            echo "<h5>Leito 10</h5>";
                            echo "<button class='btn' id='atender".$row['cd_quarto']."' onclick='atender(".$row['nr_quarto'].",10,1)'>Atender</button>";
                        }
                    }
                }
            ?>
        </div>

        <h2>Chamados Atendidos</h2>
        
        <div class="box3">
            <div class="content">
                <h4>Quarto 05</h4>
                <h5>Leito 04</h5>
            </div>
            <a href="historico.html"><img src="pics/historygray.png" id="GrayClockIcon"></a>
        </div>
        
        <div class="navbar">
            <a href="homeC.html"><img src="pics/INhome.png" class="icon" id="HomeIcon"></a>
            <a href="relatoriovazio.html"><img src="pics/relatorios.png" class="icon" id="PaperIcon"></a>
            <a href="historico.html"><img src="pics/history.png" class="icon" id="ClockIcon"></a>
            <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
        </div>
</body>

</html>
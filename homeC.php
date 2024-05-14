<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indexC.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">
    
    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <!-- JAVASCRIPT -->
    <script src="js/atender.js"></script>

    <title>MediCare - Home</title>
</head>

<body>
    <h1>MediCare</h1>
    <P>Início</P>

    <div class="bloco1">
        <h2>Andar 01</h2>

            <?php
                include "conexao.php";

                $sqlVerify = "SELECT * from tb_quarto;"; //$sql = SELECT from mysql
            
                $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if ($row['cd_quarto']){
                            $sqlVerifyLeito = "SELECT * from tb_leito where fk_cd_quarto_quarto = '".$row['cd_quarto']."';"; //$sql = SELECT from mysql
                            $resultLeito = mysqli_query($conn, $sqlVerifyLeito); // verifica no banco de dados
                            while($row2 = $resultLeito->fetch_assoc()) {
                                if ($row2['fk_cd_quarto_quarto'] && $row2['id_leito'] == 1){
                                    echo "<div class='box'>";
                                    echo "<h3>Quarto ".str_pad($row['nr_quarto'],2,"0",STR_PAD_LEFT)."</h3>";
                                    echo "<h4>Leito ".str_pad($row2['id_leito'],2,"0",STR_PAD_LEFT)."</h4>";
                                    echo "<button class='btn' id='atender".$row['cd_quarto']."' onclick='atender(".$row['nr_quarto'].",10,1)'>Atender</button>";
                                    echo "</div>";
                                }
                            }
                            
                        }
                    }
                }
            ?>

    <div class="navbar">
        <a href="home.php"><img src="pics/INhome.png" class="icon" id="HomeIcon"></a>
        <a href="historico.php"><img src="pics/history.png" class="icon" id="ClockIcon"></a>
        <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
    </div>
</body>
</html>
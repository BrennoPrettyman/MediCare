<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/historico.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Histórico</title>
</head>

<body>
    <div class="box2">
        <div class="content">
            <h1>MediCare</h1>
            <p>Histórico</p>
        </div>
        <a href="filtro.html"><img src="pics/filtrerblue.png" id="filtro"></a>
    </div>

    <div class="bloco1">
        <h2>Andar 01</h2>

            <?php
                include "conexao.php";

                $sqlVerify = "SELECT cd_chamado, fk_cd_esp_atividade from tb_chamado;"; //$sql = SELECT from mysql
            
                $chamdoFound = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

                if ($chamdoFound->num_rows > 0) {
                    while($row = $chamdoFound->fetch_assoc()) {
                        //echo "Chave Estrangeira:";
                        //print_r($row['fk_cd_esp_atividade']);

                        $sqlVerifyESP = "SELECT * from tb_esp_atividade where cd_esp_atividade = '".$row['fk_cd_esp_atividade']."' "; //$sql = SELECT from mysql
                        $espFound = mysqli_query($conn, $sqlVerifyESP); // verifica no banco de dados
                        if ($espFound->num_rows > 0) {
                            while($row2 = $espFound->fetch_assoc()) {
                                //echo " | Código ESP Atividade:";
                                //print_r($row2['cd_esp_atividade']);

                                $sqlVerifyLeito = "SELECT * from tb_leito where id_leito = '".$row2['fk_id_leito_leito']."' "; //$sql = SELECT from mysql
                                $leitoFound = mysqli_query($conn, $sqlVerifyLeito); // verifica no banco de dados

                                if ($leitoFound->num_rows > 0) {
                                    while($row3 = $leitoFound->fetch_assoc()) {
                                        //echo " | Id Leito:";
                                        //print_r($row3['id_leito']);

                                        $sqlVerifyQuarto = "SELECT * from tb_quarto where cd_quarto = '".$row3['fk_cd_quarto_quarto']."' "; //$sql = SELECT from mysql
                                        $quartoFound = mysqli_query($conn, $sqlVerifyQuarto); // verifica no banco de dados

                                        if ($quartoFound->num_rows > 0) {
                                            while($row4 = $quartoFound->fetch_assoc()) {
                                                //echo " | Código Quarto:";
                                                //print_r($row4['cd_quarto']);
                                                echo "<div class='box'>";
                                                echo "<div class='content'>";
                                                echo "<h3>Quarto ".str_pad($row4['nr_quarto'],2,"0",STR_PAD_LEFT)."</h3>";
                                                echo "<h4>Leito ".str_pad($row3['id_leito'],2,"0",STR_PAD_LEFT)."</h4>";
                                                echo "</div>";
                                                echo "<button style='background-color:transparent;border:none' onclick='(alert(".$row['cd_chamado']."))'><img src='pics/SetaBlueGo.png' id='SetaBlueGo'></button>";                        
                                                echo "</div>";
                                            }
                                        }
                                        
                                    }
                                }
                                
                            }
                        }
                    }
                }
            ?>
        </div>

        <div class="box">
            <div class="content">
                <h3>Quarto 01</h3>
                <h4>Leito 10</h4>
            </div>
            <a href="historicoinfo.html"><img src="pics/SetaBlueGo.png" id="SetaBlueGo"></a>
        </div>

        <div class="navbar">
            <a href="home.php"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
            <a href="relatorio.html"><img src="pics/relatorios.png" class="icon" id="PaperIcon"></a>
            <a href="historico.php"><img src="pics/INhistory.png" class="icon" id="ClockIcon"></a>
            <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
        </div>
    </div>
</body>
</html>
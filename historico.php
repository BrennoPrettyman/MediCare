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

        <!-- <div class="box">
            <?php /*
                include "conexao.php";

                $sqlVerify = "SELECT * from tb_chamado;"; //$sql = SELECT from mysql
            
                $result = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if ($row['cd_quarto'] == 3){
                            echo "<div class="content">";
                            echo "<h3>Quarto ".str_pad($row['nr_quarto'],2,"0",STR_PAD_LEFT)."</h3>";
                            echo "<h4>Leito 10</h4>";
                            echo "</div>";
                            echo "<button onclick='()'><img src='pics/SetaBlueGo.png' id='SetaBlueGo'></button>";

                        }
                    }
                }*/
            ?>
        </div> -->

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
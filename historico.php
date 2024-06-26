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

    <script src="js/historicoSelect.js"></script>
    <script src="js/filtroHistorico.js"></script>
    <script src="js/reloadPage.js"></script>

    <title>MediCare - Histórico</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <div class="box2">
        <div class="content">
            <h1>MediCare</h1>
            <p>Histórico</p>
        </div>
        <a href="filtro.php"><img src="pics/filtrerblue.png" id="filtro"></a>
    </div>
    <h2>Andar 01</h2>
    <div class="bloco1 flexList" id="blocked">
            <?php
            include "conexao.php";

            session_start(); 
            if (count($_SESSION) > 0 && in_array($_SESSION["id_coren_enfermeiro"], $_SESSION)){
                $coren = $_SESSION["id_coren_enfermeiro"];
            }
            else{
                echo "<script>window.location.href = 'index.html';</script>";
            }

            $sqlVerify = "SELECT * from tb_chamado as c,
            tb_enfermeiro as en,
            tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q 
            where e.cd_esp_atividade = c.fk_cd_esp_atividade
            and l.id_leito = e.fk_id_leito_leito
            and q.cd_quarto = l.fk_cd_quarto_quarto
            and en.id_coren_enfermeiro = c.fk_id_coren_enfermeiro
            and c.fk_id_coren_enfermeiro = $coren;"; //$sql = SELECT from mysql
        
            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    echo "<div class='box btn' mtv='".$row['ds_motivo']."' dt='".$row['dt_inicio_chamado']."' id='".$row['nr_quarto']."' style='order:-".$row['cd_chamado']."'>";
                    echo "<div class='content'>";
                    echo "<h3>Quarto ".str_pad($row['nr_quarto'],2,"0",STR_PAD_LEFT)."</h3>";
                    echo "<h4>Leito ".str_pad($row['id_leito'],2,"0",STR_PAD_LEFT)."</h4>";
                    echo "</div>";
                    
                    $nrQuarto = $row["nr_quarto"];
                    $idLeito = $row["id_leito"];
                    $dtInicio = $row["dt_inicio_chamado"];
                    $hrInicio = $row["hr_inicio_chamado"];
                    $hrFim = $row["hr_fim_chamado"];
                    $dsMotivo = $row["ds_motivo"];
                    echo "<button style='background-color:transparent;border:none' onclick='opnix(1,\"$nrQuarto\",\"$idLeito\",\"$dtInicio\",\"$hrInicio\",\"$hrFim\",\"$dsMotivo\");'><img src='pics/SetaBlueGo.png' id='SetaBlueGo'></button>";                        
                    echo "</div>";
                }
            }
                else{
                    echo '
                    <div class="bloco" style="width:85%;">
                    <img src="css/media/enf.png" id="enf">
                    <h5>Histórico Vazio</h5>
                    </div>
                    
                    ';
                }

            ?>
        </div>
        <div class="navbar">
            <a href="homeC.php"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
            <a href="historico.php"><img src="pics/INhistory.png" class="icon" id="ClockIcon"></a>
            <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
        </div>
    </div>
</body>
</html>
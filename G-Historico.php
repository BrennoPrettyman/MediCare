<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/G-BarraPesquisa.css">
    <link rel="stylesheet" href="css/G-Historico.css">
    <link rel="stylesheet" href="css/G-NavbarH.css">
    <link rel="stylesheet" href="css/G-Icons.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/preencherPesquisa.js"></script>
    <title>MediCare - Gestão</title>
</head>

<body>
    <!-- HEADER -->
    <div class="content">
        <h1>MediCare</h1>
        <p>Gestão</p>
    </div>

    <!-- INFO ENF -->
    <div class="box" id="0">
        <div class="book">
            <img src="css/media/relogioH.png" id="book" width="55px">
            <div class="infos">
                <h2>Histórico</h2>
                <h3 id="enfermeiro">Thayna Santos | 123.456-SP </h3>
            </div>
        </div>
        <div class="infos2">
            <div class="info-item">
                <img src="css/media/predio.png" id="InfoH">
                <h4 id="andar">Andar 02</h4>
            </div>
            <div class="info-item">
                <img src="css/media/porta.png" id="InfoH">
                <h4 id="quarto">Quarto 02</h4>
            </div>
        </div>
    </div>

    <div class="container">

        <?php
            include "conexao.php";

            $id_coren = $_POST['coren'];
            $sg_estado = $_POST['estado'];

            $sqlVerify = "SELECT * from tb_chamado as c,
            tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q,
            tb_enfermeiro as en
            where e.cd_esp_atividade = c.fk_cd_esp_atividade
            and l.id_leito = e.fk_id_leito_leito
            and q.cd_quarto = l.fk_cd_quarto_quarto
            and en.id_coren_enfermeiro = c.fk_id_coren_enfermeiro
            and c.fk_id_coren_enfermeiro = '$id_coren'
            and en.sg_estado_enfermeiro = '$sg_estado';"; //$sql = SELECT from mysql
            
            $nr_quartos = [];
            $btnHTML = '';
            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    if ($row["nm_enfermeiro"]){
                        array_push($nr_quartos,$row["nr_quarto"]);
                        echo '
                        <div class="box" dt="'.$row['dt_inicio_chamado'].'" lt="'.$row['id_leito'].'" nr="'.$row['nr_quarto'].'" id="'.$row['id_coren_enfermeiro'].'" style="order:-'.$row['cd_chamado'].'">
                            <div class="infos2">
                                <div class="info-item">
                                    <img src="css/media/cama.png" id="leito">
                                    <h5>Leito '.str_pad($row['id_leito'],2,"0",STR_PAD_LEFT).'</h5>
                                </div>
                                <div id="InfoLeito">
                                    <h4>Data - '.substr($row['dt_inicio_chamado'],8).'/'.substr($row['dt_inicio_chamado'],5,2).'/'.substr($row['dt_inicio_chamado'],0,4).'</h4>
                                    <h4>Início - '.$row['hr_inicio_chamado'].'</h4>
                                    <h4>Encerramento - '.$row['hr_fim_chamado'].'</h4>
                                    <h4>Motivo - '.$row['ds_motivo'].'</h4>
                                </div>
                            </div>
                        </div>';
                    }
               }
            }
            if (count($nr_quartos) < 1){
                echo '<button class="btn3 botao-adicional">Não há quartos</button>';
            }
        ?>

        </div>

    </div>
    
    <div class="navbar">
        <a href="G-Pesquisa.php"><img src="pics/setablue.png" id="Voltar"></a>
        <div class="MeioBox">
            <img src="pics/filtroA.png" id="F-Icon">
            <form action="G-Filtro.php" method="post">
                <input type="text" name="corenFake" id="corenFake" hidden>
                <input type="text" name="quartoFake" id="quartoFake" hidden>
                <input type="submit" class="fakeA" value="Filtros">
            </form>
        </div>
        <a href="G-Perfil.php"><img src="pics/perfilA.png" id="Voltar"></a>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/G-Navbar.css">
    <link rel="stylesheet" href="css/G-Icons.css">
    <link rel="stylesheet" href="css/G-Index.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="js/clrfilter.js"></script>

    <title>MediCare - Gestão</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <!-- HEADER -->
    <div class="content">
        <h1>MediCare</h1>
        <p>Gestão</p>
    </div>

    <div class="container">
    <div class="Box-E1">
        <div class="book">
            <img src="pics/estatisticas.png" id="book" width="55px">
            <div class="infos">
                <h2>Estatisticas</h2>
                <h3>Por: Motivo do Chamado</h3>
            </div>
        </div>
           
        <div class="grafico">
            <canvas id="myChart" style="width:50%;height:100px;background-color: transparent;padding: 25px 0px 25px 0px;"></canvas>
            <?php
            include "conexao.php";
            $motivos = ["Mudança de Decúbito","Higiene Pessoal","Fortes Dores","Reclamação","Queda","Parada Cardíaca","Outros Motivos"];
            $quantidade = [];
            $total = 0;
            $totalOptions = 0;
            $quantidadeOutros = 0;
            $colors = ["#0e284b","#0085db","#50ceff","#004776","#136da8","#064eae","#001199"];

            for ($i=0; $i < count($motivos); $i++) { 
                $sqlVerify = "SELECT count(cd_chamado) from tb_chamado where ds_motivo = '".$motivos[$i]."';"; //$sql = SELECT from mysql
                $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados

                if ($sqlResult->num_rows > 0) {
                    while($row = $sqlResult->fetch_assoc()) {
                        if ($row["count(cd_chamado)"]){
                            array_push($quantidade,$row["count(cd_chamado)"]);
                            $totalOptions += $row["count(cd_chamado)"];
                        }
                        else{
                            array_push($quantidade,0);
                        }
                    }
                }
            }

            $sqlCountTotal = "SELECT count(cd_chamado) from tb_chamado;"; //$sql = SELECT from mysql
            $sqlResult2 = mysqli_query($conn, $sqlCountTotal); // verifica no banco de dados
            if ($sqlResult2->num_rows > 0) {
                while($row = $sqlResult2->fetch_assoc()) {
                    $quantidadeOutros += $row["count(cd_chamado)"];
                    $total += $row["count(cd_chamado)"];
                }
                $quantidadeOutros = $quantidadeOutros - $totalOptions;
                array_push($quantidade,$quantidadeOutros);
            }
            echo '<script>
                var xValues = '.json_encode($motivos).';
                var yValues =  '.json_encode($quantidade).';
                var barColors = '.json_encode($colors).';

                new Chart("myChart", {
                  type: "pie",
                  data: {
                    labels: xValues,
                    datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                    }]
                  },
                  options: {
                        responsive: true,
                        legend: {
                            display: false,
                        },
                        elements: {
                            arc: {
                                borderWidth: 0
                            }
                        }
                    }
                });
            </script>';
            ?>
        </div>
        
        <?php
        for ($i=0; $i < count($motivos); $i++) {
            if ($total > 0){
                $porcento = round(($quantidade[$i+1]/$total)*100);
            }
            else{
                $porcento = "...";
            }
            echo '
            <div class="box2">
                <div class="book">
                    <label id="ColorInfo" class="colorCircle" style="box-shadow: '.$colors[$i].' 0px 0px 6px 20px inset;">.</label><br>
                    <h4>'.$motivos[$i].'</h4>
                    <h5>'.$porcento.'%</h5>
                </div>
            </div>
            ';
        }
        ?>
    </div>
    <br>
    <div class="Box-E2">
        <div class="book">
            <img src="pics/estatisticas.png" id="book" width="55px">
            <div class="infos">
                <h2>Estatisticas</h2>
                <h3>Por: Quarto mais Chamados</h3>
            </div>
        </div>
           
        <div class="grafico">
            <canvas id="myChart2" style="width:50%;height:100px;background-color: transparent;padding: 25px 0px 25px 0px;"></canvas>
            <?php
            include "conexao.php";
            $quartoFamoso = [];
            $quantidadeQrt = [];
            $colorsQuarto = ["#0e284b","#0085db","#50ceff","#004776","#136da8","#064eae"];
            $sqlVerify = "SELECT q.nr_quarto, count(c.cd_chamado) from tb_chamado as c,
            tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q
            where c.fk_cd_esp_atividade = e.cd_esp_atividade
            and e.fk_id_leito_leito = l.id_leito
            and l.fk_cd_quarto_quarto = q.cd_quarto
            group by q.nr_quarto;"; //$sql = SELECT from mysql
            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    if ($row["nr_quarto"]){
                        if ($row["count(c.cd_chamado)"]){
                            array_push($quartoFamoso,"Quarto ".$row["nr_quarto"]);
                            array_push($quantidadeQrt,$row["count(c.cd_chamado)"]);
                        }
                        else{
                            array_push($quartoFamoso,"Quarto ".$row["nr_quarto"]);
                            array_push($quantidadeQrt,0);
                        }
                    }
                }
            }
            echo '<script>
                var xValues = '.json_encode($quartoFamoso).';
                var yValues =  '.json_encode($quantidadeQrt).';
                var barColors = '.json_encode($colorsQuarto).';

                new Chart("myChart2", {
                  type: "pie",
                  data: {
                    labels: xValues,
                    datasets: [{
                      backgroundColor: barColors,
                      data: yValues
                    }]
                  },
                  options: {
                        responsive: true,
                        legend: {
                            display: false,
                        },
                        elements: {
                            arc: {
                                borderWidth: 0
                            }
                        }
                    }
                });
            </script>';
            ?>
        </div>
        <div class="flexList" style="display:flex;flex-direction:column;">
        <?php
        $total = 0;
        for ($i2=0; $i2 < count($quantidadeQrt); $i2++) { 
            $total += $quantidadeQrt[$i2];
        }
        for ($i=0; $i < count($quartoFamoso); $i++) {
            if ($total > 0){
                $porcento = round(($quantidadeQrt[$i]/$total)*100);
            }
            else{
                $porcento = "...";
            }
            echo '
            <div class="box2" style="order: -'.$quantidadeQrt[$i].';margin:5px">
                <div class="book">
                <label id="ColorInfo" class="colorCircle" style="box-shadow: '.$colorsQuarto[$i].' 0px 0px 6px 20px inset;">.</label><br>
                    <h4>'.$quartoFamoso[$i].'</h4>
                    <h5>'.$porcento.'%</h5>
                </div>
            </div>
            ';
        }
        ?>

        </div>
    </div>
    <div class="container">
    </div>
    

    <div class="navbar">
        <a href="G-Pesquisa.php"><img src="pics/lupaNavA.png" id="Voltar"></a>
        <div class="BoxSelec">
            <img src="pics/casaB.png" id="F-Icon">
            <a>
                <h8>Início</h8>
            </a>
        </div>
        <a href="G-Perfil.php"><img src="pics/perfilA.png" id="Voltar"></a>
    </div>
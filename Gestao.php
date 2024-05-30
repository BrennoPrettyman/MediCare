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

    <title>MediCare - Gestão</title>
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
            $motivos = ["Mudança de Decúbito", "Higiêne Pessoal", "Fortes Dores", "Reclamação","Queda", "Parada Cardiáca"];
            $quantidade = [0,0,0,0,0,0];
            for ($i=0; $i < count($motivos); $i++) { 
                $sqlVerify = "SELECT count(cd_chamado) from tb_chamado where ds_motivo = '".$motivos[$i]."';"; //$sql = SELECT from mysql
                $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    
                if ($sqlResult->num_rows > 0) {
                    while($row = $sqlResult->fetch_assoc()) {
                        print_r($row);
                    }
                }
            }


            echo '<script>
                var xValues = ["'.$motivos[0].'", "'.$motivos[1].'", "'.$motivos[2].'", "'.$motivos[3].'","'.$motivos[4].'", "'.$motivos[5].'"];
                var yValues = '.$quantidade.';
                var barColors = [
                  "#0e284b",
                  "#0085db",
                  "#50ceff",
                  "#004776",
                  "#136da8",
                  "#064eae"
                ];
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

        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo" >
                <h4>Mudança de Decúbito</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo" >
                <h4>Higiêne Pessoal</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Fortes Dores</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Reclamação</h4> 
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Queda</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Parada Cardiáca</h4>
                <h5>45%</h5>
            </div>
        </div>
    </div>

    <div class="Box-E2">
        <div class="book">
            <img src="pics/estatisticas.png" id="book" width="55px">
            <div class="infos">
                <h2>Estatisticas</h2>
                <h3>Por: Tempo de Espera</h3>
            </div>
        </div>
        <div class="grafico">
            <img src="pics/grafico.png" id="grafico">
        </div>

        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo" >
                <h4>Mudança de Decúbito</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo" >
                <h4>Higiêne Pessoal</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Fortes Dores</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Reclamação</h4> 
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Queda</h4>
                <h5>45%</h5>
            </div>
        </div>
        <div class="box2">
            <div class="book">
                <img src="pics/livroA.png" id="ColorInfo">
                <h4>Parada Cardiáca</h4>
                <h5>45%</h5>
            </div>
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
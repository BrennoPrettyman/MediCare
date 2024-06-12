<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/filtro.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/funcoes.js"></script>

    <title>MediCare - Filtro</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <h1>MediCare</h1>
    <P>Histórico | Filtro</P>

    <h2>Filtrar Por:</h2>
    <button class="btn" id="cmdA">Chamados Antecedentes     
        <div id="info" class="info">
        Filtra pelos seus atendimentos antigos, mostrando-os primeiro no histórico
        </div>
    </button>
    <button class='btn' onclick="quartos()">Quartos</button>
    <div class="bloco1" id="block1"></div>

    <button class='btn'  onclick="dates()">Datas</button>
    <div class="bloco1" id="block2"></div>

    <button class='btn' onclick="motivo()">Motivos</button>
    <div class="bloco1" id="block3"></div>

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
            tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q 
            where e.cd_esp_atividade = c.fk_cd_esp_atividade
            and l.id_leito = e.fk_id_leito_leito
            and q.cd_quarto = l.fk_cd_quarto_quarto;"; //$sql = SELECT from mysql
            
            $nr_quartos = [];
            $btnHTML = '';
            $dt_inicios = [];
            $btnHTML2 = '';
            $motivos = [];
            $btnHTML3 = '';
            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    $existe = false;
                    for ($i=0; $i < count($nr_quartos); $i++) { 
                        if ($nr_quartos[$i] == $row["nr_quarto"]){
                            $existe = true;
                        }
                    }
                    if ($existe == false && $coren == $row["fk_id_coren_enfermeiro"]){
                        array_push($nr_quartos,$row["nr_quarto"]);
                        $btnHTML = '<button id="'.$row["nr_quarto"].'" class="btn3 botao-adicional" onclick="selecionado(id)">Quarto '.str_pad($row["nr_quarto"],2,"0",STR_PAD_LEFT).'</button>'.$btnHTML;
                    }

                    $existe2 = false;
                    for ($i=0; $i < count($dt_inicios); $i++) { 
                        if ($dt_inicios[$i] == $row["dt_inicio_chamado"]){
                            $existe2 = true;
                        }
                    }
                    if ($existe2 == false && $coren == $row["fk_id_coren_enfermeiro"]){
                        array_push($dt_inicios,$row["dt_inicio_chamado"]);
                        $btnHTML2 = '<button id="'.$row["dt_inicio_chamado"].'" class="btn3 botao-adicional2" onclick="dataSelect(id)">'.substr($row['dt_inicio_chamado'],8).'/'.substr($row['dt_inicio_chamado'],5,2).'/'.substr($row['dt_inicio_chamado'],0,4).'</button>'.$btnHTML2;
                    }

                    $existe3 = false;
                    for ($i3=0; $i3 < count($motivos); $i3++) { 
                        if ($motivos[$i3] == $row["ds_motivo"]){
                            $existe3 = true;
                        }
                    }
                    if ($existe3 == false){
                        array_push($motivos,$row["ds_motivo"]);
                        $btnHTML3 = '<button id="'.$row["ds_motivo"].'" class="btn3 botao-adicional3" onclick="mtvSelect(id)">'.$row["ds_motivo"].'</button>'.$btnHTML3;        
                    }
               }
            }
            if (count($nr_quartos) < 1){
                $btnHTML = '<button class="btn3 botao-adicional">Não há quartos</button>';
            }
            echo '
            <script>
            // TELA FILTROS - BOTÃO QUARTOS
            localStorage.setItem("filtroQuarto",0);
            localStorage.setItem("filtroData","0000-00-00");
            localStorage.setItem("filtroMotivo","nenhum");

            function selecionado(id){
                localStorage.setItem("filtroQuarto",id);
                localStorage.setItem("filtroData","0000-00-00");
                localStorage.setItem("filtroMotivo","nenhum");
            }

            function dataSelect(id){
                localStorage.setItem("filtroQuarto",0);
                localStorage.setItem("filtroData",id);
                localStorage.setItem("filtroMotivo","nenhum");
            }

            function mtvSelect(id){
                localStorage.setItem("filtroQuarto",0);
                localStorage.setItem("filtroData","0000-00-00");
                localStorage.setItem("filtroMotivo",id);
            }
            
            function quartos() {
                var botoesContainer = document.getElementById("block1");
                var botoesAdicionados = document.querySelectorAll(".botao-adicional");
            
                if (botoesAdicionados.length === 0) {
                        var botoesHTML = `
                        '.$btnHTML.'
                    `;
                    botoesContainer.insertAdjacentHTML("beforeend", botoesHTML);
                }
                else {
                    botoesAdicionados.forEach(function (botao) {
                        botao.remove();
                    });
                }
            }

            function dates() {
                var botoesContainer2 = document.getElementById("block2");
                var botoesAdicionados2 = document.querySelectorAll(".botao-adicional2");
            
                if (botoesAdicionados2.length === 0) {
                        var botoesHTML2 = `
                        '.$btnHTML2.'
                    `;
                    botoesContainer2.insertAdjacentHTML("beforeend", botoesHTML2);
                }
                else {
                    botoesAdicionados2.forEach(function (botao) {
                        botao.remove();
                    });
                }
            }

            function motivo() {
                var botoesContainer3 = document.getElementById("block3");
                var botoesAdicionados3 = document.querySelectorAll(".botao-adicional3");
            
                if (botoesAdicionados3.length === 0) {
                        var botoesHTML3 = `
                        '.$btnHTML3.'
                    `;
                    botoesContainer3.insertAdjacentHTML("beforeend", botoesHTML3);
                }
                else {
                    botoesAdicionados3.forEach(function (botao) {
                        botao.remove();
                    });
                }
            }
            
            var visible = true;
            document.getElementById("cmdA").addEventListener("click", function () {
                var info = document.getElementById("info");
                if (visible == true) {
                    visible = false;
                    info.classList.remove("show");
                }
                else if (visible == false){
                    visible = true;
                    info.classList.add("show");
                }
            });
            </script>
            ';
        ?>
    <div class="navbar">
        <a href="historico.php"><img src="pics/seta.png" class="icon" id="HomeIcon"></a>
        <a href="home.php"><img src="pics/home.png" class="icon" id="HomeIcon"></a>
        <a href="perfil.php"><img src="pics/perfil.png" class="icon" id="PeopleIcon"> </a>
    </div>
</body>

</html>

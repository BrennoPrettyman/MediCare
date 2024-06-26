<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/G-Filtro.css">
    <link rel="stylesheet" href="css/G-Navbar.css">
    <link rel="stylesheet" href="css/G-Icons.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Filtro</title>
    <link rel="icon" type="image/png" href="css/media/MediCareIcon.png">
</head>

<body>
    <h1>MediCare</h1>
    <P>Gestão</P>

    <h2>Filtrar Por:</h2>
    <button class="btn" id="cmdA">Chamados Antecedentes <div id="info" class="info">
        Filtra pelos seus atendimentos antigos, mostrando-os primeiro no histórico
        </div></button>

    <div class="bloco" id="block1">
        <button class="btn" onclick="quartos()">Leitos</button>
    </div>
    <div class="bloco" id="block2">
        <button class="btn" onclick="dates()">Datas</button>
    </div>
    <div class="bloco" id="block3">
        <button class="btn" onclick="motivo()">Motivos</button>
    </div>


    <div class="navbar">
        <a onclick="history.back()"><img src="pics/setablue.png" id="Voltar"></a>
        <?php
            include "conexao.php";

            session_start(); 
            if (count($_SESSION) > 0 && in_array($_SESSION["id_coren_coordenador"], $_SESSION)){
                $coren = $_SESSION["id_coren_coordenador"];
            }
            else{
                echo "<script>window.location.href = 'index.html';</script>";
            }

            $corenUsing = $_POST["corenFake"];
            $quartoUsing = $_POST["quartoFake"];

            $sqlVerify = "SELECT * from tb_chamado as c,
            tb_esp_atividade as e,
            tb_leito as l,
            tb_quarto as q,
            tb_enfermeiro as en
            where e.cd_esp_atividade = c.fk_cd_esp_atividade
            and l.id_leito = e.fk_id_leito_leito
            and q.cd_quarto = l.fk_cd_quarto_quarto
            and en.id_coren_enfermeiro = c.fk_id_coren_enfermeiro
            and c.fk_id_coren_enfermeiro = '$corenUsing'
            and q.nr_quarto = '$quartoUsing';";

            $id_leitos = [];
            $btnHTML = '';
            
            $dt_founds = [];
            $btnHTML2 = '';

            $mtv_founds = [];
            $btnHTML3 = '';

            $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
            if ($sqlResult->num_rows > 0) {
                while($row = $sqlResult->fetch_assoc()) {
                    $existe = false;
                    for ($i=0; $i < count($id_leitos); $i++) { 
                        if ($id_leitos[$i] == $row["id_leito"]){
                            $existe = true;
                        }
                    }
                    if ($existe == false){
                        array_push($id_leitos,$row["id_leito"]);
                        $btnHTML = '<button id="'.$row["id_leito"].'" class="btn3 botao-adicional" onclick="selecionado(id)">Leito '.str_pad($row["id_leito"],2,"0",STR_PAD_LEFT).'</button>'.$btnHTML;        
                    }

                    $existe2 = false;
                    for ($i2=0; $i2 < count($dt_founds); $i2++) { 
                        if ($dt_founds[$i2] == $row["dt_inicio_chamado"]){
                            $existe2 = true;
                        }
                    }
                    if ($existe2 == false){
                        array_push($dt_founds,$row["dt_inicio_chamado"]);
                        $btnHTML2 = '<button id="'.$row["dt_inicio_chamado"].'" class="btn3 botao-adicional2" onclick="dateSelect(id)">'.substr($row['dt_inicio_chamado'],8).'/'.substr($row['dt_inicio_chamado'],5,2).'/'.substr($row['dt_inicio_chamado'],0,4).'</button>'.$btnHTML2;        
                    }

                    $existe3 = false;
                    for ($i3=0; $i3 < count($mtv_founds); $i3++) { 
                        if ($mtv_founds[$i3] == $row["ds_motivo"]){
                            $existe3 = true;
                        }
                    }
                    if ($existe3 == false){
                        array_push($mtv_founds,$row["ds_motivo"]);
                        $btnHTML3 = '<button id="'.$row["ds_motivo"].'" class="btn3 botao-adicional3" onclick="motivoSelect(id)">'.$row["ds_motivo"].'</button>'.$btnHTML3;        
                    }
               }
            }
            if (count($id_leitos) < 1){
                $btnHTML = '<button class="btn3 botao-adicional">Não há leitos</button>';
            }

            if (count($dt_founds) < 1){
                $btnHTML2 = '<button class="btn3 botao-adicional">Não há Datas</button>';
            }

            if (count($mtv_founds) < 1){
                $btnHTML3 = '<button class="btn3 botao-adicional">Outros Motivos</button>';
            }
        
            echo '
            <script>
            // TELA FILTROS - BOTÃO QUARTOS
            localStorage.setItem("filtroQuarto",0);
            localStorage.setItem("filtroData","0000-00-00");
            localStorage.setItem("filtroMotivo","nenhum");
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
            function selecionado(id){
                localStorage.setItem("filtroData","0000-00-00");
                localStorage.setItem("filtroMotivo","nenhum");
                localStorage.setItem("filtroQuarto",id);
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
            function dateSelect(id){
                localStorage.setItem("filtroData",id);
                localStorage.setItem("filtroQuarto",0);
                localStorage.setItem("filtroMotivo","nenhum");
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
            function motivoSelect(id){
                localStorage.setItem("filtroData","0000-00-00");
                localStorage.setItem("filtroQuarto",0);
                localStorage.setItem("filtroMotivo",id);
            }

            document.getElementById("cmdA").addEventListener("click", function () {
                var info = document.getElementById("info");
                if (info.classList.contains("show")) {
                    info.classList.remove("show");
                } else {
                    info.classList.add("show");
                }
            });
            </script>
            ';
        ?>
        <div class="BoxSelec">
            <img src="pics/filtroB.png" id="F-Icon">
            <a> <h8>Filtro</h8></a>
        </div>
        <a href="G-Perfil.php"><img src="pics/perfilA.png" id="Voltar"></a>
    </div>
</body>

</html>
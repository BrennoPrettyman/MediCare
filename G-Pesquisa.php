<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/G-BarraPesquisa.css">
    <link rel="stylesheet" href="css/G-Pesquisa.css">
    <link rel="stylesheet" href="css/G-Navbar.css">
    <link rel="stylesheet" href="css/G-Icons.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <script src="js/coren.js"></script>
    <script src="js/pesquisaQuarto.js"></script>
    <title>MediCare - Gestão</title>
</head>

<body>
    <!-- HEADER -->
    <div class="content">
        <h1>MediCare</h1>
        <p>Gestão</p>
    </div>

    <!-- BARRA PESQUISA -->
    <div class="search">
        <input id="coren" type="text" class="validate" placeholder="Pesquise com Coren" maxlength="7" required>
        <select id="estado" class="validate" required>
            <option value="" selected disabled hidden>__</option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>
    </div>
    
    <!-- INFO ENF -->
    <?php
    include "conexao.php";

    $sqlVerify = "SELECT * from tb_enfermeiro;"; //$sql = SELECT from mysql

    $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
    if ($sqlResult->num_rows > 0) {
        while($row = $sqlResult->fetch_assoc()) {
                echo '<div class="box2" id="'.$row["id_coren_enfermeiro"].'" style="order:-'.$row["id_coren_enfermeiro"].'" hidden>
                    <div class="book">
                        <img src="pics/livroA.png" id="book" width="50px">
                        <h2>Informações</h2>
                    </div>
                    <div class="infos">
                        <div class="info-item">
                            <img src="css/media/people.png" id="I-Info">
                            <h5>'.$row["nm_enfermeiro"].'</h5>
                        </div>
                        <div class="info-item">
                            <img src="css/media/arroba.png" id="I-Info">
                            <h5>'.$row["email_enfermeiro"].'</h5>
                        </div>
                        <div class="info-item">
                            <img src="css/media/listpeople.png" id="I-Info">
                            <h5>'.$row["id_coren_enfermeiro"].'-'.$row["sg_estado_enfermeiro"].'</h5>
                        </div>
                        <div class="info-item">
                            <img src="css/media/predio.png" id="I-Info">
                            <h5>Andar 01</h5>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        ?>
    <button class="hst" id="hst" onclick="historico()" hidden>Histórico</button>


    <?php
        include "conexao.php";
        $sqlVerify = "SELECT * from tb_chamado as c,
        tb_esp_atividade as e,
        tb_leito as l,
        tb_quarto as q,
        tb_enfermeiro as en
        where e.cd_esp_atividade = c.fk_cd_esp_atividade
        and l.id_leito = e.fk_id_leito_leito
        and q.cd_quarto = l.fk_cd_quarto_quarto
        and en.id_coren_enfermeiro = c.fk_id_coren_enfermeiro;"; //$sql = SELECT from mysql
        
        echo '<div class="bloco1" id="block1" hidden>';

        $nr_quartos = [];
        $btnHTML = '';
        $sqlResult = mysqli_query($conn, $sqlVerify); // verifica no banco de dados
        if ($sqlResult->num_rows > 0) {
            while($row = $sqlResult->fetch_assoc()) {
                array_push($nr_quartos,$row["nr_quarto"]);
                $nmEnfermeiro = $row["nm_enfermeiro"];
                $idCoren = $row["id_coren_enfermeiro"];
                $sgEstado = $row["sg_estado_enfermeiro"];
                $nrQuarto = $row["nr_quarto"];
                echo '<div class="box botao-adicional" id="'.$row["id_coren_enfermeiro"].'" hidden>
                <div class="content">
                    <h3>Quarto '.str_pad($row["nr_quarto"],2,"0",STR_PAD_LEFT).'</h3>
                    <h4>Informações</h4>
                </div>
                <img src="pics/SetaBlueGo.png" id="SetaBlueGo" onclick="gatinho(1,\''.$nmEnfermeiro.'\',\''.$idCoren.'\',\''.$sgEstado.'\',\''.$nrQuarto.'\');">
                </div>';
           }
        }
        if (count($nr_quartos) < 1){
            echo '<button class="btn3 botao-adicional">Não há quartos</button>';
        }
        echo '</div>';

        echo '
        <script>
        localStorage.setItem("quartoSelecionado",0);
        var block1 = document.getElementById("block1");
        function historico() {
            var botoesContainer = document.querySelector(".bloco1");
            var botoesAdicionados = document.querySelectorAll(".botao-adicional");
        
            if (botoesAdicionados.length == 0) {
                alert("socorro")
                botoesAdicionados.forEach(function (roomy) {
                    roomy.setAttribute("hidden","");
                    if (corenInput.value == roomy.id){
                        roomy.removeAttribute("hidden");
                        block1.removeAttribute("hidden"); // achou quartos
                    }
                });
            }
            else {
                botoesAdicionados.forEach(function (botao) {
                    boxing.setAttribute("hidden","");
                });
            }
            
        }
        var corenInput = document.getElementById("coren");
        var historyFound = document.getElementById("hst");

        corenInput.addEventListener("keyup",() => {
            historyFound.setAttribute("hidden","");
            var corenFounds = document.querySelectorAll(".box2"); // primeiras caixas (enfermeiro)
            corenFounds.forEach(function (boxing) {
                boxing.setAttribute("hidden","");
                if (corenInput.value == boxing.id){
                    boxing.removeAttribute("hidden");
                    historyFound.removeAttribute("hidden"); // achoou historico
                }
            });
            block1.setAttribute("hidden","");
            var roomFounds = document.querySelectorAll(".block1"); // segunda caixas (quartos)
            roomFounds.forEach(function (roomy) {
                roomy.setAttribute("hidden","");
                if (corenInput.value == roomy.id){
                    roomy.removeAttribute("hidden");
                    block1.removeAttribute("hidden"); // achou quartos
                }
            });
        });
        </script>
        ';
    ?>
    <div class="navbar">
        <a href="Gestao.php"><img src="pics/casaA.png" id="Voltar"></a>
        <div class="BoxSelec">
            <img src="pics/lupaNavB.png" id="F-Icon">
            <a> <h8>Pesquisa</h8></a>
        </div>
        <a href="G-Perfil.php"><img src="pics/perfilA.png" id="Voltar"></a>
    </div>
</body>
</html>
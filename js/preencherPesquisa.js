document.addEventListener("DOMContentLoaded", () => {
    var andar = document.getElementById("andar");
    andar.textContent = "Andar "+localStorage.getItem("nrAndarPesquisa").padStart(2,"0");
    
    var enfermeiro = document.getElementById("enfermeiro");
    enfermeiro.textContent = localStorage.getItem("nomePesquisa")+" | "+localStorage.getItem("corenPesquisa")+"-"+localStorage.getItem("estadoPesquisa");
    
    var quarto = document.getElementById("quarto");
    quarto.textContent = "Quarto "+localStorage.getItem("nrQuartoPesquisa").padStart(2,"0");

    var qrt = localStorage.getItem("nrQuartoPesquisa");
    var cn = localStorage.getItem("corenPesquisa");
    document.getElementById("corenFake").value = cn;
    document.getElementById("quartoFake").value = qrt;
    var filtro = localStorage.getItem("filtroQuarto");
    var filtro2 = localStorage.getItem("filtroData");
    var filtro3 = localStorage.getItem("filtroMotivo");
    if (qrt && qrt > 0){
        var botoesAdicionados = document.querySelectorAll(".box");
        botoesAdicionados.forEach(function (botao) {
            if ((botao.id != 0 && botao.getAttribute("nr") != qrt)
            || (botao.id != 0 && botao.id != cn)
            || (filtro > 0 && botao.getAttribute("lt") != filtro && botao.id != 0)
            || (filtro2 != "0000-00-00" && botao.getAttribute("dt") != filtro2 && botao.id != 0)
            || (filtro3 != "nenhum" && botao.getAttribute("mtv") != filtro3 && botao.id != 0)){
                botao.remove();
            }
        });
    }
})

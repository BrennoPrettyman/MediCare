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
    var filtro = localStorage.getItem("filtroQuarto");
    var filtro2 = localStorage.getItem("filtroData");
    if (qrt && qrt > 0){
        var botoesAdicionados = document.querySelectorAll(".box");
        botoesAdicionados.forEach(function (botao) {
            if ((botao.getAttribute("nr") != qrt && botao.id != cn && botao.id != 0) || (filtro > 0 && botao.getAttribute("lt") != filtro && botao.id != 0)){
                botao.remove();
            }
            if ((botao.getAttribute("nr") != qrt && botao.id != cn && botao.id != 0) || (filtro2 != "0000-00-00" && botao.getAttribute("dt") != filtro2 && botao.id != 0)){
                botao.remove();
            }
        });
    }
})

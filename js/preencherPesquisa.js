document.addEventListener("DOMContentLoaded", () => {
    var andar = document.getElementById("andar");
    andar.textContent = "Andar "+localStorage.getItem("nrAndarPesquisa").padStart(2,"0");
    
    var enfermeiro = document.getElementById("enfermeiro");
    enfermeiro.textContent = localStorage.getItem("nomePesquisa")+" | "+localStorage.getItem("corenPesquisa")+"-"+localStorage.getItem("estadoPesquisa");
    
    var quarto = document.getElementById("quarto");
    quarto.textContent = "Quarto "+localStorage.getItem("nrQuartoPesquisa").padStart(2,"0");

    var quarto = document.getElementById("corenIdentifier");
    quarto.textContent = localStorage.getItem("corenPesquisa");
})

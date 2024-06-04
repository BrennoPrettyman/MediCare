function gatinho(andar,nmEnfermeiro,corenEnfermeiro,estadoEnfermeiro,nrQuarto){
    localStorage.setItem("nrAndarPesquisa",andar);
    localStorage.setItem("nomePesquisa",nmEnfermeiro);
    localStorage.setItem("corenPesquisa",corenEnfermeiro);
    localStorage.setItem("estadoPesquisa",estadoEnfermeiro);
    localStorage.setItem("nrQuartoPesquisa",nrQuarto);
}

document.addEventListener("DOMContentLoaded", () => {
    localStorage.setItem("quartoSelecionado",0);
    var block1 = document.getElementById("block1");
    var corenInput = document.getElementById("coren");
    var sgInput = document.getElementById("estado");
    var noFound = document.getElementById("empty");
    var historyFound = document.getElementById("hst");

    var finded = false;
    historyFound.addEventListener("click", () => {
        var botoesAdicionados = document.querySelectorAll(".botao-adicional");
    
        if (finded == false) {
            botoesAdicionados.forEach(function (roomy) {
                roomy.setAttribute("hidden","");
                if ((corenInput.value+sgInput.value) == roomy.id){
                    finded = true;
                    roomy.removeAttribute("hidden");
                }
            });
        }
        else {
            finded = false;
            botoesAdicionados.forEach(function (botao) {
                botao.setAttribute("hidden","");
            });
        }
    })
        

    function updt(){
        historyFound.setAttribute("hidden","");
        noFound.removeAttribute("hidden"); // remove mensagem "vazia"

        var corenFounds = document.querySelectorAll(".box2"); // primeiras caixas (enfermeiro)
        corenFounds.forEach(function (boxing) {
            if (boxing.id != "empty"){
                boxing.setAttribute("hidden","");
            }
            if ((corenInput.value+sgInput.value) == boxing.id){
                boxing.removeAttribute("hidden");
                historyFound.removeAttribute("hidden"); // achoou historico
                noFound.setAttribute("hidden","");
            }
        });
        var botoesAdicionados = document.querySelectorAll(".botao-adicional");
        botoesAdicionados.forEach(function (botao) {
            botao.setAttribute("hidden","");
        });
    }

    corenInput.addEventListener("keyup", updt);
    sgInput.addEventListener("change", updt);
})
function gatinho(andar,nmEnfermeiro,corenEnfermeiro,estadoEnfermeiro,nrQuarto){
    localStorage.setItem("nrAndarPesquisa",andar);
    localStorage.setItem("nomePesquisa",nmEnfermeiro);
    localStorage.setItem("corenPesquisa",corenEnfermeiro);
    localStorage.setItem("estadoPesquisa",estadoEnfermeiro);
    localStorage.setItem("nrQuartoPesquisa",nrQuarto);
}

document.addEventListener("DOMContentLoaded", () => {
    localStorage.setItem("quartoSelecionado",0);
    var corenInput = document.getElementById("coren");
    var sgInput = document.getElementById("estado");
    var noFound = document.getElementById("empty");
    var historyFound = document.getElementById("hst");
    var noQuarto = document.getElementById("??????");

    var resultFounds = 0;
    var finded = false;
    var showing = false;
    historyFound.addEventListener("click", () => {
        var botoesAdicionados = document.querySelectorAll(".botao-adicional");
    
        if (finded == false && showing == false) {
            botoesAdicionados.forEach(function (roomy) {
                roomy.setAttribute("hidden","");
                if ((corenInput.value+sgInput.value) == roomy.id){
                    finded = true;
                    resultFounds++;
                    roomy.removeAttribute("hidden");
                }

            });
            if (resultFounds == 0){
                noQuarto.removeAttribute("hidden");
            }
            showing = true;
        }
        else if(showing == true){
            showing = false;
            finded = false;
            resultFounds = 0;
            botoesAdicionados.forEach(function (botao) {
                botao.setAttribute("hidden","");
            });
            noQuarto.setAttribute("hidden","");
        }
    })
        

    function updt(){
        historyFound.setAttribute("hidden","");
        noFound.removeAttribute("hidden"); // remove mensagem "vazia"
        noFound.classList.add("book");

        var corenFounds = document.querySelectorAll(".box2"); // primeiras caixas (enfermeiro)
        corenFounds.forEach(function (boxing) {
            if (boxing.id != "empty"){
                boxing.setAttribute("hidden","");
            }
            if ((corenInput.value+sgInput.value) == boxing.id){
                boxing.removeAttribute("hidden");
                historyFound.removeAttribute("hidden"); // achoou historico
                noFound.setAttribute("hidden","");
                noFound.classList.remove("book");
            }
        });
        var botoesAdicionados = document.querySelectorAll(".botao-adicional");
        botoesAdicionados.forEach(function (botao) {
            botao.setAttribute("hidden","");
        });
        showing = false;
        finded = false;
        resultFounds = 0;
    }

    corenInput.addEventListener("keyup", updt);
    sgInput.addEventListener("change", updt);
})
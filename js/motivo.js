// RESTANTE
var detectReason = false;
document.addEventListener("DOMContentLoaded", () => {
    function motivando(txt){
        document.getElementById("valorMotivo").value = txt;
    }
    var mtvtxt = document.getElementById("mtvTXT")
    mtvtxt.addEventListener("keyup", () => {
        if (mtvtxt.value.trim().length > 0){
            if (mtvtxt.attributes.getNamedItem("required")){
                mtvtxt.attributes.removeNamedItem("required");
            }
            motivando(mtvtxt.value);
            document.getElementById("restante").textContent = 15-mtvtxt.value.length+" Caracteres Restantes";
        }
        else{
            mtvtxt.value = "";
            mtvtxt.setAttribute("required","");
            document.getElementById("restante").textContent = "15 Caracteres Restantes";
            motivando("");
        }
    });

    // TELA RELATORIO - BOTÃO MOTIVO
    document.getElementById("mtvo").addEventListener("click", () => {
        var botoesContainer = document.querySelector('.bloco');
        var botoesAdicionados = document.querySelectorAll('.botao-adicional');

        if (botoesAdicionados.length === 0) {
            var botoesHTML = `
                <div class="mtvo2 botao-adicional">Fortes Dores</div>
                <div class="mtvo2 botao-adicional">Higiêne Pessoal</div>
                <div class="mtvo2 botao-adicional">Mudança de Decúbito</div>
                <div class="mtvo2 botao-adicional">Parada Cardíaca</div>
                <div class="mtvo2 botao-adicional">Queda</div>
                <div class="mtvo2 botao-adicional">Reclamação</div>
            `;
            botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
        } else {
            botoesAdicionados.forEach(function (botao) {
                botao.remove();
            });
            mtvtxt.setAttribute("required","");
            motivando("");
            detectReason = false;
        }

        var botoesAdicionais = document.querySelectorAll('.botao-adicional');
        botoesAdicionais.forEach(function (botao) {
            botao.addEventListener('click', function () {
                botoesAdicionais.forEach(function (botao) {
                    botao.classList.remove('azul');
                });
                botao.classList.add('azul');
                if (mtvtxt.attributes.getNamedItem("required")){
                    mtvtxt.attributes.removeNamedItem("required");
                }
                motivando(botao.textContent);
                detectReason = true;
            });
        });
    });
});


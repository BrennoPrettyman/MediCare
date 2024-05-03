// RESTANTE
var detectReason = false;
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("mtvTXT").addEventListener("keyup", () => {
        if (document.getElementById("mtvTXT").value.trim().length > 0){
            document.getElementById("restante").textContent = 15-document.getElementById("mtvTXT").value.length+" Caracteres Restantes";
        }
        else{
            document.getElementById("mtvTXT").value = "";
            document.getElementById("restante").textContent = "15 Caracteres Restantes"
        }
    });

// TELA RELATORIO - BOTÃO MOTIVO
document.getElementById("mtvo").addEventListener("click", () => {
    var botoesContainer = document.querySelector('.bloco');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="mtvo2 botao-adicional">Fortes Dores</button>
            <button class="mtvo2 botao-adicional">Higiêne Pessoal</button>
            <button class="mtvo2 botao-adicional">Mudança de Decúbito</button>
            <button class="mtvo2 botao-adicional">Parada Cardíaca</button>
            <button class="mtvo2 botao-adicional">Queda</button>
            <button class="mtvo2 botao-adicional">Reclamação</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
            
        });
        detectReason = false;
    }

    var botoesAdicionais = document.querySelectorAll('.botao-adicional');
    botoesAdicionais.forEach(function (botao) {
        botao.addEventListener('click', function () {
            botoesAdicionais.forEach(function (botao) {
                botao.classList.remove('azul');
            });
            botao.classList.add('azul');
            detectReason = true;
        });
    });
});
});


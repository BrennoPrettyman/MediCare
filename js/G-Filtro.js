// TELA FILTROS - BOTÃO QUARTOS
function quartos() {
    var botoesContainer = document.querySelector('.bloco1');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="btn3 botao-adicional">Leito 01</button>
            <button class="btn3 botao-adicional">Leito 05</button>
            <button class="btn3 botao-adicional">Leito 10</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);

        // Remove a margem direita do último botão adicionado
        var botoesAdicionais = document.querySelectorAll('.botao-adicional');
        if (botoesAdicionais.length > 0) {
            botoesAdicionais[botoesAdicionais.length - 1].style.marginRight = '0';
        }
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
        });
    }
}


// BOTÃO CHAMADOS ANTECEDENTES
document.getElementById("cmdA").addEventListener("click", function () {
    var info = document.getElementById("info");
    if (info.classList.contains("show")) {
        info.classList.remove("show");
    } else {
        info.classList.add("show");
    }
});





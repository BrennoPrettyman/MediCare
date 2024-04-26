// TELA FILTROS - BOTÃO QUARTOS
function quartos() {
    var botoesContainer = document.querySelector('.bloco1');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="btn3 botao-adicional">Quarto 01</button>
            <button class="btn3 botao-adicional">Quarto 05</button>
            <button class="btn3 botao-adicional">Quarto 10</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
        });
    }
}

function chamadoA() {
    var botoesContainer = document.querySelector('.bloco1');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="btn3 botao-adicional">Filtra os atendimentos em ordem decrescente</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
        });
    }
}

function chamadoR() {
    var botoesContainer = document.querySelector('.bloco1');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="btn3 botao-adicional">Filtra os atendimentos em ordem crescente</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
        });
    }
}


// TELA RELATORIO - POPUP
document.getElementById("enviarBtn").addEventListener("click", function () {
    document.getElementById("overlay").classList.add("show");
    document.getElementById("popup").classList.add("show");
    setTimeout(function () {
        window.location.href = "relatorio.html";
    }, 2000);
});



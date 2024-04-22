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

// TELA RELATORIO - BOTÃO MOTIVO 
function motivo() {
    var botoesContainer = document.querySelector('.bloco');
    var botoesAdicionados = document.querySelectorAll('.botao-adicional');

    if (botoesAdicionados.length === 0) {
        var botoesHTML = `
            <button class="mtvo2 botao-adicional">Banho</button>
            <button class="mtvo2 botao-adicional">Fortes Dores</button>
            <button class="mtvo2 botao-adicional">Higiêne Pessoal</button>
            <button class="mtvo2 botao-adicional">Parada Cardíaca</button>
            <button class="mtvo2 botao-adicional">Queda</button>
            <button class="mtvo2 botao-adicional">Reclamação</button>
        `;
        botoesContainer.insertAdjacentHTML('beforeend', botoesHTML);
    } else {
        botoesAdicionados.forEach(function (botao) {
            botao.remove();
        });
    }

    var botoesAdicionais = document.querySelectorAll('.botao-adicional');
    botoesAdicionais.forEach(function (botao) {
        botao.addEventListener('click', function () {
            botoesAdicionais.forEach(function (botao) {
                botao.classList.remove('azul');
            });
            botao.classList.add('azul');
        });
    });
}

// TELA RELATORIO - POPUP
document.getElementById("enviarBtn").addEventListener("click", function () {
    document.getElementById("overlay").classList.add("show");
    document.getElementById("popup").classList.add("show");
    setTimeout(function () {
        window.location.href = "relatorio.html";
    }, 2000);
});



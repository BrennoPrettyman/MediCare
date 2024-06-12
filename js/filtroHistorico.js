document.addEventListener("DOMContentLoaded", ()=>{    
    var filtro = localStorage.getItem("filtroQuarto");
    var filtro2 = localStorage.getItem("filtroData");
    var filtro3 = localStorage.getItem("filtroMotivo");
    var botoesAdicionados = document.querySelectorAll(".btn");
    botoesAdicionados.forEach(function (botao) {
        if ((filtro != "0" && botao.id != filtro && botao.id != 0)
        || (filtro2 != "0000-00-00" && botao.getAttribute("dt") != filtro2 && botao.id != 0)
        || (filtro3 != "nenhum" && botao.getAttribute("mtv") != filtro3 && botao.id != 0)){
            botao.remove();
        }
    });
});
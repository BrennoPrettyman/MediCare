document.addEventListener("DOMContentLoaded", () => {
    var andar = document.getElementById("andar");
    andar.textContent = "Andar "+localStorage.getItem("andarAtual").padStart(2,"0");
    var quarto = document.getElementById("quarto");
    quarto.textContent = "Quarto "+localStorage.getItem("numeroQuarto").padStart(2,"0")+" | Leito "+localStorage.getItem("leito").padStart(2,"0");
})

document.addEventListener("DOMContentLoaded", ()=>{
    // BOTÃO CHAMADOS ANTECEDENTES
    document.getElementById("cmdA").addEventListener("click", function () {
        var info = document.getElementById("info");
        if (info.classList.contains("show")) {
            info.classList.remove("show");
        } else {
            info.classList.add("show");
        }
    });
});

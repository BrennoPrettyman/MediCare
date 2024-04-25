// ENVIAR
document.getElementById("enviarBtn").addEventListener("click", () => {
    if (detectReason == true || document.getElementById("mtvTXT").value.trim().length > 0){
        document.getElementById("overlay").classList.add("show");
        document.getElementById("popup").classList.add("show");
        setTimeout(function () {
            window.location.href = "relatoriovazio.html";
        }, 2000);
    }
})
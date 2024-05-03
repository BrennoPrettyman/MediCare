    // ENVIAR
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("enviarBtn").addEventListener("click", () => {
            if (detectReason == true || document.getElementById("mtvTXT").value.trim().length > 0){
                document.getElementById("overlay").classList.add("show");
                document.getElementById("popup").classList.add("show");
                setTimeout(function () {
                    window.location.href = "relatorio.html";
                }, 2000);
            }
        });
    });
    
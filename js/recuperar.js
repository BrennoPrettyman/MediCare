document.getElementById("recuperar").addEventListener("click", function () {
    document.getElementById("overlay-recuperar").classList.add("show");
    document.getElementById("popup-recuperar").classList.add("show");
    setTimeout(function () {
        window.location.href = "redefinir.html";
    }, 2000);
});


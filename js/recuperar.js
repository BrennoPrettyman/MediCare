document.addEventListener("submit", function () {
    document.getElementById("overlay-recuperar").classList.add("show");
    document.getElementById("popup-recuperar").classList.add("show");
    setTimeout(function () {
        window.location.href = "redefinir.php";
    }, 2000);
});


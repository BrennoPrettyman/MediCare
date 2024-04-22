document.getElementById("redefinir").addEventListener("click", function () {
    document.getElementById("overlay-redefinir").classList.add("show");
    document.getElementById("popup-redefinir").classList.add("show");
    setTimeout(function () {
        window.location.href = "login.html";
    }, 2000);
});

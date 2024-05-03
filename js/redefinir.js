document.getElementById("redefinir").addEventListener("click", function () {
    document.getElementById("overlay-redefinir").classList.add("show");
    document.getElementById("popup-redefinir").classList.add("show");
    setTimeout(function () {
        window.location.href = "login.html";
    }, 2000);
});

document.addEventListener("DOMContentLoaded", () => {
    let senhaInput = document.getElementById("senha");
    let confirmar = document.getElementById("senhaConfirm");

    senhaInput.addEventListener("keyup", () => {
        allowed = true;
        var coloring = " rgba(203, 237, 255, 1)"
        var wrong = "white"

        var caracterSpan = document.getElementById("char");
        var numeroSpan = document.getElementById("num");
        var especialSpan = document.getElementById("special");

        caracterSpan.textContent = "✔ Caracteres";
        caracterSpan.style.color = coloring;

        numeroSpan.textContent = " ﾠ✔ Número";
        numeroSpan.style.color = coloring;

        especialSpan.textContent = "ﾠ✔ Caracter Especial";
        especialSpan.style.color = coloring;

        if (senhaInput.value.length < 7){
            allowed = false;
            caracterSpan.style.color = wrong;
            caracterSpan.textContent = "✖ "+(7-senhaInput.value.length)+" Caracteres";
        }
        const isContainsNumber = /^(?=.*[0-9]).*$/;
        if (!isContainsNumber.test(senhaInput.value)){
            allowed = false;
            numeroSpan.style.color = wrong;
            numeroSpan.textContent = "ﾠ✖ Número";
        }
        const isContainsSymbol = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
        if (!isContainsSymbol.test(senhaInput.value)){
            allowed = false;
            especialSpan.style.color = wrong;
            especialSpan.textContent = "ﾠ✖ Caracter Especial";
        }
    });

    let noShadow ="transparent 0px 0px 0px 0px;";
    senhaInput.addEventListener("focus", () => {
        senhaInput.setAttribute("style", noShadow);
    });

    confirmar.addEventListener("focus", () => {
        confirmar.setAttribute("style", noShadow);
    })})
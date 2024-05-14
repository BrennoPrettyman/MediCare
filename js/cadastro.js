let allowed = false;
let samePassword = false;

let shadowColor ="box-shadow: red 0px 0px 6px 0.5px;";
let noShadow ="transparent 0px 0px 0px 0px;";

document.addEventListener("DOMContentLoaded", () => {
    let senhaInput = document.getElementById("senha");
    let confirmar = document.getElementById("senhaConfirm");
    let wrongPassword = document.getElementById("wrongPassword");

    senhaInput.addEventListener("keyup", () => {
        allowed = true;
        var coloring = "rgb(13, 44, 97)"
        var wrong = "red"

        var caracterSpan = document.getElementById("char");
        var numeroSpan = document.getElementById("num");
        var especialSpan = document.getElementById("special");

        caracterSpan.textContent = "✔ Caracteres";
        caracterSpan.style.color = coloring;

        numeroSpan.textContent = "✔ Número";
        numeroSpan.style.color = coloring;

        especialSpan.textContent = "✔ Caracter Especial";
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
            numeroSpan.textContent = "✖ Número";
        }
        const isContainsSymbol = /^(?=.*[~`!@#$%^*--+={}\[\]|\\:<>,.?/_₹]).*$/;
        const notAllowed = /^(?=.*[=)("';]).*$/;
        if (!isContainsSymbol.test(senhaInput.value) || notAllowed.test(senhaInput.value) == true){
                allowed = false;
                especialSpan.style.color = wrong;
                especialSpan.textContent = "✖ Caracter Especial";
        }
    });

    senhaInput.addEventListener("focus", () => {
        senhaInput.setAttribute("style", noShadow);
    });

    confirmar.addEventListener("focus", () => {
        confirmar.setAttribute("style", noShadow);
    });

    /*document.getElementById("phone").addEventListener('keyup', (e) => {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{2})(\d{5})(\d{4})/);
        e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
      });*/
    

    /////////////////////////////////////////////////// SUBmit TIME

    document.addEventListener("submit", (event) => {
        if (confirmar.value == senhaInput.value) {
            samePassword = true;
            senhaInput.setAttribute("style", noShadow);
            confirmar.setAttribute("style", noShadow);
            wrongPassword.textContent = "";
        }
        else{
            samePassword = false;
            senhaInput.setAttribute("style", shadowColor);
            confirmar.setAttribute("style", shadowColor);
            wrongPassword.textContent = "As senhas não são iguais";
        }

        if (allowed == false || samePassword == false){
            event.preventDefault();
        }
    });
    
});



let allowed = false;
let samePassword = false;

document.addEventListener("submit", (event) => {

        let senhaInput = document.getElementById("senha");
        let confirmar = document.getElementById("senhaConfirm");

        if (confirmar.value == senhaInput.value) {
            samePassword = true;
        }
        else{
            samePassword = false;
            let shadowColor ="box-shadow: red 0px 0px 6px 0.5px;";
            senhaInput.setAttribute("style", shadowColor);
            confirmar.setAttribute("style", shadowColor);
        }

        if (allowed == false || samePassword == false){
            event.preventDefault();
        }
});

 document.addEventListener("DOMContentLoaded", () => {
    let senhaInput = document.getElementById("senha");
    let confirmar = document.getElementById("senhaConfirm");

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
            caracterSpan.textContent = "• "+(7-senhaInput.value.length)+" Caracter";
        }
        const isContainsNumber = /^(?=.*[0-9]).*$/;
        if (!isContainsNumber.test(senhaInput.value)){
            allowed = false;
            numeroSpan.style.color = wrong;
            numeroSpan.textContent = "• Número";
        }
        const isContainsSymbol = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
        if (!isContainsSymbol.test(senhaInput.value)){
            allowed = false;
            especialSpan.style.color = wrong;
            especialSpan.textContent = "• Caracter Especial";
        }
    });

    let noShadow ="transparent 0px 0px 0px 0px;";
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
})

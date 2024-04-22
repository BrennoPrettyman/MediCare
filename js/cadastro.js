let allowed = false;
let samePassword = false;
document.addEventListener("submit", (event) => {
        event.preventDefault();

        let confirmar = document.getElementById("senhaConfirm")
        let senhaInput = document.getElementById("senha")
        if (confirmar.value == senhaInput.value) {
            samePassword = true;
        }
        else{
            samePassword = false;
        }

        if (allowed == true && samePassword == true){
            document.getElementById("overlay-cadastro").classList.add("show");
            document.getElementById("popup-cadastro").classList.add("show");
            setTimeout(function () {
                window.location.href = "login.html";
            }, 2000);
        }
        else if(allowed == false){
            alert("A senha não preenche os requisitos.")
        }
        else if(samePassword == false){
            alert("A senha não corresponde com \"confirmar senha\".")
        }
});

document.addEventListener("DOMContentLoaded", () => {
    let senhaInput = document.getElementById("senha")
    senhaInput.addEventListener("keyup", () => {
        allowed = true;
        if (senhaInput.value.length < 7){
            allowed = false;
            /*alert("faltou a quantidade")*/
        }
        const isContainsNumber = /^(?=.*[0-9]).*$/;
        if (!isContainsNumber.test(senhaInput.value)){
            allowed = false;
            /*alert("faltou o numero")*/
        }
        const isContainsSymbol = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
        if (!isContainsSymbol.test(senhaInput.value)){
            allowed = false;
            /*alert("faltou os caracteres especiais")*/
        }
    });
    senhaInput.addEventListener("focusout", () => {
        var frase = "";
        if (senhaInput.value.length < 7){
            frase = "Faltou preencher a quantidade de Caracteres, Restantes: "+(7-senhaInput.value.length)+".\n"
        }
        const isContainsNumber = /^(?=.*[0-9]).*$/;
        if (!isContainsNumber.test(senhaInput.value)){
            frase += "Faltou algum caracter númerico.\n"
        }
        const isContainsSymbol = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹]).*$/;
        if (!isContainsSymbol.test(senhaInput.value)){
            frase += "Faltou algum caracter especial."
        }
        if (frase.length > 0){
            alert(frase);
        }
    })
    /*document.getElementById("phone").addEventListener('keyup', (e) => {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{2})(\d{5})(\d{4})/);
        e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
      });*/
})

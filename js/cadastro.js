let allowed = false;
document.addEventListener("submit", (event) => {
        event.preventDefault();

        let confirmar = document.getElementById("senhaConfirm")
        let senhaInput = document.getElementById("senha")
        if (confirmar.value == senhaInput.value) {
            allowed = true;
        }
        else{
            allowed = false;
        }

        if (allowed == true){
            document.getElementById("overlay-cadastro").classList.add("show");
            document.getElementById("popup-cadastro").classList.add("show");
            setTimeout(function () {
                window.location.href = "login.html";
            }, 2000);
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

    /*document.getElementById("phone").addEventListener('keyup', (e) => {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{2})(\d{5})(\d{4})/);
        e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
      });*/
})

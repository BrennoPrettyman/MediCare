let allowed = false;
document.addEventListener("submit", (event) => {
        event.preventDefault();
        /*
        let senhaInput = document.getElementById("senha")
        let wrongPassword = document.getElementById("wrongPassword")
        if (bancoDados.value == senhaInput.value) {
            allowed = true;
            wrongPassword.textContent = "";
        }
        else{
            allowed = false;
            wrongPassword.textContent = "Senha Incorreta";
        }
        */
        allowed = true; // Temporário

        if (allowed == true){
            window.location.href = "qrcodeex.html";
        }
});
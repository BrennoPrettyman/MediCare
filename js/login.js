let allowed = false;
document.addEventListener("submit", (event) => {
        event.preventDefault();
        /*
        let senhaInput = document.getElementById("senha")
        if (bancoDados.value == senhaInput.value) {
            allowed = true;
        }
        else{
            allowed = false;
        }
        */
        allowed = true; // Temporário

        if (allowed == true){
            window.location.href = "qrcodeex.html";
        }
});
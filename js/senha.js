document.addEventListener('DOMContentLoaded', function() {

    var senhaInput = document.getElementById('senha');
    var senhaInputConfirm = document.getElementById('senhaConfirm');
    var passwordIcon = document.getElementById('visibleEye');
    if (passwordIcon){
        passwordIcon.addEventListener('click', function() {
        if (senhaInput.type === 'password') {
            senhaInput.type = 'text';
            
            if (passwordIcon.classList.contains("aberto")){
                passwordIcon.classList.remove("aberto");
                passwordIcon.classList.add("fechado")
            }
        } else {
            senhaInput.type = 'password';
            if (passwordIcon.classList.contains("fechado")){
                passwordIcon.classList.remove("fechado");
                passwordIcon.classList.add("aberto")
            }
        }
    });
    }

    var passwordIcon2 = document.getElementById('visibleEyeConfirm');
    if (passwordIcon2){
        passwordIcon2.addEventListener('click', function() {
        if (senhaInputConfirm.type === 'password') {
            senhaInputConfirm.type = 'text';
            
            if (passwordIcon2.classList.contains("aberto")){
                passwordIcon2.classList.remove("aberto");
                passwordIcon2.classList.add("fechado")
            }
        } else {
            senhaInputConfirm.type = 'password';
            if (passwordIcon2.classList.contains("fechado")){
                passwordIcon2.classList.remove("fechado");
                passwordIcon2.classList.add("aberto")
            }
        }
    });
    }
});

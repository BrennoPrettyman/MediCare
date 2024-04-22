document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("finalizar1").addEventListener("click", () => {
        var dating = new Date();
        var hour = dating.getHours().toString().padStart(2,"0");
        var minute = dating.getMinutes().toString().padStart(2,"0");
        var seconds = dating.getSeconds().toString().padStart(2,"0");
    
        window.location.href= "motivo.html";
        alert(hour+":"+minute+":"+seconds);
    });
});
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("atender1").addEventListener("click", () => {
        var dating = new Date();
        var date = dating.getDate();
        var month = dating.getMonth().toString().padStart(2,"0");
        var year = dating.getFullYear();
        var hour = dating.getHours().toString().padStart(2,"0");
        var minute = dating.getMinutes().toString().padStart(2,"0");
        var seconds = dating.getSeconds().toString().padStart(2,"0");
    
        window.location.href= "atendendo.html";
        alert(date+"/"+month+"/"+year+":"+hour+":"+minute+":"+seconds);
    });
});

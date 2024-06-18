
document.addEventListener("DOMContentLoaded", () => {
    var lightCss = document.getElementById('light-css');
    var darkCss = document.getElementById('dark-css');
    var icon = document.getElementById('MIcon');
    
    var modo = localStorage.getItem("mode");

    function changeMode(){
        if (modo == "Dark"){
            darkCss.disabled = false;
            lightCss.disabled = true;
            icon.src = 'css/media/sol.png';
        }
        else if (modo == "Light"){
            darkCss.disabled = true;
            lightCss.disabled = false;
            icon.src = 'css/media/lua.png';
        }
    }
    changeMode()

    document.getElementById("MIcon").addEventListener("click",()=>{
        if (modo == "Dark"){
            localStorage.setItem("mode","Light");
        }
        else if (modo == "Light"){
            localStorage.setItem("mode","Dark");
        }
        modo = localStorage.getItem("mode");
        changeMode();
    });

})
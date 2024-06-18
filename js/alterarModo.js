document.addEventListener("DOMContentLoaded", () => {
    var modo = localStorage.getItem("mode");
    var darked = document.getElementById("darkMode");
    var lighted = document.getElementById("lightMode");

    function changeVisual(){
        if (modo == "Dark"){
            darked.setAttribute("src","pics/selected.png");
            lighted.setAttribute("src","pics/select.png");
        }
        else if (modo == "Light"){
            darked.setAttribute("src","pics/select.png");
            lighted.setAttribute("src","pics/selected.png");
        }
    }
    changeVisual();

    darked.addEventListener("click",()=>{
        if (modo == "Light"){
            localStorage.setItem("mode","Dark");
        }
        modo = localStorage.getItem("mode");
        changeVisual();
    });
    
    lighted.addEventListener("click",()=>{
        if (modo == "Dark"){
            localStorage.setItem("mode","Light");
        }
        modo = localStorage.getItem("mode");
        changeVisual();
    });
});
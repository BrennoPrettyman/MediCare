document.addEventListener("DOMContentLoaded", () => {
    nmToUpper = () =>{
        var nm_txt = document.getElementById("nm_enfermeiro");
        nm_txt.textContent = nm_txt.textContent.substring(0,1).toUpperCase()+nm_txt.textContent.substring(1);
    }
    document.getElementById("nm_enfermeiro").addEventListener("load", nmToUpper());
});
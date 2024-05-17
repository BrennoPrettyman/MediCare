var focused = false;

document.addEventListener("DOMContentLoaded",() => {

    var tagCoren = document.getElementById("coren");

    function dotInsert(){
        var txt = tagCoren.value;
        var numeric = txt.replace(/[^0-9]+/g, '');
        var corenLength = numeric.length;

        var partOne = numeric.slice(0, 3) + ".";
        if (corenLength < 4) { 
            tagCoren.value = numeric;
        } else if (corenLength >= 4 && corenLength < 7) {
            var formatCoren = partOne + numeric.slice(3);
            tagCoren.value = formatCoren;
        }
    }

    function fullInsert(){
        var txt = tagCoren.value;
        if (txt.length < 7){
            tagCoren.value = txt.padStart(6, "0");
            dotInsert();
            if (tagCoren.value.length == 6){
                tagCoren.value = txt.padStart(7, "0");
            }
        }
        if (tagCoren.value == "000.000"){
            tagCoren.value = "";
        }
    }

    tagCoren.addEventListener("keyup", dotInsert);
    tagCoren.addEventListener("keydown", dotInsert);
    tagCoren.addEventListener("keypress", dotInsert);
    tagCoren.addEventListener("change", dotInsert);

    tagCoren.addEventListener("focusout", fullInsert);
});

/*
        var txt = document.getElementById("coren").value;
        if (txt.length >= 3){
            if (focused == false){
                txt = txt.toString(0,2)+"."
                focused = true;
            }
            document.getElementById("coren").value = txt
        }
        else
        {
            if (focused == true){
                txt = txt.toString(0,txt.length-1)
                focused = false;
            }
        }
        */

/* AVISO ! ! Nem tente entender por que eu tbm n entendi!
var focused = false;
var corened = "___.___"
document.addEventListener("DOMContentLoaded",() => {
    document.getElementById("coren").addEventListener("keypress", (a) => {
        for (let i = 0; i < corened.length; i++) {
            if (corened[i] == "_" && a.key != "_" && a.key != "." && a.key != " "){
                corened.substring(i,i+1) = a.key;
            }            
        }
        alert(corened);
        var txt = document.getElementById("coren").value;
        if (focused == true && txt.length == 4){
            txt = txt.toString(0,txt.length-1)
            focused = false;
        }
        else if (txt.length >= 3 && txt.length < 6){
            if (focused == false){
                txt = txt.toString(0,2)+"."
                focused = true;
            }
            document.getElementById("coren").value = txt
        }
    });
});
*/
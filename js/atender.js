    function atender() {
        var dating = new Date();
        var date = dating.getDate().toString().padStart(2,"0");
        var month = (dating.getMonth()+1).toString().padStart(2,"0");
        var year = dating.getFullYear();
        var hour = dating.getHours().toString().padStart(2,"0");
        var minute = dating.getMinutes().toString().padStart(2,"0");
        var seconds = dating.getSeconds().toString().padStart(2,"0");

        window.location.href= "atendendo.php";
        //alert(date+"/"+month+"/"+year+":"+hour+":"+minute+":"+seconds);
    }


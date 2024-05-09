    function atender(cd_quarto,nr_leito,andar) {
        localStorage.setItem("andarAtual",andar);
        localStorage.setItem("numeroQuarto",cd_quarto);
        localStorage.setItem("leito",nr_leito);

        window.location.href= "atendendo.php";
    }
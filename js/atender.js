function atender(cd_quarto,nr_leito,andar,espAtual) {
    localStorage.setItem("numeroQuarto",cd_quarto);
    localStorage.setItem("leito",nr_leito);
    localStorage.setItem("andarAtual",andar);
    localStorage.setItem("espAtividade",espAtual);

    window.location.href= "atendendo.php";
}
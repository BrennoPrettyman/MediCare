function gatinho(andar,nmEnfermeiro,corenEnfermeiro,estadoEnfermeiro,nrQuarto){
    localStorage.setItem("nrAndarPesquisa",andar);
    localStorage.setItem("nomePesquisa",nmEnfermeiro);
    localStorage.setItem("corenPesquisa",corenEnfermeiro);
    localStorage.setItem("estadoPesquisa",estadoEnfermeiro);
    localStorage.setItem("nrQuartoPesquisa",nrQuarto);
    document.location.href = "G-Historico.php";
}
function gatinho(andar,nrQuarto,nrLeito,dia,horarioInicio,HorarioFim,dsMotivo){
    localStorage.setItem("nrAndarPesquisa",andar);
    localStorage.setItem("nrQuartoPesquisa",nrQuarto);
    localStorage.setItem("nrLeitoPesquisa",nrLeito);
    localStorage.setItem("diaPesquisa",dia);
    localStorage.setItem("hrInicioPesquisa",horarioInicio);
    localStorage.setItem("hrFimPesquisa",HorarioFim);
    localStorage.setItem("dsMotivoPesquisa",dsMotivo);
    document.location.href = "G-Filtro.html";
}
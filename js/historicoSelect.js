function opnix(andar,nrQuarto,nrLeito,dia,horarioInicio,HorarioFim,dsMotivo){
    localStorage.setItem("nrAndarHistorico",andar);
    localStorage.setItem("nrQuartoHistorico",nrQuarto);
    localStorage.setItem("nrLeitoHistorico",nrLeito);
    localStorage.setItem("diaHistorico",dia);
    localStorage.setItem("hrInicioHistorico",horarioInicio);
    localStorage.setItem("hrFimHistorico",HorarioFim);
    localStorage.setItem("dsMotivoHistorico",dsMotivo);
    document.location.href = "historicoInfo.html";
}
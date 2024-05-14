document.addEventListener("DOMContentLoaded", () => {
    /*
    localStorage.setItem("nrAndarHistorico",andar);
    localStorage.setItem("nrQuartoHistorico",nrQuarto);
    localStorage.setItem("nrLeitoHistorico",nrLeito);
    localStorage.setItem("diaHistorico",dia);
    localStorage.setItem("hrInicioHistorico",horarioInicio);
    localStorage.setItem("hrFimHistorico",HorarioFim);
    localStorage.setItem("dsMotivoHistorico",dsMotivo);
    */
    var andar = document.getElementById("andar");
    andar.textContent = "Andar "+localStorage.getItem("nrAndarHistorico").padStart(2,"0");
    
    var quarto = document.getElementById("quarto");
    quarto.textContent = "Quarto "+localStorage.getItem("nrQuartoHistorico").padStart(2,"0")+" | Leito "+localStorage.getItem("nrLeitoHistorico").padStart(2,"0");
    
    var dataTxt = document.getElementById("dt");
    var dt = localStorage.getItem("diaHistorico").substring(8);
    var mes = localStorage.getItem("diaHistorico").substring(5,7);
    var ano = localStorage.getItem("diaHistorico").substring(0,4);
    dataTxt.textContent = dt+"/"+mes+"/"+ano;
    
    var hrInicio = document.getElementById("hrInicio");
    hrInicio.textContent = localStorage.getItem("hrInicioHistorico");
    
    var hrFim = document.getElementById("hrFim");
    hrFim.textContent = localStorage.getItem("hrFimHistorico");
    
    var mtv = document.getElementById("mtv");
    mtv.textContent = localStorage.getItem("dsMotivoHistorico");
    
})

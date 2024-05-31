function switchMode() {
    const lightCss = document.getElementById('light-css');
    const darkCss = document.getElementById('dark-css');
    const icon = document.getElementById('MIcon');
    
    if (darkCss.disabled) {
        // Ativa o CSS do modo escuro e desativa o CSS do modo claro
        darkCss.disabled = false;
        lightCss.disabled = true;
        icon.src = 'css/media/sol.png';
    } else {
        // Ativa o CSS do modo claro e desativa o CSS do modo escuro
        darkCss.disabled = true;
        lightCss.disabled = false;
        icon.src = 'css/media/lua.png';
    }
}
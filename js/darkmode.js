function switchMode() {
    const body = document.body;
    const icon = document.getElementById('MIcon');
    
    if (body.classList.contains('night-mode')) {
        body.classList.remove('night-mode');
        icon.src = 'css/media/sol.png';
    } else {
        body.classList.add('night-mode');
        icon.src = 'css/media/lua.png';
    }
}

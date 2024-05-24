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


// function switchMode() {
//     const themeLink = document.getElementById('theme-link');
//     const icon = document.getElementById('MIcon');
    
//     if (themeLink.getAttribute('href') === 'style.css') {
//         themeLink.setAttribute('href', 'night-style.css');
//         icon.src = 'css/media/lua.png';
//     } else {
//         themeLink.setAttribute('href', 'style.css');
//         icon.src = 'css/media/sol.png';
//     }
// }

document.addEventListener("DOMContentLoaded", () =>{
    document.getElementById("volta").addEventListener("click", function(event) {
        event.preventDefault(); // Previne o comportamento padrão do link

        // Verifica se a página anterior é 'index.html' ou 'cadastro.html'
        if (document.referrer.includes("../index.html") || document.referrer.includes("cadastro.html")) {
            window.history.back(); // Volta para a página anterior
        } else {
            // Se a página anterior não for 'index.html' ou 'cadastro.html', redirecione para 'index.html'
            window.location.href = "../index.html";
        }
    });
});
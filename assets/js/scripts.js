// Atualiza o ano automaticamente no rodapé
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("ano").textContent = new Date().getFullYear();
});

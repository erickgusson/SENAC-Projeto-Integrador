// Salva a posição de rolagem atual no localStorage
window.onbeforeunload = function () {
    localStorage.setItem('scrollPosition', JSON.stringify({
        x: window.scrollX,
        y: window.scrollY
    }));
}
// Restaura a posição de rolagem após o carregamento da página
window.onload = function () {
    var scrollPosition = JSON.parse(localStorage.getItem('scrollPosition'));
    if (scrollPosition) {
        window.scrollTo(scrollPosition.x, scrollPosition.y);
        localStorage.removeItem('scrollPosition'); // Limpa a posição após restaurar
    }
}
window.onload = function () {
    const overlay = document.getElementById('overlay');
    const content = document.getElementById('content');
    const textOverlay = document.getElementById('textOverlay');

    overlay.addEventListener('click', function () {
        textOverlay.style.display = 'none';
        content.classList.remove('hidden');
        overlay.style.transition = '0.5s';
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
    });
};
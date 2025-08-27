function openImageModal(imageUrl) {

    // Create modal with initial opacity 0 for fadeIn
    const modal = document.createElement('div');
    modal.style.opacity = '0';
    modal.style.transition = 'opacity 0.3s';

    // Fade in after appending to DOM
    setTimeout(() => {
        modal.style.opacity = '1';
    }, 10);

    // Fade out on click, then remove from DOM
    modal.addEventListener('click', () => {
        modal.style.opacity = '0';
        setTimeout(() => {
            if (modal.parentNode) {
                document.body.removeChild(modal);
            }
        }, 300);
    });
    modal.style.position = 'fixed';
    modal.style.top = 0;
    modal.style.left = 0;
    modal.style.width = '100vw';
    modal.style.height = '100vh';
    modal.style.background = 'rgba(0,0,0,0.7)';
    modal.style.display = 'flex';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modal.style.zIndex = 1000;

    const img = document.createElement('img');
    img.src = imageUrl;
    img.style.maxWidth = '90vw';
    img.style.maxHeight = '90vh';
    img.style.boxShadow = '0 0 20px #000';

    modal.addEventListener('click', () => {
        document.body.removeChild(modal);
    });

    modal.appendChild(img);
    document.body.appendChild(modal);
}
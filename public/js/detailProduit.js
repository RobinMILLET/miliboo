window.addEventListener('scroll', function () {
    const card = document.querySelector('.cardProduit');
    const col = document.querySelector('.colPresentationProduit');

    const colRect = col.getBoundingClientRect();
    const colBottom = colRect.bottom;

    if (colRect.top <= 0 && colBottom > window.innerHeight) {
        card.style.position = 'fixed';
        card.style.top = '10px';
    } else if (colBottom <= window.innerHeight) {
        card.style.position = 'absolute';
        card.style.top = `${colRect.height - card.offsetHeight}px`;
    } else {

        card.style.position = 'absolute';
        card.style.top = '0';
    }
});

window.addEventListener('load', matchColumnHeights);
window.addEventListener('resize', matchColumnHeights);

function matchColumnHeights() {
    const colImages = document.querySelector('.colImagesProduit');
    const colPresentation = document.querySelector('.colPresentationProduit');
    
    const colImagesHeight = colImages.offsetHeight;
    
    colPresentation.style.height = `${colImagesHeight}px`;
}
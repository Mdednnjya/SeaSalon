import './bootstrap';

const brandLogo = document.getElementById('brand-logo');
const mediaQuery = window.matchMedia('(max-width: 576px)');

function handleMediaQueryChange(e) {
    if (e.matches) {
        brandLogo.style.fontSize = '0px';
    } else {
        brandLogo.style.fontSize = '32px';
    }
}

mediaQuery.addListener(handleMediaQueryChange);
handleMediaQueryChange(mediaQuery);

document.querySelectorAll('.offcanvas-body .nav-link').forEach(link => {
    link.addEventListener('click', function() {
        const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasNavbar'));
        offcanvas.hide();
    });
});

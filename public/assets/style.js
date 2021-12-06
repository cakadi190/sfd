const listNav = document.getElementById('responsive-nav');
const imgLogo = document.getElementById('logo');
const navbarDropdown = document.getElementById('navbarNav');
const navbar = document.getElementById('responsive-nav');
const menu = document.getElementById('icon-ham');
const btnNav = document.getElementById('btn-responsive-mobile');


if (window.screen.width < 500){
    listNav.classList.remove("navbar-light");
    listNav.classList.add("navbar-dark");
    imgLogo.src = "assets/logo_mobile.svg";
    imgLogo.style.width = "25vmax";
    imgLogo.classList.remove("ml-5");
    btnNav.classList.remove('btn-nav');
    btnNav.classList.remove('bg-cl-secondary');
    btnNav.classList.add('mb-3');
    menu.style.width = "10vmin";
}
if(window.screen.width > 500){
    imgLogo.src = "assets/logo-brand.svg";
}
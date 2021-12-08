// const listNav = document.getElementById('responsive-nav');
// const imgLogo = document.getElementById('logo');
const closeButton = document.getElementById('close-mobile');
const containerMenu = document.getElementById('container-menu');
const hamMobile = document.getElementById('toggler-menu');

const closeMenuHandler = () => {
  containerMenu.style.display = 'none';
  hamMobile.style.display = 'block';
  console.log('Tertutup');
}
const openMenuHandler = () => {
  containerMenu.style.display = 'flex';
  hamMobile.style.display = 'none';
  console.log('Terbuka');
}

closeButton.addEventListener('click', closeMenuHandler);
hamMobile.addEventListener('click', openMenuHandler);

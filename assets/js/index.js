const humburger = document.querySelector('#hamburgerButton');
const drawer = document.querySelector('#navigationDrawer');
const navList = document.querySelector('.nav-list');
const content = document.querySelector('#mainContent');

const clickHumburger = () => {
  drawer.classList.toggle('open');
};

humburger.addEventListener('click', (e) => {
  e.stopPropagation();
  clickHumburger();
});

navList.addEventListener('click', (e) => {
  e.stopPropagation();
  drawer.classList.remove('open');
});

content.addEventListener('click', (e) => {
  e.stopPropagation();
  drawer.classList.remove('open');
});

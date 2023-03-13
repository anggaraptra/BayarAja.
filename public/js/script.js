const body = document.querySelector('body'),
  html = document.querySelector('html'),
  sidebar = body.querySelector('nav.sidebar'),
  toggle = body.querySelector('.toggle'),
  searchBtn = body.querySelector('.search-box'),
  modeSwitch = body.querySelector('.toggle-switch'),
  modeText = body.querySelector('.mode-text'),
  logoLight = body.querySelector('.navbar .logo .logo-light'),
  logoDark = body.querySelector('.navbar .logo .logo-dark');

// Sidebar toggle dark mode
modeSwitch.addEventListener('click', () => {
  body.classList.toggle('dark');

  let mode;
  if (body.classList.contains('dark')) {
    modeText.innerText = 'Light mode';
    html.style.colorScheme = 'dark';
    mode = 'dark';
    logoLight.classList.toggle('d-none');
    logoDark.classList.toggle('d-none');
  } else {
    modeText.innerText = 'Dark mode';
    html.style.colorScheme = 'light';
    mode = 'light';
    logoLight.classList.toggle('d-none');
    logoDark.classList.toggle('d-none');
  }

  // set mode to local storage
  localStorage.setItem('mode', mode);
});

// cek mode from local storage
if (localStorage.getItem('mode') === 'dark') {
  body.classList = 'dark';
  modeText.innerText = 'Light mode';
  html.style.colorScheme = 'dark';
  logoLight.classList.toggle('d-none');
  logoDark.classList.toggle('d-none');
}

// Sidebar toggle
toggle.addEventListener('click', () => {
  sidebar.classList.toggle('close');

  let toggle;
  // set sidebar to local storage
  if (sidebar.classList.contains('close')) {
    toggle = 'close';
  }
  localStorage.setItem('toggle', toggle);
});

// cek sidebar from local storage
if (localStorage.getItem('toggle') === 'close') {
  sidebar.classList = 'sidebar close';
}

// Dropdown menu
const dropdown = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown-menu');
const iconDown = document.querySelector('.icon-down');
dropdown.addEventListener('click', () => {
  dropdownMenu.classList.toggle('d-block');
  iconDown.classList.toggle('active');
});

// Change title while change tab
let docTitle = document.title;
window.addEventListener('blur', () => {
  document.title = 'Bayar Aja';
});
window.addEventListener('focus', () => {
  document.title = docTitle;
});

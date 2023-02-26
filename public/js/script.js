const body = document.querySelector('body'),
  html = document.querySelector('html'),
  sidebar = body.querySelector('nav'),
  toggle = body.querySelector('.toggle'),
  searchBtn = body.querySelector('.search-box'),
  modeSwitch = body.querySelector('.toggle-switch'),
  modeText = body.querySelector('.mode-text');

// Sidebar toggle dark mode
modeSwitch.addEventListener('click', () => {
  body.classList.toggle('dark');

  let mode;
  if (body.classList.contains('dark')) {
    modeText.innerText = 'Light mode';
    html.style.colorScheme = 'dark';
    mode = 'dark';
  } else {
    modeText.innerText = 'Dark mode';
    html.style.colorScheme = 'light';
    mode = 'light';
  }

  // set mode to local storage
  localStorage.setItem('mode', mode);
});

// cek mode from local storage
if (localStorage.getItem('mode') === 'dark') {
  body.classList = 'dark';
  modeText.innerText = 'Light mode';
  html.style.colorScheme = 'dark';
}

// Change title while change tab
let docTitle = document.title;
window.addEventListener('blur', () => {
  document.title = 'Pembayaran SPP';
});
window.addEventListener('focus', () => {
  document.title = docTitle;
});

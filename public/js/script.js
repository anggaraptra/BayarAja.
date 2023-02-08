const body = document.querySelector('body'),
  sidebar = body.querySelector('nav'),
  toggle = body.querySelector('.toggle'),
  searchBtn = body.querySelector('.search-box'),
  modeSwitch = body.querySelector('.toggle-switch'),
  modeText = body.querySelector('.mode-text');

modeSwitch.addEventListener('click', () => {
  body.classList.toggle('dark');

  if (body.classList.contains('dark')) {
    modeText.innerText = 'Light mode';
  } else {
    modeText.innerText = 'Dark mode';
  }
});

// Change title while change tab
let docTitle = document.title;
window.addEventListener('blur', () => {
  document.title = 'Pembayaran SPP';
});
window.addEventListener('focus', () => {
  document.title = docTitle;
});

const body = document.querySelector('body'),
  html = document.querySelector('html'),
  sidebar = body.querySelector('nav.sidebar'),
  toggle = body.querySelector('.toggle'),
  modeSwitch = body.querySelector('.toggle-switch'),
  modeText = body.querySelector('.mode-text'),
  logoLight = body.querySelector('.logo .logo-light'),
  logoDark = body.querySelector('.logo .logo-dark');

// Sidebar toggle dark mode
if (modeSwitch) {
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
}

// cek mode from local storage
if (localStorage.getItem('mode') === 'dark') {
  body.classList = 'dark';
  if (modeText) {
    modeText.innerText = 'Light mode';
    logoLight.classList.toggle('d-none');
    logoDark.classList.toggle('d-none');
  }
  html.style.colorScheme = 'dark';
}

// Sidebar toggle
if (toggle) {
  toggle.addEventListener('click', () => {
    sidebar.classList.toggle('close');

    let toggle;
    // set sidebar to local storage
    if (sidebar.classList.contains('close')) {
      toggle = 'close';
    }
    localStorage.setItem('toggle', toggle);
  });
}

// cek sidebar from local storage
if (localStorage.getItem('toggle') === 'close') {
  sidebar.classList = 'sidebar close';
}

// Dropdown menu
const dropdown = document.querySelector('.dropdown');
const dropdownMenu = document.querySelector('.dropdown-menu');
const iconDown = document.querySelector('.icon-down');
if (dropdown) {
  dropdown.addEventListener('click', () => {
    dropdownMenu.classList.toggle('d-block');
    iconDown.classList.toggle('active');
    window.addEventListener('click', (e) => {
      if (!dropdown.contains(e.target)) {
        dropdownMenu.classList.remove('d-block');
        iconDown.classList.remove('active');
      }
    });
  });
}

// Change title while change tab
let docTitle = document.title;
window.addEventListener('blur', () => {
  document.title = 'BayarAja.';
});
window.addEventListener('focus', () => {
  document.title = docTitle;
});

// Jam Digital
window.onload = function () {
  jam();
};

function jam() {
  let e = document.getElementById('jam'),
    ucapan = document.getElementById('ucapan'),
    d = new Date(),
    h,
    m;

  h = d.getHours();
  m = set(d.getMinutes());

  if (e || ucapan) {
    if (h >= 0 && h < 12) {
      ucapan.innerHTML = 'Pagi';
    } else if (h >= 12 && h < 15) {
      ucapan.innerHTML = 'Siang';
    } else if (h >= 15 && h < 18) {
      ucapan.innerHTML = 'Sore';
    } else if (h >= 18 && h <= 23) {
      ucapan.innerHTML = 'Malam';
    }

    e.innerHTML = h + ':' + m;
  }

  setTimeout('jam()', 1000);
}

function set(e) {
  e = e < 10 ? '0' + e : e;
  return e;
}

// Toggle alert close
const alert = document.querySelector('.alert');
const btnAlert = document.querySelector('button.btn-close');
if (alert || btnAlert) {
  btnAlert.addEventListener('click', () => {
    alert.style.display = 'none';
  });
}

// Toggle password visibility
function showPass() {
  let x = document.getElementById('password');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}

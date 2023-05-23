const authBtn = document.querySelector('.auth-btn');
const modal = document.querySelector('.modal');
const modalTitle = document.querySelector('.modal-title');
const modalClose = document.querySelector('.modal-close');
const loginModal = document.querySelector('.modal-login');
const regModal = document.querySelector('.modal-register');
const modalLoginBtn = document.querySelector('.login-btn');
const modalRegBtn = document.querySelector('.register-btn');
const logoutBtn = document.querySelector('.logout-btn');
const accordions = document.querySelectorAll('.accordion');
const productNameInput = document.querySelector('#product_name');

if (authBtn) {
  authBtn.addEventListener('click', () => {
    modal.classList.add('open');
  });
}

if (modal && !location.href.includes('admin')) {
  modal.addEventListener('click', (e) => {
    if (e.target != modal) return;

    modal.classList.remove('open');
  });

  modalClose.addEventListener('click', (e) => {
    modal.classList.remove('open');
  });

  modalTitle.textContent = 'Login';

  modalLoginBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Login';

    regModal.classList.remove('show');
    regModal.classList.add('hide');

    loginModal.classList.add('show');
    loginModal.classList.remove('hide');
  });

  modalRegBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Register';

    loginModal.classList.remove('show');
    loginModal.classList.add('hide');
    regModal.classList.remove('hide');
    regModal.classList.add('show');
  });
}

if (logoutBtn) {
  logoutBtn.addEventListener('click', () => {
    fetch('inc/auth/logout.php')
      .then(() => {
        window.open('/bar/index.php', '_self');
      })
      .catch((e) => console.log(e));
  });
}

// check if its a right page
if (location.href.includes('about') || location.href.includes('admin')) {
  accordions.forEach((q) => {
    q.addEventListener('click', (e) => {
      if (e.target.classList.contains('accordion-title')) {
        q.classList.toggle('open');
      }
    });
  });
}

if (productNameInput) {
  productNameInput.addEventListener('blur', (e) => {
    productNameInput.value = productNameInput.value.trim();
  });
}

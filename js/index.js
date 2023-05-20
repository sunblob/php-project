const authBtn = document.querySelector('.auth-btn');
const modal = document.querySelector('.modal');
const modalTitle = document.querySelector('.modal-title');
const modalClose = document.querySelector('.modal-close');

authBtn.addEventListener('click', () => {
  modal.classList.add('open');
});

modal.addEventListener('click', (e) => {
  if (e.target != modal) return;

  modal.classList.remove('open');
});

modalClose.addEventListener('click', (e) => {
  modal.classList.remove('open');
});

modalTitle.textContent = 'Login';

export function handleModal() {
  const trigger = document.querySelector('.js-modal-trigger');
  if (trigger) {
    const content = document.querySelector('.js-modal-content');
    trigger.addEventListener('click', () => {
      content.classList.add('active');
      document.body.style.overflow = 'hidden';
    });
    content.addEventListener('click', () => {
      content.classList.remove('active');
      document.body.style.overflow = 'initial';
    });
    content.querySelector('.js-modal-close').addEventListener('click', () => {
      content.classList.remove('active');
      document.body.style.overflow = 'initial';
    });
  }
}

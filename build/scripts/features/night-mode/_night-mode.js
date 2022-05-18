import { setCookie } from '../../utils/_helpers';

export function handleNightMode() {
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  const body = document.querySelector('body');

  // check for preferences
  if (
    prefersDarkScheme.matches &&
    !document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=light'))
  ) {
    body.classList.add('night-mode-active');
    document.querySelector('.js-dark-mode').classList.add('is-active');
    setCookie('theme', 'dark', 90);
  }

  if (
    document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=dark'))
  ) {
    body.classList.add('night-mode-active');
    document.querySelector('.js-dark-mode').classList.add('is-active');
  }

  if (
    document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=light'))
  ) {
    body.classList.remove('night-mode-active');
    document.querySelector('.js-dark-mode').classList.remove('is-active');
  }

  // add dark mode on click delay due to header cloning
  setTimeout(() => {
    const toggles = document.querySelectorAll('.js-dark-mode ');
    if (toggles.length > 0) {
      toggles.forEach((btn) => {
        btn.addEventListener('click', () => {
          if (body.classList.contains('night-mode-active')) {
            body.classList.remove('night-mode-active');
            btn.classList.remove('is-active');
            // document.cookie = 'theme=light';
            setCookie('theme', 'light', 90);
          } else {
            body.classList.add('night-mode-active');
            btn.classList.add('is-active');
            // document.cookie = 'theme=dark';
            setCookie('theme', 'dark', 90);
          }
        });
      });
    }
  }, 1000);
}

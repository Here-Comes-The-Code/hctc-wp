import { stripHTML } from './utils';

export function handleAcfAdmin() {
  const isAdminActive = document.body.classList.contains('wp-admin');

  if (isAdminActive) {
    window.addEventListener('load', () => {
      setAccordionName();
    });
  }
}

const setAccordionName = () => {
  const appliableAccordions = document.querySelectorAll(
    '.acf-field-accordion .acf-field[data-name="title"]'
  );
  const canApply = appliableAccordions.length > 0;
  if (canApply) {
    appliableAccordions.forEach((acc) => {
      const title = acc
        .closest('.acf-field-accordion')
        .querySelector('.acf-accordion-title label');
      if (title) {
        const checkbox = acc.parentElement.querySelector(
          'input[type="checkbox"]'
        );
        const inputTitle = acc.classList.contains('acf-field-wysiwyg')
          ? acc.querySelector('textarea')
            ? acc.querySelector('textarea').value
            : ''
          : acc.querySelector('input')
          ? acc.querySelector('input').value
          : '';
        const inputSubtitle = acc.parentElement.querySelector(
          '[data-name="subtitle"] input'
        );
        title.innerText = `${
          checkbox && checkbox.checked ? '[x] ' : ''
        }${stripHTML(inputTitle)}${
          inputSubtitle && inputSubtitle.value
            ? ` - ${inputSubtitle.value}`
            : ''
        }`;
      }
    });
  }
};

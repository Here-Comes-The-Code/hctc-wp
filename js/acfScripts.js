export function handleAcfAdmin() {
  const isAdminActive = document.body.classList.contains('wp-admin');

  if (isAdminActive) {
    window.addEventListener('load', () => {
      setAccordionName();
    });
  }
}

const setAccordionName = (field) => {
  const appliableAccordions = document.querySelectorAll(
    '.acf-field-accordion .acf-field[data-name="title"]'
  );
  const canApply = appliableAccordions.length > 0;
  if (canApply) {
    appliableAccordions.forEach((acc) => {
      acc
        .closest('.acf-field-accordion')
        .querySelector('.acf-accordion-title label').innerText = `${
        acc.querySelector('input').value
      } - ${
        acc.parentElement.querySelector('[data-name="subtitle"] input').value
      }`;
    });
  }
};

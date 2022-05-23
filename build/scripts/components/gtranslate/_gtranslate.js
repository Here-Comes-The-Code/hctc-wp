export function moveGTranslate() {
  const translateSwitcher = document.querySelector('.switcher');
  if (translateSwitcher) {
    const target = document.querySelector('.wrapp-header');
    translateSwitcher.classList.add('is-active');
    // imitate click to fire default plugin actions
    translateSwitcher.click();
    translateSwitcher.addEventListener('click', () => {
      translateSwitcher.classList.toggle('is-open');
    });

    const siblingElement = document.querySelector('.widgetarea-head');

    console.log(target, siblingElement, translateSwitcher);
    target.insertBefore(translateSwitcher, siblingElement);
    siblingElement.style.marginLeft = 0;
  }
}

export function handleSocialIcons() {
  const icons = document.querySelector('.custom-html-widget');
  if (icons) {
    icons.addEventListener('click', () => {
      icons.classList.toggle('is-active');
    });
  }
}

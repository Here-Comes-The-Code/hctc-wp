export function handleDynamicContentList() {
  const contentListPresent = [...document.querySelectorAll('h2')].filter((el) =>
    el.innerText.toLowerCase().includes('spis treści')
  );
  if (contentListPresent.length > 0) {
    const hook = contentListPresent[0];
    const contentsListContainer = hook.parentElement.querySelector('ol', 'ul');
    if (contentsListContainer) {
      // create fixed menu
      // create dynamic popup
      const fixedListContainer = document.createElement('div');
      fixedListContainer.classList.add('c_contents-list-fixed');

      fixedListContainer.style.left = `${
        document.querySelector('article').getBoundingClientRect().right + 15
      }px`;
      fixedListContainer.appendChild(hook.parentElement.cloneNode(true));
      document.body.append(fixedListContainer);

      // add events
      hook.innerText =
        'Spis Treści - kliknij aby przenieśc się do  wskazanej sekcji';
      [...contentsListContainer.children].forEach((el) => {
        const textContent = el.innerText.toLowerCase();
        const targetElement = [
          ...document.querySelectorAll('h1, h2, h3, h4, h5, h6'),
        ].find((el) => el.innerText.toLowerCase().includes(textContent));

        const fixedMenuTargetElement = [
          ...fixedListContainer.querySelectorAll('li'),
        ].find((el) => el.textContent.toLowerCase().includes(textContent));
        el.addEventListener('click', () => {
          targetElement.scrollIntoView();
        });

        fixedMenuTargetElement.addEventListener('click', () => {
          targetElement.scrollIntoView();
        });
      });

      window.addEventListener('scroll', () => {
        window.scrollY > hook.offsetTop &&
        window.scrollY <
          document.body.querySelector('footer.entry-meta').offsetTop
          ? fixedListContainer.classList.add('active')
          : fixedListContainer.classList.remove('active');
      });
    }
  }
}

export function handlePagination() {
  const dataContainers = document.querySelectorAll('.js-pagination');
  if (dataContainers.length > 0) {
    dataContainers.forEach((dc) => {
      const items = [...dc.querySelectorAll('.js-pagination-item')];
      const btn = dc.parentElement.querySelector('.js-pagination-read-more');
      const paginationStep = 4;
      let counter = 0;
      // initialise first items
      const loadNext = () => {
        const currentIndex = counter * paginationStep;
        const nextIndex = counter * paginationStep + paginationStep;
        if (nextIndex > items.length) {
          btn.disabled = true;
        }
        items.slice(currentIndex, nextIndex).forEach((item) => {
          item.classList.add('visible');
        });
      };
      loadNext();
      if (items.length > paginationStep) {
        btn.classList.add('active');
      }
      btn.addEventListener('click', () => {
        counter++;
        loadNext();
      });
    });
  }
}


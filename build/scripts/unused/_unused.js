/* fn to handle language selector positioning, at present state not needed */
function handleLanguageSelector() {
  const selector = document.getElementById('gtranslate_wrapper');

  if (selector) {
    window.addEventListener('scroll', function () {
      const mobileMatch = window.matchMedia('(max-width: 991px)');
      const mdMatch = window.matchMedia('(min-width: 992px)');
      const lgMatch = window.matchMedia('(min-width: 1100px)');
      const xlMatch = window.matchMedia('(min-width: 1200px)');

      const target = mobileMatch
        ? document.querySelector('.main-header')
        : document.querySelector('.navigation-wrap');

      // add proportional topScroll distances referenced to
      // keeping inline top-right header row
      let distance = 0;
      if (mobileMatch) {
        distance = -32;
      }
      if (mdMatch) {
        distance = -32;
      }
      if (lgMatch) {
        distance = -32;
      }
      if (xlMatch) {
        distance = 0;
      }

      if (target.getBoundingClientRect().bottom <= distance) {
        selector.classList.add('show');
      } else {
        selector.classList.remove('show');
      }
    });
  }
}

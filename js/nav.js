function handleNav() {
  const mobileNavTrigger = document.querySelector('.js-mobile-nav-trigger');
  if (mobileNavTrigger) {
    const mobileNav = document.querySelector('.js-nav');
    mobileNavTrigger.addEventListener('click', () => {
      mobileNav.classList.toggle('is-active');
      mobileNavTrigger.classList.toggle('is-active');
    });
  }
}

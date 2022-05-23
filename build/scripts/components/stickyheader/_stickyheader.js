export function handleStickyHeader() {
  const header = document.querySelector('header');
  if (header) {
    window.addEventListener('scroll', (e) => {
      console.log(e);
    });
  }
}

export function handleMobileNav() {
  // nav button
  // create elements
  const mobileMenuButton = document.createElement('button');
  const mobileMenuIcon = document.createElement('i');
  mobileMenuButton.classList.add('btn', 'c_btn--nav');
  mobileMenuIcon.classList.add('fas', 'fa-bars');
  const headerContainer = document.querySelector('.wrapp-header');
  mobileMenuButton.append(mobileMenuIcon);
  headerContainer.append(mobileMenuButton);
  //
  let isMobileMenuActive = false;
  mobileMenuButton.addEventListener('click', () => {
    isMobileMenuActive = !isMobileMenuActive;
    if (isMobileMenuActive) {
      headerContainer.classList.add('mobile-nav-active');
      document.body.style.overflow = 'hidden';
      mobileMenuIcon.classList.add('fa-times');
      mobileMenuIcon.classList.remove('fa-bars');
    } else {
      mobileMenuIcon.classList.remove('fa-times');
      mobileMenuIcon.classList.add('fa-bars');
      headerContainer.classList.remove('mobile-nav-active');
      document.body.style.overflow = 'auto';
    }
  });
}

export function handleSearchButton() {
  const searchBtn = document.querySelector('.search-button a');
  const searchIcon = searchBtn.querySelector('a > i');
  console.log(searchIcon);
  let isSearchActive = false;
  searchBtn.addEventListener('click', () => {
    isSearchActive = !isSearchActive;
    searchIcon.classList.remove('fa');
    if (isSearchActive) {
      searchBtn.parentElement.classList.add('is-active');
      searchIcon.classList.remove('fas', 'fa-search');
      searchIcon.classList.add('fas', 'fa-times');
    } else {
      searchBtn.parentElement.classList.remove('is-active');
      searchIcon.classList.add('fas', 'fa-search');
      searchIcon.classList.remove('fas', 'fa-times');
    }
  });
}

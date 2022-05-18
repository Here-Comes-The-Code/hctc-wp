export function handleOffer() {
  const offerContainer = document.querySelector('.js-offer-container');

  if (offerContainer) {
    const initBtn = document.querySelector('.js-offer-init');
    const deleteBtn = document.querySelector('.js-offer-delete');
    const maxViewBtn = document.querySelector('.js-offer-maximize');
    const closeViewBtn = document.querySelector('.js-offer-close');
    let activeState = 'slider';
    const slider = {
      HTMLref: '.c_offer__container',
      instance: null,
      config: {
        breakpoints: {
          1024: {
            slidesPerView: 3,
            autoHeight: false,
          },
        },
        slidesPerView: 1,
        centeredSlides: true,
        navigation: {
          nextEl: '.c_offer__btn-next',
          prevEl: '.c_offer__btn-prev',
        },
        speed: 500,
        autoHeight: true,
        effect: 'coverflow',
        coverflowEffect: {
          depth: 100,
          multiplier: 1,
          rotate: 15,
        },
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
        },

        keyboard: {
          enabled: true,
        },
        updateOnWindowResize: true,
        updateOnImagesReady: true,
        on: {
          slideChange: function () {
            slider.instance.update();
          },
        },
      },
      get instanceRef() {
        return this.instance;
      },
    };

    function remove() {
      if (slider.instance && activeState === 'slider') {
        deleteBtn.classList.toggle('is-active');
        initBtn.classList.toggle('is-active');
        slider.instance.destroy(true, true);
        offerContainer.classList.add('one-page');
        activeState = 'one-page';
      }
    }
    function init() {
      if (activeState === 'one-page') {
        deleteBtn.classList.toggle('is-active');
        initBtn.classList.toggle('is-active');
        offerContainer.classList.remove('one-page');

        slider.instance = new Swiper(slider.HTMLref, slider.config);
        activeState = 'slider';
      }
    }

    function maximizeView(active) {
      if (active) {
        offerContainer.parentElement.classList.add('fullscreen');
      } else {
        offerContainer.parentElement.classList.remove('fullscreen');
      }
      slider.instance.update();
    }

    // init fresh instance
    slider.instance = new Swiper(slider.HTMLref, slider.config);
    slider.instance.update();
    // handle controls
    if (deleteBtn) {
      deleteBtn.addEventListener('click', remove);
    }
    if (initBtn) {
      initBtn.addEventListener('click', init);
      initBtn.classList.add('is-active');
    }
    if (maxViewBtn) {
      maxViewBtn.addEventListener('click', () => maximizeView(true));
    }
    if (closeViewBtn) {
      closeViewBtn.addEventListener('click', () => maximizeView(false));
    }
  }
}

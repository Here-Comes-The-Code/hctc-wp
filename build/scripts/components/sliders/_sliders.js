// import Swiper bundle with all modules installed
import Swiper from 'swiper/swiper-bundle';

export function handleSliders() {
  const sliders = [];
  //    toInitializeSliders
  function initializeSliders(slidersArray) {
    slidersArray.forEach((slider) => {
      if (document.querySelector(slider.HTMLref)) {
        slider.instance = new Swiper(slider.HTMLref, slider.config);
        slider.events &&
          slider.events.forEach((e) => e.body(e.event, slider.instance));
        slider.functions &&
          slider.functions.forEach((fn) => fn.body(slider.instance));

        slider.instance.on('slideChange', () => {});
      }
    });
  }
  const scrollSlider = {
    HTMLref: '.js-swiper-scroll',
    instance: null,
    config: {
      direction: 'vertical',
      slidesPerView: 'auto',
      freeMode: true,
      scrollbar: {
        el: '.swiper-scrollbar',
      },
      mousewheel: true,
    },
    get instanceRef() {
      return this.instance;
    },
    events: [],
    functions: [],
  };
  const bannerSlider = {
    HTMLref: '.c_ad__slider-container',
    instance: null,
    config: {
      // navigation: {
      //   nextEl: '.c_ad__slider-button-prev.swiper-button-next',
      //   prevEl: '.c_ad__slider-button-prev.swiper-button-prev',
      // },
      pagination: {
        el: '.c_ad__slider-pagination.swiper-pagination',
        clickable: true,
      },
      speed: 1500,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      observeParents: true,
      observer: true,
      loop: true,
      virtualTranslate: true,

      grabCursor: true,
      keyboard: {
        enabled: true,
      },
      autoplay: {
        disableOnInteraction: false,
        delay: 4000,
      },
    },
    get instanceRef() {
      return this.instance;
    },
    events: [],
    functions: [],
  };

  sliders.push(bannerSlider, scrollSlider);
  initializeSliders(sliders);
}

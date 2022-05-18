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

  const bannerSlider = {
    HTMLref: '.c_ad__slider-container',
    instance: null,
    config: {
      navigation: {
        nextEl: '.c_ad__slider-button-prev.swiper-button-next',
        prevEl: '.c_ad__slider-button-prev.swiper-button-prev',
      },
      speed: 500,
      loop: true,
      grabCursor: true,
      // autoHeight:true, effect: 'fade', fadeEffect: {     crossFade: true },
      keyboard: {
        enabled: true,
      },
      autoplay: {
        disableOnInteraction: false,
        delay: 6000,
      },
      updateOnWindowResize: true,
      // preloadImages: true,
      updateOnImagesReady: true,
    },
    get instanceRef() {
      return this.instance;
    },
    events: [
      {
        event: 'slideChange',
        body: function (event, slider) {
          slider.on(event, () => {
            slider.update();
            // slider.updateAutoHeight();
          });
        },
      },
    ],
    functions: [
      {
        body: function (slider) {
          const nextSlideBtn = document.querySelector(
            '.c_ad__slider-button-next.swiper-button-next'
          );
          const prevSlideBtn = document.querySelector(
            '.c_ad__slider-button-prev.swiper-button-prev'
          );
          if (nextSlideBtn) {
            nextSlideBtn.addEventListener('click', () => {
              slider.slideNext();
            });
          }
          if (prevSlideBtn) {
            prevSlideBtn.addEventListener('click', () => {
              slider.slidePrev();
            });
          }

          setTimeout(() => {
            if (slider.slides) {
              slider.slides.forEach((slide) => {
                const img = slide.firstElementChild.querySelector('img');
                const imgParent = img.parentElement.parentElement;
                createImgClone(
                  img,
                  hasEqualSize(img, imgParent),
                  'c_img--clone',
                  'c_img--clone-parent',
                  imgParent
                );
              });
            }
          }, 2000);

          function hasEqualSize(refEl, targetEl) {
            const hasEqualWidth =
              refEl.getBoundingClientRect().width ===
              targetEl.getBoundingClientRect().width;
            const hasEqualHeight =
              refEl.getBoundingClientRect().height ===
              targetEl.getBoundingClientRect().height;

            return hasEqualWidth && hasEqualHeight ? true : false;
          }

          function createImgClone(
            imgHTMLElement,
            hasEqualSize,
            cssClass,
            parentCssClass,
            parentElement
          ) {
            if (hasEqualSize) {
              const newImg = imgHTMLElement.cloneNode(true);
              newImg.classList.add(cssClass);
              parentElement
                ? parentElement.classList.add(parentCssClass)
                : imgHTMLElement.parentElement.classList.add(parentCssClass);
              imgHTMLElement.classList.add('c_img--clone-ref');
              imgHTMLElement.parentElement.appendChild(newImg);
            }
          }
        },
      },
    ],
  };

  sliders.push(bannerSlider);
  initializeSliders(sliders);
}

// tradedoubler scripts
window.tdlcAsyncInit = function () {
  TDLinkConverter.init({});
};
var tdlc_1d43f5s_a = new Date();
tdlc_1d43f5s_a.setMinutes(0);
tdlc_1d43f5s_a.setSeconds(0);
var tdlc_1d43f5s_seconds = parseInt(tdlc_1d43f5s_a.getTime() / 1000);
(function (d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0];
  if (d.getElementsByTagName(s)[0]);
  if (d.getElementById(id)) {
    return;
  }
  js = d.createElement(s);
  js.id = id;
  js.src =
    'https://clk.tradedoubler.com/lc?a(3251354)rand(' +
    tdlc_1d43f5s_seconds +
    ')';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'tdlc-jssdk'));
// custom scripts
init();

function init() {
  handleSliders();
  handleNightMode();
  handleCustomPostLoading();
  handleOffer();
  handlePromoPage();
  // handleLanguageSelector();
  handleDynamicContentList();
}
function handleDynamicContentList() {
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
function handleOffer() {
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
function handleSliders() {
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

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = 'expires=' + d.toUTCString();
  document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
}

function handleNightMode() {
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  const body = document.querySelector('body');

  // check for preferences
  if (
    prefersDarkScheme.matches &&
    !document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=light'))
  ) {
    body.classList.add('night-mode-active');
    document.querySelector('.js-dark-mode').classList.add('is-active');
    setCookie('theme', 'dark', 90);
  }

  if (
    document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=dark'))
  ) {
    body.classList.add('night-mode-active');
    document.querySelector('.js-dark-mode').classList.add('is-active');
  }

  if (
    document.cookie
      .split('; ')
      .find((cookie) => cookie.startsWith('theme=light'))
  ) {
    body.classList.remove('night-mode-active');
    document.querySelector('.js-dark-mode').classList.remove('is-active');
  }

  // add dark mode on click delay due to header cloning
  setTimeout(() => {
    const toggles = document.querySelectorAll('.js-dark-mode ');
    if (toggles.length > 0) {
      toggles.forEach((btn) => {
        btn.addEventListener('click', () => {
          if (body.classList.contains('night-mode-active')) {
            body.classList.remove('night-mode-active');
            btn.classList.remove('is-active');
            // document.cookie = 'theme=light';
            setCookie('theme', 'light', 90);
          } else {
            body.classList.add('night-mode-active');
            btn.classList.add('is-active');
            // document.cookie = 'theme=dark';
            setCookie('theme', 'dark', 90);
          }
        });
      });
    }
  }, 1000);
}

function handleCustomPostLoading() {
  const container = document.querySelector('.js-cpost-loader');
  const trigger = document.querySelector('.js-cpost-loader-trigger');
  if (container && trigger) {
    let index = 1;
    const taxonomyInfo = {
      offset: container.dataset.taxonomyOffset,
      type: container.dataset.taxonomyType,
      term: container.dataset.taxonomyTerm,
    };
    trigger.addEventListener('click', () => {
      index++;
      loadMorePosts(taxonomyInfo, index, container, trigger);
    });
  }
}

function loadMorePosts(taxonomyInfo, index, container, trigger) {
  const apiEndpoint = `wp-json/wp/v2`;
  const URL = `${window.location.origin}/${apiEndpoint}`;
  let fetchURL = URL;
  if (taxonomyInfo) {
    handleBtnOnLoad(trigger, true);
    fetchData(
      fetchURL,
      taxonomyInfo.type,
      taxonomyInfo.term,
      index,
      taxonomyInfo.offset
    ).then((data) => {
      appendLoadedContent(data, container);
      handleBtnOnLoad(trigger, false);
    });
  }
}

function handleBtnOnLoad(button, active) {
  if (active) {
    button.classList.add('is-loading');
  }
  if (!active) {
    button.classList.remove('is-loading');
  }
}
function fetchData(URL, type, id, page, postsPerPage) {
  let fetchURL = URL;
  switch (type) {
    case 'taxonomy':
      fetchURL = `${fetchURL}/${id}?page=${page}&per_page=${postsPerPage}&_embed`;
      break;
    default:
      break;
  }

  return fetch(fetchURL, {
    method: 'GET',
    mode: 'cors',
    cache: 'no-cache',
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
    },
    redirect: 'follow',
    referrer: 'no-referrer',
  })
    .then((response) => {
      return response.json();
    })
    .then((response) => {
      if (response === undefined) {
      } else {
        return response;
      }
    })
    .catch(function (error) {
      console.log(
        'There was an error connecting to the network. Error message: ' + error
      );
    });
}

function appendLoadedContent(data, container) {
  data.forEach((d) => container.appendChild(createNewPost(d)));
}
function createNewPost(data) {
  const article = document.createElement('article');
  article.classList.add('c_affiliate-links__item');

  const template = `
        <header class="c_affiliate-links__item-header">
            <a
            class="c_affiliate-links__item-thumb-container"
            href=${data.link}
            ><div
                class="c_affiliate-links__item-thumb"
                style="
                background-image: url(${data.fimg_url});
                "
            ></div>
            </a>
            <span class="c_affiliate-links__item-date links-date"
            ><div class="post-date" onclick="">
                <span class="custom-post-date-day"> 12.01.2021 </span>
            </div>
            </span>
            <div class="c_affiliate-links__item-price">
            <span class="c_affiliate-links__item-price--old">${
              data.meta.old_price.length > 0 ? data.meta.old_price[0] : ''
            }</span>
            <span class="c_affiliate-links__item-price--new">${
              data.meta.new_price.length > 0 ? data.meta.new_price[0] : ''
            }</span>
            </div>
        </header>
        <aside class="">
            <h3 class="c_affiliate-links__item-title">
            <a
                href=${data.link}
                rel="bookmark"
                >${data.title.rendered}</a
            >
            </h3>
            <a
            class="c_affiliate-links__item-category"
            href="https://smartme.pl/links/roboty-odkurzajace/"
            >Roboty odkurzające</a
            >
        </aside>
    `;
  article.innerHTML = template;
  return article;
}

function handlePromoPage() {
  const promoPage = document.querySelector('body.single-affiliatelinks');
  if (promoPage) {
    const percentContainer = document.querySelector('.price-percent');
    const oldPrice = parseFloat(
      percentContainer.parentElement
        .querySelector('.price-old')
        .innerText.replace(' ', '')
        .match(/(\d|,)+/g)
        .pop()
    );
    const newPrice = parseFloat(
      percentContainer.parentElement
        .querySelector('.price-new')
        .innerText.replace(' ', '')
        .match(/(\d|,)+/g)
        .pop()
    );
    const percent = 100 - Math.round((newPrice / oldPrice) * 100);
    percentContainer.querySelector('.js-promo-percent').innerText = percent;
  }
}

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

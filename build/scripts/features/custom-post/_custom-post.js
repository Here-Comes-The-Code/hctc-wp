export function handleCustomPostLoading() {
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

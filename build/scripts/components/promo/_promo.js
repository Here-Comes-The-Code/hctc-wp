export function handlePromoPage() {
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

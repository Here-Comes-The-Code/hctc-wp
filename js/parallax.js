import simpleParallax from 'simple-parallax-js';

export function handleParallax() {
  const parallaxImgs = document.getElementsByClassName('js-parallax');
  if (parallaxImgs) {
    new simpleParallax(parallaxImgs, {
      scale: 1.2,
      delay: 0.6,
      transition: 'cubic-bezier(0,0,0,1)',
    });
  }
}

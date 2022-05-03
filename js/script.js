import { handleNav } from './nav';
import { handleParallax } from './parallax';
import { handleAcfAdmin } from './acfScripts';

const init = () => {
  handleNav();
  handleParallax();
  handleAcfAdmin();
};

init();

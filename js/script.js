import { handleNav } from './nav';
import { handleParallax } from './parallax';
import { handleAcfAdmin } from './acfScripts';
import { handleModal } from './modal';
import { handlePagination } from './pagination';

const init = () => {
  handleNav();
  handleParallax();
  handleAcfAdmin();
  handlePagination();
  handleModal();
};

init();

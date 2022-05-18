// components
import { handleOffer } from './components/offer/_offer';
import { handleDynamicContentList } from './components/dynamiclist/_dynamiclist';
import { handleSliders } from './components/sliders/_sliders';
import { handlePromoPage } from './components/promo/_promo';
// features
import { handleNightMode } from './features/night-mode/_night-mode';
import { handleCustomPostLoading } from './features/custom-post/_custom-post';
// pre-init code
import { preinit } from './preinit/_preinit';

// initialize code
const init = () => {
  preinit();
  handleSliders();
  handleOffer();
  handleDynamicContentList();
  handleNightMode();
  handleCustomPostLoading();
  handlePromoPage();
};

init();

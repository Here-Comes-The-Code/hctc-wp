export const preinit = () => {
  /* all functions that should be launched separately, before rest */
  /* trade-doubler */
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
  })(document, 'script', 'tdlc-jssdk');
};

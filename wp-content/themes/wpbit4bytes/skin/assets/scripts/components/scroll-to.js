export class ScrollToElement {
  constructor(
    globalElement = '.js-scroll-to-anchor',
    topElement = '.js-scroll-to-top'
  ) {
    this.globalElement = globalElement;
    this.topElement = topElement;
  }

  scrolltoGlobalElement() {
    $(this.globalElement).click((event) => {
      event.preventDefault();

      const $anchor = $(event.target);
      const anchorID = $anchor.attr('href');

      this.scrollToSelector(anchorID);
    });
  }

  scrolltoTopElement() {
    $(this.topElement).click((e) => {
      e.preventDefault();
      this.scrollToTop();
    });
  }

  onWindowScroll(){
    if (window.pageYOffset > 900) {
      $(this.topElement ).addClass("scroll-to-top--show");
    } else {
      $(this.topElement).removeClass("scroll-to-top--show"); 
    }
  }

  scrollToSelector(selector) {
    const $selector = $(selector);

    if ($selector.length) {
      $('html, body').animate({
        scrollTop: $selector.offset().top,
      }, 500);
    }
  }

  scrollToTop() {
    $('html, body').animate({
      scrollTop: 0,
    }, 500);
  }
}

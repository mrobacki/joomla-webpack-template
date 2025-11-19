function initScripts() {
  
  // $('.owl-carousel').each(function() {
    
  //   const itemsCount = $(this).data("items");
  //   const space = $(this).data("space");
  //   const autoPlay = $(this).data("autoplay") && $(this).data("autoplay") == 1 ? true : false;
  
  //   $(this).owlCarousel({
  //     loop: true,
  //     nav: false,
  //     dots: false,
  //     autoplay: autoPlay,
  //     autoplayTimeout:2000,
  //     autoplayHoverPause:false,
  //     margin: space ? space : 30,
  //     responsive: {
  //       0: {
  //         items: 1.5
  //       },
  //       768: {
  //         items: 2
  //       },
  //       1200: {
  //         items: itemsCount ? itemsCount : 3
  //       }
  //     },
  //   });
  
  // });
  
  $(function () {
    $('#frontPageSlider.slide').carousel({
      interval: 5000,
      pause: false,
    });
  });
  
  let sliders = document.querySelectorAll(
    '.banner .carousel-inner .carousel-item'
  );
  if (sliders.length) {
    sliders[0].classList.add('active');
  }
  
  // Dropdown menu
  const nav = [...document.querySelectorAll('.nav > li')];
  nav.forEach(a => {
    if(a.hasAttribute('data-id')) {
      const dropClass = a.getAttribute('data-id');
      const realURL = a.querySelector('a');
      // realURL.addEventListener('click', e => {
      // 	e.preventDefault()
      // })
      realURL.classList.add('dropdown-toggle');
      realURL.setAttribute('id', dropClass);
      realURL.setAttribute('aria-expanded', 'false');
      realURL.dataset.bsToggle = 'dropdown';
    }
  });
}

export const init = initScripts();
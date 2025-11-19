function headerSmallerOnScroll() {

  const pageHeader = document.querySelector('header');
  const addClassDistance = 200;
  window.addEventListener('scroll', () => {
    if(window.scrollY >= addClassDistance) {
      pageHeader.classList.add('smaller');
    } else {
      pageHeader.classList.remove('smaller');
    }
  });

}

export const headerSmaller = headerSmallerOnScroll();
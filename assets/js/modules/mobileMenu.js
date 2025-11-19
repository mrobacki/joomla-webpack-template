
// function openNav() {
//   if (window.innerWidth < 992) {
//     document.getElementById('mySidenav').style.width = '100%';
//   } else {
//     document.getElementById('mySidenav').style.width = '340px';
//   }
// }

// /* Close/hide the sidenav */
// function closeNav() {
//   document.getElementById('mySidenav').style.width = '0';
// }

function openCloseMobileMenu() {
  const hamburger = document.querySelectorAll('.sidenavmenuOpenClose');
  if(hamburger != null) {
    hamburger.forEach(h => {
      
      h.addEventListener('click', () => {
        document.getElementById('mySidenav').classList.toggle('show')
        document.getElementById('mySidenav').classList.toggle('hide')
      });
    });
  }
}

// export const openMenu = openNav();
// export const closeMenu = closeNav();
export const openClose = openCloseMobileMenu();
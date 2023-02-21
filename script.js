const username = document.querySelector('.username').textContent
const userLogo = document.querySelectorAll('[data-user-logo]')
const openMenu = document.querySelector('.user-logo')
const dropdown = document.querySelector('.dropdown')
var matches = username.match(/\b(\w)/g);
var acronym = matches.join('');

if (userLogo != null) {
  userLogo.forEach(logo => {
    logo.textContent = acronym.toUpperCase()
  })
}

openMenu.addEventListener('click', () => {
    dropdown.classList.toggle('open')
})

window.addEventListener("click", function (e) {
  if (
    !dropdown.contains(e.target) &&
    !openMenu.contains(e.target)
  ) {
    // if user clicks outside sidenav content close sidenav
    dropdown.classList.remove("open");
  }
});
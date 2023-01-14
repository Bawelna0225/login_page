const username = document.querySelector('.username').textContent
const userLogo = document.querySelector('.user-logo')
const dropdown = document.querySelector('.dropdown')
var matches = username.match(/\b(\w)/g);
var acronym = matches.join('');

userLogo.innerHTML = acronym.toUpperCase()

userLogo.addEventListener('click', () => {
    console.log('object');
    dropdown.classList.toggle('open')
})
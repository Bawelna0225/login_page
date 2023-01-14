const username = document.querySelector('.username').textContent
const userLogo = document.querySelector('.user-logo')
var matches = username.match(/\b(\w)/g);
var acronym = matches.join('');

userLogo.innerHTML = acronym.toUpperCase()
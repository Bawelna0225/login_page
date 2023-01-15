const visibilityToggle = document.querySelectorAll('.input span')

visibilityToggle.forEach(btn => {
  btn.addEventListener('click', (e) => {
    const password = e.target.parentNode.querySelector('input')
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.getAttribute('type') === 'password' ? e.target.textContent = 'visibility_off' : e.target.textContent = 'visibility'
    password.setAttribute('type', type);
  })
})
const themeForm = document.querySelector('#theme-form')
const themeInputs = document.querySelectorAll('[data-theme-option]')
const root = document.documentElement

themeForm.addEventListener('submit', (e) => {
	e.preventDefault()
	themeInputs.forEach((input) => {
		let optionName = input.getAttribute('data-theme-option')
		let colorInputValue = input.value

		root.style.setProperty(`--${optionName}`, colorInputValue) // setting css property
		localStorage.setItem(`${optionName}`, colorInputValue)
	})
})
themeInputs.forEach((input) => {
	let optionName = input.getAttribute('data-theme-option')
	root.style.setProperty(`--${optionName}`, localStorage.getItem(`${optionName}`))
    input.value = localStorage.getItem(`${optionName}`)
})

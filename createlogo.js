const authorName = document.querySelectorAll('.authorname')
const users = [],
	trimmed = []

authorName.forEach((author) => {
	users.push(author.textContent)
})
users.forEach((user) => {
	trimmed.push(user.replace(/\s/g, ''))
})

trimmed.forEach((trim) => {
	if (document.querySelector(`.${trim}`) != null) {
		var matches = trim.match(/\b(\w)/g)
		var acronym = matches.join('')
		document.querySelectorAll(`.${trim}`).forEach((logo) => {
			logo.textContent = acronym.toUpperCase()
		})
	}
})

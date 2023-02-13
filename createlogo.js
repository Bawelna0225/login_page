const authorName = document.querySelectorAll('.authorname')
const users = []

authorName.forEach((author) => {
	users.push(author.textContent)
})
users.forEach((user) => {
	var matches = user.match(/\b(\w)/g)
	var acronym = matches.join('')
    trimmed = user.replace(/\s/g, '')
	if (document.querySelector(`.${trimmed}`) != null) {
		document.querySelector(`.${trimmed}`).textContent = acronym.toUpperCase()
	}
})


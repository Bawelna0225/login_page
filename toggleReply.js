const replyButtons = document.querySelectorAll('.reply')
const cancelReplyButtons = document.querySelectorAll('.cancel-reply')

replyButtons.forEach((btn) => {
	btn.addEventListener('click', () => {
		let replyId = btn.getAttribute('data-comment-id')
		let form = document.querySelector(`#form-id-${replyId}`)
		form.classList.remove('hidden')
	})
})

cancelReplyButtons.forEach((btn) => {
	btn.addEventListener('click', () => {
		let cancelId = btn.getAttribute('data-cancel-id')
		let form = document.querySelector(`#form-id-${cancelId}`)
		form.classList.add('hidden')
	})
})

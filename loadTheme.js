const root = document.documentElement
root.style.setProperty('--primary-color', localStorage.getItem('primary-color'))
root.style.setProperty('--text-color', localStorage.getItem('text-color'))
root.style.setProperty('--accent-color', localStorage.getItem('accent-color'))
root.style.setProperty('--hover-accent-color', localStorage.getItem('hover-accent-color'))
root.style.setProperty('--input-border-color', localStorage.getItem('input-border-color'))
root.style.setProperty('--shadow-color', localStorage.getItem('shadow-color'))

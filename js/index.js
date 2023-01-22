// Dropdown
const dropdown = document.querySelector('.dropdown')

// All dropdown classes
const select = dropdown.querySelector('.select');
const caret = dropdown.querySelector('.caret');
const menu = dropdown.querySelector('.menu')
const options = dropdown.querySelectorAll('.menu li')
const selected = dropdown.querySelector('.selected')

// Functional
select.addEventListener('click', () => {
    select.classList.toggle('select-clicked')
    caret.classList.toggle('caret-rotate')
    menu.classList.toggle('menu-open')
})

// Close dropdown
document.addEventListener('click', (e) => {
    const targetDropdown = e.composedPath().includes(dropdown)
    if (!targetDropdown) {
        selected.classList.remove('select-clicked')
        caret.classList.remove('caret-rotate')
        menu.classList.remove('menu-open')
    }
})

// Add options choose functional
options.forEach(option => {
    option.addEventListener('click', () => {
        selected.innerText = option.innerText
        select.classList.remove('select-clicked')
        caret.classList.remove('caret-rotate')
        menu.classList.remove('menu-open')
        options.forEach(option => {
            option.classList.remove('active')
        })
        option.classList.add('active')
    })
})
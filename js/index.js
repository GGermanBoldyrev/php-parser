// Scroll to top
const upButton = document.querySelector('.up_button')

// Hidden by default
upButton.hidden = true

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY || document.documentElement.scrollTop
    scrollY > 400 ? upButton.hidden = false : upButton.hidden = true
})
upButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })
})

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

const emptyData = document.querySelector('.items_block_empty')
const lowestPrice = document.querySelector('.items_block_low_price')
const topPrice = document.querySelector('.items_block_top_price')
const topDiscount = document.querySelector('.items_block_top_discount')

// Default not displayed
lowestPrice.hidden = true
topPrice.hidden = true
topDiscount.hidden = true

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
        if (option.classList.contains('low_price')) {
            emptyData.hidden = true
            lowestPrice.hidden = false
            topPrice.hidden = true
            topDiscount.hidden = true
        } else if (option.classList.contains('top_price')) {
            emptyData.hidden = true
            lowestPrice.hidden = true
            topPrice.hidden = false
            topDiscount.hidden = true
        } else if (option.classList.contains('top_discount')) {
            emptyData.hidden = true
            lowestPrice.hidden = true
            topPrice.hidden = true
            topDiscount.hidden = false
        } else {
            emptyData.hidden = false
            lowestPrice.hidden = true
            topPrice.hidden = true
            topDiscount.hidden = true
        }
    })
})

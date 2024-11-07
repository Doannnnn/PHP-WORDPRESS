const modal = document.querySelector('.js-modal');
const btnClose = document.querySelector('.js-modal-close');
const modalContainer = document.querySelector('.js-modal-container');
const btnBuys = document.querySelectorAll('.js-buy-ticket');
const header = document.getElementById('header');
const mobileMenu = document.querySelector('.js-mobile-menu-btn')
const currentHeight = header.clientHeight;
const menuItems = document.querySelectorAll('.nav li a[href*="#"]')

btnBuys.forEach(btn => {
    btn.addEventListener('click', () => {
        modal.classList.add('open')
    });
});

btnClose.addEventListener('click', () => {
    modal.classList.remove('open')
});

modal.addEventListener('click', () => {
    modal.classList.remove('open')
});

modalContainer.addEventListener('click', (event) => {
    event.stopPropagation()
});

mobileMenu.addEventListener('click', () => {
    const isClose = header.clientHeight === currentHeight;

    if (isClose) {
        header.style.height = 'auto';
    } else {
        header.style.height = null;
    }
})

menuItems.forEach(item => {
    item.addEventListener('click', (event) => {
        const isParrentMenu = item.nextElementSibling && item.nextElementSibling.classList.contains('sub-nav');

        if (isParrentMenu) {
            event.preventDefault();
        } else {
            header.style.height = null;
        }
    })
})
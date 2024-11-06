const modal = document.querySelector('.js-modal')
const btnClose = document.querySelector('.js-modal-close')
const modalContainer = document.querySelector('.js-modal-container')
const btnBuys = document.querySelectorAll('.js-buy-ticket');

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
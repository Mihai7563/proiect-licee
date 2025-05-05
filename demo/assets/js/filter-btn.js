const filterBtn = document.querySelector('#filterToggleBtn');
const filterMenu = document.querySelector('#filterMenu');

filterBtn.addEventListener('click', () => {
    filterMenu.style.display = filterMenu.style.display == 'block' ? 'none' : 'block';
});
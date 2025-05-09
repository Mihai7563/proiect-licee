const sortBtn = document.querySelector('#sortToggleBtn');
const sortMenu = document.querySelector('#sortMenu');

const filterBtn = document.querySelector('#filterBtn');
const filterMenu = document.querySelector('#filterMenu');
const filterMenuMobile = document.querySelector('#filterMenuMobile');

function checkLargeScreen() {
    const isLargeScreen = window.matchMedia("(min-width: 1024px)").matches;

    if (isLargeScreen) {
        console.log("Large screen detected");

        filterBtn.addEventListener('click', toggleFilterMenuLarge);
        filterBtn.removeEventListener('click', toggleFilterMenuMobile);
    } else {
        console.log("Mobile screen detected.");

        filterBtn.addEventListener('click', toggleFilterMenuMobile);
        filterBtn.removeEventListener('click', toggleFilterMenuLarge);
    }
}

sortBtn.addEventListener('click', () => {
    filterMenu.style.display = 'none';
    filterMenuMobile.style.display = 'none';
    sortMenu.style.display = sortMenu.style.display == 'block' ? 'none' : 'block';
});

function toggleFilterMenuLarge() {
    sortMenu.style.display = 'none';
    filterMenuMobile.style.display = 'none';
    filterMenu.style.display = filterMenu.style.display == 'block' ? 'none' : 'block';
}

function toggleFilterMenuMobile() {
    filterMenu.style.display = 'none'; 
    filterMenuMobile.style.display = filterMenuMobile.style.display == 'block' ? 'none' : 'block';
}

document.getElementById('closeFilterMenuMobile').addEventListener('click', () => {
    filterMenuMobile.style.display = 'none';
});

checkLargeScreen();

window.addEventListener('resize', checkLargeScreen);

const searchBar = document.querySelector('.highschool-search-bar');
const schoolCards = document.querySelectorAll('.school-card');

function normalizeString(str) {
    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase();
}

searchBar.addEventListener('input', function () {
    const searchQuery = normalizeString(searchBar.value);

    schoolCards.forEach(card => {
        const schoolName = normalizeString(card.querySelector('h5').textContent);
        if (schoolName.includes(searchQuery)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
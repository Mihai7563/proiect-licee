const searchBar = document.querySelector('.highschool-search-bar');
const schoolCards = document.querySelectorAll('.school-card');

searchBar.addEventListener('input', function () {
    const searchQuery = searchBar.value.toLowerCase();

    schoolCards.forEach(card => {
        const schoolName = card.querySelector('h5').textContent.toLowerCase();
        if (schoolName.includes(searchQuery)) {
            card.parentElement.style.display = 'block';
        } else {
            card.parentElement.style.display = 'none';
        }
    });
});
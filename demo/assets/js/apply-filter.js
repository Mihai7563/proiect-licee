const applyBtn = document.querySelector('.apply-filters-btn');

applyBtn.addEventListener('click', () => {
    const filters = [];
    const highschoolCards = document.querySelectorAll('.school-card');

    const checkboxes = document.querySelector('.filter-menu').querySelectorAll('input[type="checkbox"]:checked');
    checkboxes.forEach(checkbox => {
        filters.push(checkbox.value);
        console.log(checkbox.value);
    });
    console.log(filters);

    highschoolCards.forEach(card => {
        if (filters.length == 0 || filters.some(filter => card.getAttribute('data-profile').split(', ').includes(filter))) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

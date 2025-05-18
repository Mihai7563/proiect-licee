function applySort() {
    const sortOption = document.querySelector('input[name="sortOptions"]:checked');
    if (!sortOption) {
        return;
    }
    
    const highschoolList = document.querySelector('#highschool-list');
    const highschoolCards = Array.from(highschoolList.querySelectorAll('.school-card'));

    const sortValue = sortOption.value;
    console.log(sortValue);
    
    highschoolList.innerHTML = ''; // Clear the list
    console.log(highschoolCards);

    highschoolCards
        .sort((a, b) => {
            const aValue = a.getAttribute(`data-${sortValue}`);
            const bValue = b.getAttribute(`data-${sortValue}`);
            
            switch (sortValue) {
                case 'medie-admitere':
                case 'promovabilitate':
                    console.log(parseFloat(aValue), parseFloat(bValue));
                    
                    return parseFloat(bValue) - parseFloat(aValue);
                case 'nume':
                    return aValue.localeCompare(bValue);
                default:
                    return 0;
            }
        })
        .forEach(card => {
            highschoolList.appendChild(card);
        });
    // console.log(highschoolCards);
    // window.location.href = `?sort=${sortValue}`;
}
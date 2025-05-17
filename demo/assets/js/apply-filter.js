const applyBtn = document.querySelector('.apply-filters-btn');

applyBtn.addEventListener('click', () => {
    const filters = [];
    const clubFilters = [];
    const programFilters = [];
    const highschoolCards = document.querySelectorAll('.school-card');

    // Filtre pentru profiluri
    const checkboxes = document.querySelector('.filter-menu').querySelectorAll('input[type="checkbox"]:checked[data-filter-type="profil"]');
    checkboxes.forEach(checkbox => {
        filters.push(checkbox.value);
    });

    // Filtre pentru categorii cluburi
    const clubCheckboxes = document.querySelector('.filter-menu').querySelectorAll('input[type="checkbox"]:checked[data-filter-type="club"]');
    clubCheckboxes.forEach(checkbox => {
        clubFilters.push(checkbox.value);
    });

    // Filtre pentru program
    const programCheckboxes = document.querySelector('.filter-menu').querySelectorAll('input[type="checkbox"]:checked[data-filter-type="program"]');
    programCheckboxes.forEach(checkbox => {
        programFilters.push(checkbox.value);
    });

    // Filtru pentru sector
    const sectorSelect = document.getElementById('sectorSelect');
    const selectedSector = sectorSelect ? sectorSelect.value : '';

    console.log(`test sector select = ${sectorSelect}`);
    

    // Media minimă și maximă
    const minAverageInput = document.getElementById('minAverage');
    const maxAverageInput = document.getElementById('maxAverage');
    const minAverage = minAverageInput && minAverageInput.value ? parseFloat(minAverageInput.value) : null;
    const maxAverage = maxAverageInput && maxAverageInput.value ? parseFloat(maxAverageInput.value) : null;

    highschoolCards.forEach(card => {
        const cardProfiles = card.getAttribute('data-profile').split(', ');
        const cardClubs = card.getAttribute('data-categorii-cluburi').split(', ');
        const cardPrograms = card.getAttribute('data-program').split(', ');
        const cardAverage = parseFloat(card.getAttribute('data-medie-admitere'));
        const cardSector = card.getAttribute('data-sector');

        const matchesProfile = filters.length === 0 || filters.some(filter => cardProfiles.includes(filter));
        const matchesClub = clubFilters.length === 0 || clubFilters.some(filter => cardClubs.includes(filter));
        const matchesProgram = programFilters.length === 0 || programFilters.some(filter => cardPrograms.includes(filter));
        const matchesAverage =
            (minAverage === null || cardAverage >= minAverage) &&
            (maxAverage === null || cardAverage <= maxAverage);
        const matchesSector = !selectedSector || selectedSector === '' || cardSector === selectedSector;

        if (matchesProfile && matchesClub && matchesProgram && matchesAverage && matchesSector) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

const isLargeScreen = window.matchMedia("(min-width: 1024px)").matches;
const noResultsMessage = document.querySelector('.no-results-message');
let applyBtn = null;
let resetBtn = null;
let sectorSelect = null;
let minAverageInput = null;
let maxAverageInput = null;
let filterContainer = null;
if(isLargeScreen) {
    applyBtn = document.querySelector('.apply-filters-btn');
    sectorSelect = document.getElementById('sectorSelect');
    minAverageInput = document.getElementById('minAverage');
    maxAverageInput = document.getElementById('maxAverage');
    resetBtn = document.querySelector('.reset-filters-btn');
}
else {
    applyBtn = document.querySelector('.apply-filters-btn-mobile');
    sectorSelect = document.getElementById('sectorSelectMobile');
    minAverageInput = document.getElementById('minAverageMobile');
    maxAverageInput = document.getElementById('maxAverageMobile');
    resetBtn = document.querySelector('.reset-filters-btn-mobile');
}

applyBtn.addEventListener('click', () => {
    noResultsMessage.style.display = 'none';
    const filters = [];
    const clubFilters = [];
    const programFilters = [];
    const highschoolCards = Array.from(document.querySelectorAll('.school-card'));

    // PROFILES
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-filter-type="profil"]');
    checkboxes.forEach(checkbox => {
        filters.push(checkbox.value);
    });

    // CLUBS
    const clubCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-filter-type="club"]');
    clubCheckboxes.forEach(checkbox => {
        clubFilters.push(checkbox.value);
    });

    // PROGRAM 
    const programCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked[data-filter-type="program"]');
    programCheckboxes.forEach(checkbox => {
        programFilters.push(checkbox.value);
    });

    // SECTOR
    const selectedSector = sectorSelect ? sectorSelect.value : '';

    console.log(`test sector select = ${sectorSelect}`);
    
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

    if(!(highschoolCards.some(card => card.style.display === 'block'))) {

        noResultsMessage.style.display = 'block';
    }
});

resetBtn.addEventListener('click', () => {
    noResultsMessage.style.display = 'none';
    const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });

    if (sectorSelect) {
        sectorSelect.value = '';
    }

    if (minAverageInput) {
        minAverageInput.value = '';
    }

    if (maxAverageInput) {
        maxAverageInput.value = '';
    }

    const highschoolCards = Array.from(document.querySelectorAll('.school-card'));
    highschoolCards.forEach(card => {
        card.style.display = 'block';
    });
});
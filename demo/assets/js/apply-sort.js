function applySort() {
    const sortOption = document.querySelector('input[name="sortOptions"]:checked');
    if (sortOption) {
        const sortValue = sortOption.value;
        window.location.href = `?sort=${sortValue}`;
    }
}
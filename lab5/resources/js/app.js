import './bootstrap';
function submitFormWithCurrentFilters(formId) {
    // Get the selected values from other forms
    const category = document.querySelector('input[name="category"]:checked');
    const brand = document.querySelector('input[name="brand"]:checked');
    const color = document.querySelector('input[name="color"]:checked');

    // Get the form to be submitted
    const form = document.getElementById(formId);

    // Set hidden inputs to maintain the selected values
    if (category) {
        form.insertAdjacentHTML('beforeend', `<input type="hidden" name="category" value="${category.value}">`);
    }
    if (brand) {
        form.insertAdjacentHTML('beforeend', `<input type="hidden" name="brand" value="${brand.value}">`);
    }
    if (color) {
        form.insertAdjacentHTML('beforeend', `<input type="hidden" name="color" value="${color.value}">`);
    }

    form.submit();
}
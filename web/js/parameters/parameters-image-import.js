$(document).ready(function () {
    $('#select-type').on('change', (event) => {
        const iconInput = $('#parameter-icon-form');
        const iconGrayInput = $('#parameter-icon-gray-form');

        if (event.currentTarget.value === '2') {
            iconInput.removeClass('d-none');
            iconGrayInput.removeClass('d-none');
        } else {
            iconInput.addClass('d-none');
            iconGrayInput.addClass('d-none');
        }
    })
});
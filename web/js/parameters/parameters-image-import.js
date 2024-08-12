$(document).ready(function () {
    const fileInputForm = $('.file-input-form');
    const selectForm = $('#select-type');

    if (selectForm.val() === '2') {
        fileInputForm.removeClass('d-none');
    }

    selectForm.on('change', (event) => {
        if (event.currentTarget.value === '2') {
            fileInputForm.removeClass('d-none');
        } else {
            console.log('aloha');
            fileInputForm.addClass('d-none');
        }
    })

    $('#parameters-icongray').on('change', function(event) {
        const input = event.target;
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                $('#preview-icon-gray')
                    .attr('src', e.target.result)
                    .removeClass('d-none');
            };

            reader.readAsDataURL(file);
        } else {
            $('#preview-icon-gray').addClass('d-none');
        }
    });
    $('#parameters-icon').on('change', function(event) {
        const input = event.target;
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                $('#preview-icon')
                    .attr('src', e.target.result)
                    .removeClass('d-none');
            };

            reader.readAsDataURL(file);
        } else {
            $('#preview-icon').addClass('d-none');
        }
    });
});
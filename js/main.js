$(document).ready(() => {
    $('#create-note-form-button').on('click', (e) => {
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: window.location.origin + '/notes/store',
            dataType: 'json',
            data: $('#create-note-form').serialize(),
            success: (res) => {
                $('.status').empty();
                if (res.res == 'success') {
                    $('.status').text(res.message);
                    $('.status').css('color', 'green');
                    $('.status').fadeIn(700);

                    setTimeout(() => {
                        window.location.replace(window.location.origin + '/notes/show/' + res.note_id);
                    }, 1000);
                } else if (res.res == 'error') {
                    $('.status').text(res.message);
                    $('.status').css('color', 'red');
                    $('.status').fadeIn(700);
                }
            },
            error: (err) => {
                console.log(err);
            }
        })
    });
});
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

    $('#edit-note-form-button').on('click', (e) => {
        e.preventDefault();
        console.log('clicked');

        $.ajax({
            type: 'post',
            url: window.location.origin + '/notes/update?id='+noteId,
            dataType: 'json',
            data: $('#edit-note-form').serialize(),
            success: (res) => {
                console.log(res);
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

    $('.delete-btn').on('click', (e) => {
        e.preventDefault();

        let button = $(e.currentTarget);

        $.confirm({
            title: "Are you sure?",
            content: "Delete this note?",
            buttons: {
                yes: () => {
                    const id = button.attr('data-id');
                    const url = window.location.origin + '/notes/delete';
                    const returnUrl = window.location.origin + '/notes';
                    const data = {
                        'id': id
                    };

                    $.ajax({
                        type: 'post',
                        url: url,
                        dataType: 'json',
                        data: data,
                        success: (res) => {
                            console.log(res)
                            if (res.res == 'success') {
                                setTimeout(() => {
                                    window.location.replace(returnUrl);
                                }, 1000);
                            } else if (res.res == 'error') {
                                console.log(res.error);
                            }
                        },
                        error: (err) => {
                            console.log(err.responseText);
                        }
                    })
                },
                no: () => {
                    this.close();
                }
            }
        }); 
    });
});
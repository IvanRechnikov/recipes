/*
    Добавление рецепта
 */

$('.add-btn').click(function (e){
    e.preventDefault();

    $(`input`).removeClass('error');

    let title = $('input[name="title"]').val(),
        ing = $('input[name="ing"]').val(),
        steps = $('input[name="steps"]').val();
        // photo = $('input[name="photo"]').val();

    let formData = new FormData();
    formData.append('title', title);
    formData.append('ing', ing);
    formData.append('steps', steps);
    // formData.append('authors', photo);

    $.ajax({
        url: 'assets/action/api.php?method=addRec',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('#add-recipe')[0].reset();
                $('.msg').removeClass('none').text(data.message);

            } else {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

/*
    Добавление ингридиента
 */

$('.add-ing-btn').click(function (e){
    e.preventDefault();

    $(`input`).removeClass('error');

    let title = $('input[name="title"]').val(),
        measure = $('input[name="measure"]').val();

    let formData = new FormData();
    formData.append('title', title);
    formData.append('measure', measure);

    $.ajax({
        url: 'assets/action/api.php?method=addIng',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('#add-ing')[0].reset();
                $('.msg').removeClass('none').text(data.message);

            } else {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

/*
    Показать рецепты/ингридиенты
 */

$('.show-rec').click(function (e){
    e.preventDefault();

    $.ajax({
        url: 'assets/action/api.php?method=showRec',
        type: 'GET',
        success (data) {
            if (data) {
                $('.msg').addClass('none')
                $('.ing-list').addClass('none')
                $('.recipes-list').removeClass('none')
            } else {
                alert('Произошла ошибка, повторите еще раз!');
            }

        }
    });
});

$('.show-ingredients').click(function (e){
    e.preventDefault();

    $.ajax({
        url: 'assets/action/api.php?method=showIng',
        type: 'GET',
        success (data) {
            if (data) {
                $('.msg').addClass('none')
                $('.recipes-list').addClass('none')
                $('.ing-list').removeClass('none')
            } else {
                alert('Произошла ошибка, повторите еще раз!');
            }

        }
    });
});

/*
    Редактирование ингридиента
 */

$('.edit-ing-btn').click(function (e){
    e.preventDefault();

    $(`input`).removeClass('error');

    let title = $('input[name="title"]').val(),
        measure = $('input[name="measure"]').val(),
        id = $('input[name="id"]').val();

    let formData = new FormData();
    formData.append('title', title);
    formData.append('measure', measure);
    formData.append('id', id);

    $.ajax({
        url: 'assets/action/api.php?method=editIng',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('#edit-ing')[0].reset();
                $('.msg').removeClass('none').text(data.message);

            } else {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

/*
    Удаление ингридиента
 */

$('.delete-ing').click(function (e){
    e.preventDefault();

    $.ajax({
        url: 'assets/action/api.php?method=deleteIng',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('#edit-ing')[0].reset();
                $('.msg').removeClass('none').text(data.message);

            } else {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});

/*
    Редактирование рецепта
 */

$('.edit-rec-btn').click(function (e){
    e.preventDefault();

    $(`input`).removeClass('error');

    let title = $('input[name="title"]').val(),
        ing = $('input[name="ing"]').val(),
        steps = $('input[name="steps"]').val(),
        id = $('input[name="id"]').val();
    // photo = $('input[name="photo"]').val();

    let formData = new FormData();
    formData.append('title', title);
    formData.append('ing', ing);
    formData.append('steps', steps);
    formData.append('id', id);
    // formData.append('authors', photo);

    $.ajax({
        url: 'assets/action/api.php?method=editRec',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                $('#edit-rec')[0].reset();
                $('.msg').removeClass('none').text(data.message);

            } else {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                });

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});
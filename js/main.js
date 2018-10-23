$(document).ready(function () {
    var wwwroot  = $('body').data('wwwroot');
    var loading  = $('#loading');
    var error    = $('#error');
    var entry    = $('#list');
    var template = $('#restmpl').html();
    $('#searchbtn').on('click', function (e) {
        e.preventDefault();
        entry.not('#restmpl').empty();
        error.hide();
        loading.show();
        var formdata = $(e.target).closest('form').serialize();
        $.ajax({
            type: 'get',
            url: wwwroot + '/actions.php?action=search',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                if (!data.error) {
                    entry.append(
                        Mustache.render(template, { 'list': data })
                    );
                } else {
                    error.show();
                }
            },
            error: function () {
                error.show();
            },
            complete: function () {
                loading.hide();
            }
        });
    });
});

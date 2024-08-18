$('body').on('click', '#btn-log-blog', function () {

    $('#table_wrapper').remove();
    $('#table-log').removeClass('d-none');
    $('#table-log').addClass('d-block');

    $('#table-log').DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        order: [4, "desc"],
        ajax: {
            'url': $('#log-url').val(),
        },
        columns: [
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at', orderable: false },
        ],
    });
});

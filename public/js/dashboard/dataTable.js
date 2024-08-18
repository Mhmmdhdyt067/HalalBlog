$(document).ready(function () {
    $('#table').DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        order: [4, "desc"],
        ajax: {
            'url': $('#table-url').val(),
            'data': function (data) {
                data.category = $('#category-filter').val()
            },
        },
        columns: [
            { data: 'title', name: 'title' },
            { data: 'excerpt', name: 'excerpt', orderable: false },
            { data: 'category.name', name: 'category.name', searchable: false, orderable: false },
            { data: 'action', name: 'action', searchable: false, orderable: false },
        ],
        columnDefs: [
            {
                "targets": 2,
                "render": function (data, type, row) {
                    let className = '';
                    let categoryName = '';

                    switch (data) {
                        case 'Perkum':
                            className = 'badge rounded-pill bg-primary';
                            categoryName = 'Perkum';
                            break;

                        case 'Healing':
                            className = 'badge rounded-pill bg-info';
                            categoryName = 'Healing';
                            break;

                        default:
                            className = 'badge rounded-pill bg-secondary';
                            categoryName = 'Unknown';
                            break;
                    }

                    return `<span class="${className} text-center">${categoryName}</span>`;
                },
                "responsivePriority": 1, targets: [2], className: "text-center align-content-center",
            }
        ]
    });

    $('#category-filter').change(function () {
        reloadTable('#table');
    });

    $('#btn-recycle-blog').click(function () {
        changeTableUrl('#table', $('#recycle-url').val());
        reloadTable('#table');
    });

    function reloadTable(id) {
        var table = $(id).DataTable();
        table.cleanData;
        table.ajax.reload();
    }

    function changeTableUrl(id, newUrl) {
        var table = $(id).DataTable();
        table.ajax.url(newUrl).load();
    }

});

$("body").on("click", "#btn-restore-blog", function () {
    let blog_id = $(this).data("id");
    let token = $("meta[name='csrf-token']").attr("content");

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mx-3",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Yakin ingin mengembalikan Data?",
            text: "Data Akan Kembali",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "   Yes, restore it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/dashboard/blogs/restore/${blog_id}`,
                    type: "POST",
                    cache: false,
                    data: {
                        _token: token,
                        id: blog_id
                    },
                    success: function (response) {
                        swalWithBootstrapButtons.fire({
                            title: "Deleted!",
                            text: `${response.message}`,
                            icon: "success",
                        });

                        reloadTable('#table');
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Data tidak jadi untuk direstore :)",
                    icon: "error",
                });
            }
        });
    function reloadTable(id) {
        var table = $(id).DataTable();
        table.cleanData;
        table.ajax.reload();
    }
});


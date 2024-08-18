$("body").on("click", "#btn-destroy-blog", function () {
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
            title: "Yakin ingin menghapus Data?",
            text: "Data Akan Menghilang Selama-lamanya",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "   Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/dashboard/blogs/destroy/${blog_id}`,
                    type: "POST",
                    cache: false,
                    data: {
                        _token: token,
                        id: blog_id
                    },
                    success: function (response) {
                        swalWithBootstrapButtons.fire({
                            title: "Deleted!",
                            text: "Data berhasil dihapus!.",
                            icon: "success",
                        });

                        reloadTable('#table');
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Data tidak jadi untuk dihapus :)",
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


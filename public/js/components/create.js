$("body").on("click", "#btn-create-blog", function () {
    $("#modal-create").modal("show");
});

$("#image").change(function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#img-show").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
});

$("#create").click(function (e) {
    e.preventDefault();

    var formData = new FormData();
    formData.append("title", $("#title").val());
    formData.append("category", $("#category").val());
    formData.append("body", $("#body").val());

    const image = $("#image").prop("files");
        if (image.length) {
            formData.append("image", image[0]);
        }

    $.ajax({
        url: `/dashboard/blogs`,
        type: "POST",
        cache: false,
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            Swal.fire({
                type: "success",
                icon: "success",
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000,
            });

            $("#title").val("");
            $("#body").val("");
            $("#image").val("");
            $("#img-show").attr("src", "");
            $("#trix").val("");

            $("#modal-create").modal("hide");

            Toastify({
                text: "Berhasil Menambahkan Data Baru!!!",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
            }).showToast();
        },
        error: function (error) {
            if (error.responseJSON.title) {
                $("#alert-title").removeClass("d-none");
                $("#alert-title").addClass("d-block");
                $("#alert-title").html(error.responseJSON.title);
            }
            if (error.responseJSON.body) {
                $("#alert-body").removeClass("d-none");
                $("#alert-body").addClass("d-block");
                $("#alert-body").html(error.responseJSON.body);
            }
            if (error.responseJSON.image) {
                $("#alert-image").removeClass("d-none");
                $("#alert-image").addClass("d-block");
                $("#alert-image").html(error.responseJSON.image);
            }
        },
    });
});

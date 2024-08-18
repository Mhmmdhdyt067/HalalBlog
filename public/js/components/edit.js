$('body').on('click', '#btn-edit-blog', function () {

    let blog_id = $(this).data('id')
    $.ajax({
        url: `/dashboard/blogs/${blog_id}`,
        type: "GET",
        cache: false,
        success: function (response) {

            Toastify({
                text: response.message,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #a52834, #800000)",
                }
            }).showToast();

            $('#blog_id').val(response.data.id);
            $('#title-edit').val(response.data.title);
            $('#trix-edit').val(response.data.body);
            $('#category-edit').val(response.data.category_id);
            $('#img-preview').attr('src', response.image);

            $('#modal-edit').modal('show');
        }
    });
});

$('#image-edit').change(function () {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#img-preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
});


$('#update').click(function (e) {
    e.preventDefault();

    let blog_id = $('#btn-edit-blog').data('id');

    var formUpdate = new FormData();
    formUpdate.append("title", $('#title-edit').val());
    formUpdate.append("category", $('#category-edit').val());
    formUpdate.append("body", $('#body-edit').val());

    const image = $('#image-edit').prop('files');
    if (image.length) {
        formUpdate.append("image", image[0]);
    }

    $.ajax({

        url: `/dashboard/blogs/${blog_id}`,
        type: "POST",
        data: formUpdate,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-HTTP-Method-Override": "PUT"
        },
        success: function (response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 3000
            });

            let blog = `
                <tr id="index_${response.dataupdate.id}">
                    <td>${response.dataupdate.title}</td>
                    <td>${response.dataupdate.excerpt}</td>
                                        <td class="text-center justify-content-center align-content-center">
                    <a href="javascript:void(0)" id="btn-show-blog" data-id="${response.dataupdate.id}"
                        class="btn btn-primary btn-sm m-2"><i class="fa-solid fa-circle-info"></i></a>
                    <a href="javascript:void(0)" id="btn-edit-blog" data-id="${response.dataupdate.id}"
                        class="btn btn-warning btn-sm m-2"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="javascript:void(0)" id="btn-delete-blog" data-id="${response.dataupdate.id}"
                        class="btn btn-danger btn-sm m-2"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                </tr>
            `;

            $(`#index_${response.dataupdate.id}`).replaceWith(blog);

            $('#modal-edit').modal('hide');
            Toastify({
                text: response.message,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #9DD9F3, #967bb6)",
                }
            }).showToast();


        },
        error: function (error) {
            if (error.responseJSON.title) {
                $('#alert-title-edit').removeClass('d-none');
                $('#alert-title-edit').addClass('d-block');
                $('#alert-title-edit').html(error.responseJSON.title);
            }
            if (error.responseJSON.body) {
                $('#alert-body-edit').removeClass('d-none');
                $('#alert-body-edit').addClass('d-block');
                $('#alert-body-edit').html(error.responseJSON.body);
            }
            if (error.responseJSON.image) {
                $('#alert-image-edit').removeClass('d-none');
                $('#alert-image-edit').addClass('d-block');
                $('#alert-image-edit').html(error.responseJSON.image);
            }
        }

    });

});

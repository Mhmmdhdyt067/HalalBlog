$('body').on('click', '#btn-show-blog', function() {

    let blog_id = $(this).data('id')
    $.ajax({
        url: `/dashboard/blogs/${blog_id}`,
        type: "GET",
        cache: false,
        success: function(response) {

            Toastify({
                text: response.message,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #a52834, #3dd5f3)",
                }
            }).showToast();
            $('#title-show').text(response.data.title);
            $('#body-show').html(response.data.body);
            $('#category-show').text(response.data.category['name']);
            $('#img-detail').attr('src', response.image);


            $('#modal-show').modal('show');
        }
    });
});

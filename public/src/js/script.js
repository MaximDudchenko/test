$(document).on('click', '.post-modal', function(e) {
    e.preventDefault();
    console.log($(this));
    $('.post-form #name').val('');
    $('.post-form #comment').val('');
})

$(document).on('click', '.add-post', function(e) {
    e.preventDefault();

    let formData = {}

    formData.name = $('.post-form #name').val();
    formData.post = $('.post-form #post').val();

    if (formData.name == "" || formData.post == "" ) {
        return false;
    }

    $.ajax({
        url: "ajax/posts/store",
        type: "POST",
        dataType: "json",
        data: formData,
        success: function(data) {
            $('.posts').prepend($(`
                    <div class="post-${data.id} border p-3 mt-3">
                        <div class="row d-flex justify-content-between post-title">
                            <div class="col">
                                <h5>${data.vizitore_name}</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-primary comment-modal" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#addComment">
                                    Add Comment
                                </button>
                            </div>
                        </div>
                        <div class="row post-body mt-3">
                            <p>${data.post}</p>
                        </div>
                        <div class="row d-flex justify-content-between post-footer mt-3">
                            <div class="col">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>   
                            </div>
                            <div class="col d-flex justify-content-end">
                                <p>${data.created_at}</p>
                            </div>
                        </div>
                    </div>`))
        }
    })

    $('.all-posts').text(parseInt($('.all-posts').text()) + 1);


    $('.close-post').click();
})

$(document).on('click', '.comment-modal', function(e) {
    e.preventDefault();

    $('.comment-form #post_id').val('');
    $('.comment-form #name').val('');
    $('.comment-form #comment').val('');

    let btn = $(this);
    $('.comment-form #post_id').val(btn.data('id'));
})


$(document).on('click', '.add-comment', function(e) {
    e.preventDefault();

    let formData = {};

    formData.post_id = $('.comment-form #post_id').val();
    formData.name = $('.comment-form #name').val();
    formData.comment = $('.comment-form #comment').val();

    if (formData.name == "" || formData.comment == "" ) {
        return false;
    }

    $.ajax({
        url: "ajax/comments/store",
        type: "POST",
        dataType: "json",
        data: formData,
        success: function (data) {
            $('.post-' + data.post_id).after($(`
                    <div class="row d-flex justify-content-end mt-2">
                        <div class="col-lg-10">
                            <div class="comment border p-3 mt-1">
                                <div class="row d-flex justify-content-start post-title">
                                    <h5>${data.vizitore_name}</h5>
                                </div>
                                <div class="row post-body mt-3">
                                    <p>${data.comment}</p>
                                </div>
                                <div class="col d-flex justify-content-end post-footer mt-3">
                                    <p>${data.created_at}</p>
                                </div>
                            </div>
                        </div>
                    </div>`))
        }
    })

    $('.close-comment').click();
})
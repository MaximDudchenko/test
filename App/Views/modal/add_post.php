<div class="modal fade" id="addPost" tabindex="-1" aria-labelledby="postAria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="post-form" action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="postAria">Post</h5>
                    <button type="button" class="btn-close close-post" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="post" class="form-label">Text:</label>
                    <textarea class="form-control" id="post" name="post" rows="5" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary add-post">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

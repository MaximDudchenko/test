<div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="commentAria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="comment-form" action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentAria">Comment</h5>
                    <button type="button" class="btn-close close-comment" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" class="form-control" id="post_id" name="post_id" hidden>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="comment" class="form-label">Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary add-comment">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

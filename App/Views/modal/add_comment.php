<div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="commentAria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentAria">Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" required>
                    <label for="text" class="form-label">Comment:</label>
                    <textarea class="form-control" id="text" rows="5" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

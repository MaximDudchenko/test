<section>
    <div class="container">
        <div class="row text-center mt-3">
            <h3>Posts</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPost">
                    Add Post
                </button>
            </div>
        </div>

        <div class="row d-flex justify-content-end mt-3">
            <div class="col-lg-6">
                <?php foreach ($posts as $post): ?>
                    <div class="post border p-3 mt-3">
                        <div class="row d-flex justify-content-between post-title">
                            <div class="col">
                                <h5><?= $post->vizitore_name ?></h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addComment">
                                    Add Comment
                                </button>
                            </div>
                        </div>
                        <div class="row post-body mt-3">
                            <p><?= $post->post ?></p>
                        </div>
                        <div class="row d-flex justify-content-between post-footer mt-3">
                            <div class="col">
                                <?php foreach ($rates as $rate): ?>
                                    <?php if ($post->id === $rate->post_id): ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($rate->rate >= $i): ?>
                                                <i class="fas fa-star"></i>
                                            <?php else: ?>
                                                <i class="far fa-star"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <p><?= $post->created_at ?></p>
                            </div>
                        </div>
                    </div>
                    <?php foreach($comments as $comment): ?>
                    <?php if ($post->id === $comment->post_id): ?>
                    <div class="row d-flex justify-content-end mt-2">
                        <div class="col-lg-10">
                            <div class="comment border p-3 mt-1">
                                <div class="row d-flex justify-content-start post-title">
                                    <h5><?= $comment->vizitore_name ?></h5>
                                </div>
                                <div class="row post-body mt-3">
                                    <p><?= $comment->comment ?></p>
                                </div>
                                <div class="col d-flex justify-content-end post-footer mt-3">
                                    <p><?= $comment->created_at ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
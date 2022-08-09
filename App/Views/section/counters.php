<section>
    <div class="container">
        <div class="row text-center mt-3">
            <div class="col-lg-12">
                <h3>Counter</h3>
            </div>

        </div>
        <div class="counters row d-flex justify-content-center text-center align-items-center">
            <div class="col-lg-4 posts_counter">
                <h5>Negative Posts</h5>
                <h4 class="negative-posts"><?= $negativePosts ?></h4>
            </div>
            <div class="col-lg-4 posts_counter">
                <h5>All Posts</h5>
                <h4 class="all-posts"><?= $allPosts ?></h4>
            </div>
            <div class="col-lg-4 posts_counter">
                <h5>Positive Posts</h5>
                <h4 class="positive-posts"><?= $positivePosts ?></h4>
            </div>
        </div>
    </div>
</section>

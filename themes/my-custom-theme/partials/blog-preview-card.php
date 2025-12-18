<style>
.blog-image-container {
    position: relative;
    width: 100%;
    padding-top: 60%;
    overflow: hidden;
}

.blog-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-badge-container {
    position: absolute;
    top: 6px;
    right: 6px;
    z-index: 1000;
}
</style>

<div class="col-12 col-md-6 col-lg-3 mb-4 position-relative">
    <div class="h-100 d-flex flex-column">
        <div class="d-flex flex-column flex-grow-1">
            <?php if (has_post_thumbnail()): ?>
            <div class="position-relative">
                <div class="category-badge-container">
                    <span class="badge custom-badge">
                        <?php echo esc_html($args['category'] ?? ''); ?>
                    </span>
                </div>
                <div class="blog-image-container">
                    <img src="<?php echo esc_url($args['thumbnail']); ?>" class="fluid custom-rounded blog-image"
                        alt="<?php echo esc_attr($args['title']); ?>" />
                </div>
            </div>
            <?php endif; ?>

            <div class="h-100 d-flex flex-column">
                <div class="d-flex flex-column">
                    <h5 class="fw-semibold text-decoration-underline mt-3">
                        <a href="<?php echo esc_url($args['link']); ?>" class="text-dark text-decoration-underline">
                            <?php echo esc_html($args['title']); ?>
                        </a>
                    </h5>
                </div>
                <div class="d-flex h-100 flex-column justify-content-between mt-2">
                    <p class="card-text"><?php echo esc_html($args['excerpt']); ?></p>
                    <?php get_template_part('partials/learn-more-link', null, [
                        'link' =>
          $args['link'], 'label' => 'Read more' ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
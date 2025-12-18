<style>
.blog-image-container {
    position: relative;
    width: 100%;
    padding-top: 60%;
    overflow: hidden;
}

.blog-image {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

.content h3 {
    margin-top: 2rem;
}

.content h4 {
    font-weight: 600;
    margin-top: 2rem;
}

.content h5 {
    margin-top: 2rem;
}

.content p {
    color: var(--color-grey-text);
    margin-top: 1rem;
}

#respond {
    margin-top: 2rem;
}


.comment-reply-title {
    font-weight: 600;
    font-size: 1.5rem;
    padding-bottom: 0.3rem;
}

.comment-form-comment label {
    display: none;
}

.comment-form-comment textarea {
    border-color: #c7c7c7;
    border-radius: 2px;
    margin-top: 0.5rem;
}

.form-submit input {
    font-weight: 600;
    display: flex;
    justify-content: center;
    align-items: center;
    white-space: nowrap;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    border-radius: var(--rounded-border);
    background-color: var(--color-primary);
    color: white;
    border: none;
    padding: 0.5rem 1.5rem;
    font-size: 0.9rem;
}

.form-submit input:hover {
    filter: brightness(1.1);
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
}

.logged-in-as {
    color: var(--color-grey-text) !important;
}

.blog-category {
    background-color: #d9dde2;
}


/* .edge-browser .blog-post-wrapper {
    padding-top: 28px;
} */
@media (max-width: 999px) {
    #comment {
        width: 100%;
    }
}
</style>

<?php get_template_part('partials/header'); ?>



<section class="pb-5">
    <div class="container blog-post-wrapper white-page-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pb-2 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo home_url('/blog'); ?>">Blog</a></li>
                    <li class="breadcrumb-item active small-text" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            <h1 class="fw-semibold mt-4"><?php the_title(); ?></h1>
            <p class="fw-semibold mt-4 mb-1">
                J F Automation on <?php the_time('F j, Y'); ?>
            </p>
            <small class="text-muted"><?php the_time('F j, Y'); ?></small>
       

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="mt-4 content">
            <?php the_content(); ?>
        </div>

        <div class="col-12 col-lg-4 mt-5">
            <?php get_template_part('partials/call-us-btn'); ?>
        </div>

        <?php
        // --- Related posts ---
        $orig_post = $post;
        global $post;

        $categories = get_the_category();
        if ($categories) {
            $category_ids = wp_list_pluck($categories, 'term_id');

            $related_query = new WP_Query([
                'category__in'        => $category_ids,
                'post__not_in'        => [$post->ID],
                'posts_per_page'      => 4,
                'ignore_sticky_posts' => 1
            ]);

            if ($related_query->have_posts()) : ?>
        <div class="related-posts mt-5 pt-4">
            <h4 class="fw-semibold">Related Posts</h4>
            <div class="row mt-4">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-column">
                    <a class="d-flex flex-column related-post-preview text-dark text-decoration-none"
                        href="<?php the_permalink(); ?>">
                        <div class="blog-image-container">
                            <img class="blog-image fluid custom-rounded"
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="">
                        </div>
                        <span class="mt-2 fs-5 fw-semibold"><?php the_title(); ?></span>
                        <small class="text-small text-muted"><?php the_time('F j, Y'); ?></small>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif;
            wp_reset_postdata();
        }
        $post = $orig_post;
        ?>


        <div class="mt-4 pt-3">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<span class="badge text-dark fw-semibold light-grey-container blog-category">';
                    echo esc_html($category->name);
                    echo '</span> ';
                }
            }
            ?>
        </div>

        <?php endwhile; endif; ?>
    </div>
</section>


<?php get_template_part('partials/footer'); ?>
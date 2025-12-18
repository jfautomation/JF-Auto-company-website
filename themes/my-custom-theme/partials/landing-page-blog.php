<style>
.category-badge-container {
    position: absolute;
    top: 6px;
    right: 6px;
}
</style>



<section class="blog-section pb-5">

    <div class="container">
        <?php
        $args = array(
            'header_text' => get_field('blog_subheader'),
             'cta_link' => get_field('blog_cta_link'),
             'cta_link_text' => get_field('blog_cta_text'),
        );
        get_template_part('partials/section-header', null, $args);
        ?>


        <div class="row mt-1 g-4">
            <?php
    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 4,
    ]);

    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            get_template_part('partials/blog-preview-card', null, [
                'title'     => get_the_title(),
                'link'      => get_permalink(),
                'excerpt'   => wp_trim_words(get_the_excerpt(), 20),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                'category'  => get_the_category()[0]->name ?? '',
            ]);
        endwhile;
        wp_reset_postdata();
    else: ?>
            <p>No blog posts found.</p>
            <?php endif; ?>
        </div>


</section>
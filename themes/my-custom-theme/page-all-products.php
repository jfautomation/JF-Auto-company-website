


<!-- <?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('all_products_hero_image'),
    'span_text'     => get_field('all_products_hero_span'),
    'title_text'    => get_field('all_products_hero_hero_title'),
    
));
?> -->


    <div class="container all-products-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active small-text all-products-active-link" aria-current="page">
                    <?php the_title(); ?></li>
            </ol>
        </nav>
    </div>
    <div class="container mt-sm-5 pb-4 mt-lg-4">
        <?php
get_template_part('partials/section-header-simplified', null, array(
    'h5_text' => get_field('all_products_header'), 
    // 'see_all_link' => get_field('shop_all_categories_url'), 
    // 'see_all_text' => get_field('shop_all_categories_url_text') 
)); 
        ?>
        <?php
get_template_part('partials/products-grid'); 
?>
    </div>

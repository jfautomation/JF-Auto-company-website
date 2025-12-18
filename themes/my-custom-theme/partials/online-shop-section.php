<?php
$globals_id = 578;
?>

<section class="shop-section pb-5">
    <div class="container">
        <?php
    $args = array(
        'header_text' => get_field('online_shop_header', $globals_id),
        'cta_link' => get_field('online_shop_cta_url', $globals_id),
        'cta_link_text' => get_field('online_shop_cta_text', $globals_id),
    );



    get_template_part('partials/section-header', null, $args);
    ?>
        <div class="mt-2">
            <?php get_template_part('partials/product-carousel')?>
        </div>

    </div>
</section>
<?php
/**
 * Template Name: Industrial Part Sales Page
 */
?>

<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('industrial_part_sales_page_hero_image'),
    'span_text'     => get_field('industrial_part_sales_page_hero_span'),
    'title_text'    => get_field('industrial_part_sales_page_hero_title'),   
));
?>
<?php
get_template_part('partials/industrial-part-sales-intro-section'); 
?>

<?php
get_template_part('partials/industrial-part-sales-shop-categories-section'); 
?>
<section>
    <div class="container mt-sm-5 pb-4 mt-lg-4">
        <?php
get_template_part('partials/section-header-simplified', null, array(
    'h5_text' => get_field('featured_products_header'), 
    'see_all_link' => get_field('shop_all_categories_url'), 
    'see_all_text' => get_field('shop_all_categories_url_text') )); 
        ?>
        <?php
get_template_part('partials/products-grid'); 
?>
    </div>
</section>





<div class="mt-2">

    <section class="light-grey-container">
        <?php 
get_template_part('partials/services');
?>
    </section>


    <section>
        <?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('industrial_part_sales_outro_cta_image'), 
    'header' => get_field('industrial_part_sales_outro_cta_header'),
    'text' => get_field('industrial_part_sales_outro_cta_text'),
    'btn_1_text' => get_field('industrial_part_sales_outro_cta_btn_1_text'),
    'btn_1_link' => get_field('industrial_part_sales_outro_cta_btn_1_link'),
    'btn_2_text' => get_field('industrial_part_sales_outro_cta_btn_2_text'),
    'btn_2_link' => get_field('industrial_part_sales_outro_cta_btn_2_link'),
    'graphic-alt-text' => get_field('industrial_part_sales_cta_image_alt_text'),
]);
?>
    </section>

    <section class="light-grey-container">
        <?php
    get_template_part('partials/explore-more', null, [
        'fields' => [
            'allen_bradley_cnc_servo_amplifier_parts',
            'indramat_list',
            'mitsubishi_cnc_servo_amplifier_parts__toronto_&_north_america',
            'siemens_cnc_servo_motor_parts',
            'yaskawa_cnc_servo_amplifier_parts',
        ],
        'globals_id' => 578 // optional, if these fields live on a global options page
    ]);
    ?>
    </section>

</div>
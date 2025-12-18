

<?php
$about_hero_bg_image = get_field('about_page_hero_image');
?>


<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('about_page_hero_image'),
    'span_text'     => get_field('about_page_hero_span'),
    'title_text'    => get_field('about_page_hero_title'),
    
));
?>


<?php
   
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content(); 
        endwhile;
    endif;
    ?>
<?php
get_template_part('partials/about-page-intro')
?>

<?php

$gallery_items = [];

for ($i = 1; $i <= 3; $i++) {
    $image = get_field("about_page_gallery_image_{$i}");
    $text  = get_field("about_page_gallery_image_{$i}_span");
    $alt_text  = get_field("about_page_gallery_image_{$i}_alt_text");

    if ($image) {
        $gallery_items[] = [
            'image' => is_array($image) ? $image['url'] : $image,
            'text'  => $text,
            'alt-text' => $alt_text,
        ];
    }
}


// Generate a unique ID for this carousel instance
$carousel_id = 'carousel-' . uniqid();

include get_template_directory() . '/partials/large-carousel.php';
?>

<?php get_template_part('partials/about-page-services-section');?>
<?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('about_page_outro_graphic'),
    'graphic-alt-text' => get_field('about_page_outro_cta_image_alt_text'), 
    'header' => get_field('about_page_outro_cta_header'),
    'text' => get_field('about_page_outro_cta_text'),
    'btn_1_text' => get_field('about_page_outro_cta_button_1_text'),
    'btn_1_link' => get_field('about_page_outro_cta_button_1_link'),
    'btn_2_text' => get_field('about_page_outro_cta_button_2_text'),
    'btn_2_link' => get_field('about_page_outro_cta_button_2_link'),
]);
?>


<section class="">
    <?php
    get_template_part('partials/explore-more', null, [
        'fields' => [
            'allen_bradley_cnc_servo_amplifier_parts',
            'indramat_motor_drive_&_servo_motor_repair',
            'mitsubishi_servo_motor_repair_services', 
            'yaskawa_servo_motor_repair', 
            'heidenhain_drive_motor_repair',
            'siemens_cnc_plc_repair_&_retrofit_services',  
            'electrical_panel_design_building', 
            'cnc_retrofit_siemens',
        ],
        'globals_id' => 578 
    ]);
    ?>
</section>
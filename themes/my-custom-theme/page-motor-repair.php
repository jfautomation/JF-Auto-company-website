




<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('motor_repair_page_hero_image'),
    'span_text'     => get_field('motor_repair_page_hero_span'),
    'title_text'    => get_field('motor_repair_page_hero_title'),
    
));
?>

<section class="light-grey-container">
<?php 
    get_template_part('partials/motor-repair-services')
?>
<?php 
get_template_part('partials/services');
?>
</section>
<?php get_template_part('partials/online-shop-section')?>




<!-- <?php get_template_part('partials/online-shop-section')?> -->
<section>
    <?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('motor_repair_page_outro_cta_image'), 
    'header' => get_field('motor_repair_page_cta_outro_header'), 
    'text' => get_field('motor_repair_page_cta_outro_paragraph'), 
    'btn_1_link' => get_field('motor_repair_page_intro_button_1_text'), 
    'btn_1_text' => get_field('motor_repair_page_intro_button_1_link'), 
    'span' => get_field('motor_repair_page_cta_outro_span'),
    'graphic-alt-text' => get_field('motor_repair_page_outro_cta_image_alt_text'),
    ]); ?>,
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
        'globals_id' => 578 
    ]);
    ?>
</section>
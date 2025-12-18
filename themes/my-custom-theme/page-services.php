<?php
/**
 * Template Name: Services Page
 */
?>

<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      =>
get_field('services_page_hero_image'), 'span_text' =>
get_field('services_page_hero_span'), 'title_text' =>
get_field('services_page_hero_title'), )); ?>

<section>
    <div class="container">
        <?php
get_template_part('partials/header-and-text', null, array(

    'h2_text' =>
    get_field('services_page_services_paragraph'), 'p' =>
    get_field('services_page_services_paragraph_2'), 'subheader'=>
    get_field('services_page_services_header'), 'icon' =>
    get_field('services_page_services_header_icon') )); ?>
    </div>
</section>
<section class="light-grey-container">
    <?php 
  
  get_template_part('partials/services')?>
</section>

<?php get_template_part('partials/online-shop-section')?>


<section>
    <?php
get_template_part('partials/cta', null, [
    'graphic' =>
  get_field('services_page_cta_graphic'), 'header' =>
  get_field('services_page_cta_header'), 'text' =>
  get_field('services_page_cta_text'), 'span' =>
  get_field('services_page_cta_span'), 'graphic-alt-text' =>
  get_field('services_page_cta_graphic_alt_text'), ]); ?>,
</section>

<section class="light-grey-container">
    <?php
    get_template_part(
        'partials/explore-more',
        null,
        [
            'fields' => [
                'industrial_automation_repair',
                'industrial_automation_repair__acdc_servo_motor_plc_&_cnc_repair_toronto',
                'on_site',
                'products',
                'electronic_repair',
            ],
            'globals_id' => 578, 
        ]
    );
    ?>
</section>
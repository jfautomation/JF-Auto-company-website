<?php
/**
 * Template Name: Engineering Service Page
 */
?>

<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('engineering_and_service_page_hero_image'),
    'span_text'     => get_field('engineering_and_service_page_hero_span'),
    'title_text'    => get_field('engineering_and_service_page_hero_title'),
    
));
?>

<section class="light-grey-container">
<?php
        get_template_part('partials/engineering-and-service-page-services') ?>
</section>
<?php get_template_part('partials/online-shop-section')?>

<section class="light-grey-container">
    <?php 
get_template_part('partials/services');
?>
</section>

<section>
    <?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('engineering_and_service_page_cta_graphic'), 
    'header' => get_field('engineering_and_service_page_cta_header'), 
    'text' => get_field('engineering_and_service_page_cta_paragraph'),  
    'span' => get_field('engineering_and_service_page_cta_span'),
    'graphic-alt-text' => get_field('engineering_and_service_page_cta_graphic_alt_text'),
    ]); ?>
</section>


<section class="light-grey-container">
    <?php
    get_template_part('partials/explore-more', null, [
        'fields' => [
            'cnc_machine_tool_retrofitting_&_upgrades',
            'cnc_retrofit_siemens',
            'electrical_panel_design_building',
            'siemens_cnc_plc_service',
            'siemens_cnc_plc_repair_&_retrofit_services',
        ],
        'globals_id' => 578 
    ]);
    ?>
</section>
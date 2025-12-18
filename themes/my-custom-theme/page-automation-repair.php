<?php
/**
 * Template Name: Automation Repair Page
 */
?>


<?php
get_template_part('partials/page-layout-hero', null, array(
    'bg_image'      => get_field('automation_repair_page_hero_image'),
    'span_text'     => get_field('automation_repair_page_hero_span'),
    'title_text'    => get_field('automation_repair_page_hero_title'),
    
));
?>


<section class="light-grey-container">
<?php
get_template_part('partials/automation-repair-page-services')
?>
</section>

<?php get_template_part('partials/online-shop-section')?>

<section class="light-grey-container">
    <?php 
get_template_part('partials/services');
?>
</section>

<section>
    <div class="mt-3">
        <?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('automation_repair_page_cta_graphic'), 
    'header' => get_field('automation_repair_page_cta_header'), 
    'text' => get_field('automation_repair_page_cta_paragraph'), 
    'graphic-alt-text' => get_field('automation_repair_page_cta_graphic_alt_text'),
    'span' => get_field('automation_repair_page_cta_span'), ]); ?>
    </div>
</section>



<section class="light-grey-container">
    <?php
    get_template_part('partials/explore-more', null, [
        'fields' => [
            'allen_bradley_drive_repair',
            'electric_motor_drive_repair',
            'electronic_repair_toronto__acdc_servo_motors',
            'electronic-repair-ac-dc-servo-motor-repair',
            'fanuc_cnc_servo_amplifier_repair',
            'indramat_motor_drive_&_servo_motor_repair',
            'mitsubishi_cnc_drive_repair',
            'siemens_cnc_servo_motor_parts',
            'yaskawa_cnc_drive_repair_&_motor_repair'

        ],
        'globals_id' => 578 
    ]);
    ?>
</section>
<?php
/**
 * Template Name: Landing Page
 */
?>

<style>
    .holiday-message span {
        color: #dc3545;
    }
</style>

<div class="landing-page-content">
    <?php get_template_part('partials/landing-page-hero')?>
    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col pb-4">
                    <h3 class="fw-semibold holiday-message pt-3 pb-2">
                        <?php
$holiday_banner = get_field('holiday_banner');
echo wpautop($holiday_banner);
?>
                    </h3>
                    <h5 class="fw-semibold">-JF Automation team</h5>
                </div>
            </div>
        </div>
</div>
</section> -->

<section class="light-grey-container">




    <div class="container">
        <?php
get_template_part('partials/header-and-text', null, array(

    'h2_text' => get_field('landing_page_intro_paragraph'), 
    'p' => get_field('landing_page_intro_paragraph_2'), 
    'subheader'=> get_field('landing_page_intro_header'), 
    'icon' => get_field('landing_page_intro_icon') )); ?>
        <?php
        $args = array(
            'header_text' => get_field('landing_page_services_section_header'),
            'cta_link' => get_field('landing_page_services_section_cta_url'),
            'cta_link_text' => get_field('landing_page_services_section_cta_text'),
        );

        get_template_part('partials/section-header', null, $args);
        ?>
        <?php

$services_page_id = 12;           
$cards = [];

for ($i = 1; $i <= 4; $i++) {
    $cards[] = [
        'header'      =>
get_field("services_page_service_{$i}_header", $services_page_id), 'text' =>
get_field("services_page_service_{$i}_text", $services_page_id), 'link' =>
get_field("services_page_service_{$i}_link", $services_page_id), 'button_text' =>
get_field("services_page_service_{$i}_button_text", $services_page_id), 'image' =>
get_field("services_page_service_{$i}_image", $services_page_id), 'alt_text' =>
get_field("services_page_service_{$i}_image_alt_text", $services_page_id), ]; } 
?>

        <?php
get_template_part('partials/image-card', null, ['cards' =>
    $cards]); ?>
    </div>
</section>

<?php get_template_part('partials/online-shop-section')?>
<?php get_template_part('partials/landing-page-reviews')?>
<?php get_template_part('partials/landing-page-blog')?>
<?php get_template_part('partials/landing-page-brands')?>
<?php get_template_part('partials/landing-page-map')?>

<div class="mt-3">
    <?php
get_template_part('partials/cta', null, [
    'graphic' => get_field('landing_page_outro_graphic'),
    'header'          => get_field('landing_page_outro_cta_header'),
    'text' => get_field('landing_page_outro_cta_text'), 
    'btn_1_link'    => get_field('landing_page_outro_cta_button_1_link'),
    'btn_1_text'    => get_field('landing_page_outro_cta_button_1_text'),
    'btn_2_link'    => get_field('landing_page_outro_cta_button_2_link'),
    'btn_2_text'    => get_field('landing_page_outro_cta_button_2_text'),
]);
?>
    <section class="light-grey-container">
        <?php
    get_template_part('partials/explore-more', null, [
        'fields' => [
            'industrial_automation_repair__acdc_servo_motor_plc_&_cnc_repair_toronto',
            'electronic_repair_toronto__acdc_servo_motors',
            'allen_bradley_motor_repair',
            'fanuc_cnc_servo_amplifier_repair',
            'siemens_cnc_servo_motor_&_drive_repair', 
            'on_site', 
            'products', 
            'cnc_machine_tool_retrofitting_&_upgrades'
        ],
        'globals_id' => 578
    ]);
    ?>
    </section>


</div>
</div>
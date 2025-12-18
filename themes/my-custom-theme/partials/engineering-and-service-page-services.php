<section class="">
    <div class="container">
        <?php
        get_template_part('partials/header-and-text', null, array(
    'h2_text' => get_field('engineering_and_service_page_services_paragraph'), 
    'p' => get_field('engineering_and_service_page_services_paragraph_2'), 
    'subheader'=> get_field('engineering_and_service_page_services_services_header'), 
    'icon' => get_field('engineering_and_service_page_services_services_icon') )); ?>
        <?php
require_once get_template_directory() . '/partials/generate-accordion-data.php';

// Generate data
$accordion_items = generate_accordion_items('engineering_and_service_page_service');

$accordion_id = 'accordion-' . uniqid();
$items = $accordion_items;

include get_template_directory() . '/partials/accordion.php';
?>
    </div>
</section>
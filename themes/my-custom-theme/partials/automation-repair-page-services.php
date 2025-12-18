<section class="">
    <div class="container">
        <div class="mb-2">

            <?php
        get_template_part('partials/header-and-text', null, array(
    'h2_text' => get_field('automation_repair_page_services_paragraph'), 
    'p' => get_field('automation_repair_page_services_paragraph_2'), 
    'subheader'=> get_field('automation_repair_page_services_header'), 
    'icon' => get_field('automation_repair_page_services_icon') )); ?>
        </div>


        <?php
require_once get_template_directory() . '/partials/generate-accordion-data.php';

// Generate data
$accordion_items = generate_accordion_items('automation_repair_page_service');

$accordion_id = 'accordion-' . uniqid();
$items = $accordion_items;

include get_template_directory() . '/partials/accordion.php';
?>
    </div>

</section>
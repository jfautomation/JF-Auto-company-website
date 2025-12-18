<?php
$globals_id = 578;

$services = [
    [
        'header'    => get_field('service_header_1', $globals_id), 
        'link'      => get_field('service_1_link', $globals_id), 
        'paragraph' => get_field('service_paragraph_1', $globals_id), 
        'span'      => get_field('service_1_span', $globals_id),
        'icon'      => get_field('service_1_icon', $globals_id),
    ],
    [
        'header'    => get_field('service_header_2', $globals_id), 
        'link'      => get_field('service_2_link', $globals_id), 
        'paragraph' => get_field('service_paragraph_2', $globals_id),
        'span'      => get_field('service_2_span', $globals_id),
        'icon'      => get_field('service_2_icon', $globals_id),
    ],
    [
        'header'    => get_field('service_header_3', $globals_id), 
        'link'      => get_field('service_3_link', $globals_id), 
        'paragraph' => get_field('service_paragraph_3', $globals_id),
        'span'      => get_field('service_3_span', $globals_id), 
        'icon'      => get_field('service_3_icon', $globals_id),
    ],
    [
        'header'    => get_field('service_header_4', $globals_id), 
        'link'      => get_field('service_4_link', $globals_id), 
        'paragraph' => get_field('service_paragraph_4', $globals_id),
        'span'      => get_field('service_4_span', $globals_id),
        'icon'      => get_field('service_4_icon', $globals_id),
    ],
];
?>
<div class="section">
    <div class="container pb-5">
        <h2 class="fw-semibold">Our services</h2>
        <div class="row gy-4 mt-3">
            <?php foreach ($services as $service) : ?>
            <?php get_template_part('/partials/service-card', null, [
                'service_heading' => $service['header'],
                'paragraph'       => $service['paragraph'],
                'link'            => $service['link'],
                'span'            => $service['span'],
                'icon'            => $service['icon'],
            ]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<style>
.service-img {
    max-height: 20rem;
    object-fit: cover;
}

@media (max-width: 991px) {
    .about-page-btn-wrapper {
        width: 100%;
    }
}
</style>

<?php

$cards = [];

for ($i = 1; $i <= 4; $i++) {
    $cards[] = [
        'header'      =>
get_field("about_page_service_{$i}_header"), 'text' =>
get_field("about_page_service_{$i}_text"), 'link' =>
get_field("about_page_service_{$i}_link"), 'button_text' =>
get_field("about_page_service_{$i}_button_text"), 'image' =>
get_field("about_page_service_{$i}_image"), 'alt_text' =>
get_field("about_page_service_{$i}_image_alt_text"), ]; } ?>

<section class="xtra-light-grey-container">
    <div class="container">
        <?php
get_template_part('partials/header-and-text', null, array(
    'h2_text'   =>
    get_field('about_page_services_paragraph'), 'p' =>
    get_field('about_page_services_paragraph_2'), 'subheader'=>
    get_field('about_page_services_header'), 'icon' =>
    get_field('about_page_services_header_icon') )); ?>

        <?php
get_template_part('partials/image-card', null, ['cards' =>
    $cards]); ?>
    </div>
</section>
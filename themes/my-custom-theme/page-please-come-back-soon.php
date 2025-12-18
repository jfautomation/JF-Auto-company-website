<?php
/**
 * Template Name: Please come back soon page
 */
?>

<style>
@media (max-width: 767px) {
    .come-back-soon-graphic {
        width: 100%;
    }

    .come-back-nav-links {
        font-size: 1rem;
    }
}

@media (min-width: 768px) {
    .come-back-soon-header {
        width: 75%;
    }
}

@media (max-width: 347px) {
    /* hide the third link */
    .links-container .col:nth-child(3) {
        display: none !important;
    }
}



</style>

<div class=" container pb-5 d-flex flex-column justify-content-center align-items-center">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img class="come-back-soon-graphic fluid"
            src="<?php echo esc_url(get_field('please_come_back_soon_page_image')); ?>" alt="" />
        <h2 class="come-back-soon-header text-center">
            <?php echo esc_html( get_field('please_come_back_soon_page_header') ); ?>
        </h2>
        <div class="mt-4 pt-2">
            <?php echo do_shortcode('[button variant="primary" link="' . esc_url(get_field('please_come_back_soon_page_button_link')) . '" icon="bi-arrow-right"]' . esc_html(get_field('please_come_back_soon_page_button_text')) . '[/button]'); ?>
        </div>
        <div class="row links-container w-100 mt-5 pt-2">
            <?php 
    for ($i = 1; $i <= 3; $i++) : 
        $link_text = get_field("please_come_back_soon_page_nav_text_$i");
        $link_url  = get_field("please_come_back_soon_page_nav_url_$i");

        if ($link_text && $link_url) : ?>
            <div class="col text-center">
                <h5>
                    <a class="text-dark come-back-nav-links fw-semibold" href="<?php echo esc_html($link_url); ?>">
                        <?php echo esc_html($link_text); ?>
                    </a>
                </h5>
            </div>
            <?php endif; 
    endfor; ?>
        </div>
    </div>
</div>

<?php

$args = wp_parse_args($args);

$cta_graphic_url = !empty($args['graphic']) ? esc_url($args['graphic']) : '';
$cta_graphic_alt_text = !empty($args['graphic-alt-text']) ? esc_attr($args['graphic-alt-text']) : 'CTA icon';
$cta_header      = !empty($args['header']) ? esc_html($args['header']) : '';
$cta_text = !empty($args['text']) ? wp_kses_post($args['text']) : '';
$span            = !empty($args['span']) ? esc_html($args['span']) : '';
?>

<style>
.mobile-cta {
    display: none;
}

.mobile-icon-container {
    width: 5.5rem;
    height: 5.5rem;
    padding: 1rem;
    border-radius: 50%;
    border: 1px solid #e3dfdf;
}

@media (max-width: 991px) {
    .desktop-cta {
        display: none;
    }

    .cta-paragraph {
        width: 100% !important;
    }
     .icon-wrapper {
        /* width: 4rem;
        height: 4rem;
        padding: 0.5rem; */
        display: none !important;
    }
}



</style>

<div class="pb-5 pt-4 mt-2 container">
    <div class="row">
        <div class="d-flex flex-column">
            <h2 class="fw-semibold cta-header">
                <?php echo $cta_header; ?>
            </h2> 
            <p class="text-grey mt-3 cta-paragraph w-75"><?php echo wpautop($cta_text, false); ?></p>
            <?php if ($span): ?>
            <h5 class="mt-2 fw-semibold"><?php echo $span; ?></h5>
            <?php endif; ?>
            <div class="row align-items-center mt-4">
                <div class="col-3 col-lg-1 icon-wrapper">
                    <div
                        class="mobile-icon-container light-grey-container d-flex justify-content-center align-items-center">
                        <?php if (!empty($args['graphic'])): ?>
                        <img src="<?php echo $cta_graphic_url; ?>" alt="<?php echo $cta_graphic_alt_text; ?>"
                            class="rounded img-fluid cta-image" />

                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-4 ms-lg-4 cta-btn-container">
                    <?php get_template_part('partials/call-us-btn'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
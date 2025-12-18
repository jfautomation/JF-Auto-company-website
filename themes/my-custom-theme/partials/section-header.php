<?php
$args = wp_parse_args($args);
?>

<div class="section-header d-flex flex-column align-items-start mt-3 pb-2">
    <div class="d-flex w-100 justify-content-between align-items-center">
        <?php if (!empty($args['header_text'])) : ?>
        <h1 class="fw-semibold h1-main-header"><?php echo esc_html($args['header_text']); ?></h1>
        <?php endif; ?>

        <?php if (!empty($args['cta_link'])) : ?>
        <a href="/<?php echo esc_attr($args['cta_link']); ?>"
            class="header-cta-link text-primary mb-2 text-decoration-underline">
            <small class="mb-2 fw-semibold text-decoration-underline">
                <?php echo !empty($args['cta_link_text']) ? esc_html($args['cta_link_text']) : 'See all'; ?>
            </small>
        </a>

        <?php endif; ?>
    </div>

    <?php if (!empty($args['text'])) : ?>
    <p class="mt-2"><?php echo esc_html($args['text']); ?></p>
    <?php endif; ?>



</div>
<?php
$args = wp_parse_args($args);
?>

<div class="d-flex justify-content-between align-items-center w-100">
    <?php if (!empty($args['h5_text'])) : ?>
    <h4 class="fw-semibold mb-0"><?php echo esc_html($args['h5_text']); ?></h4>
    <?php endif; ?>

    <?php if (!empty($args['see_all_link'])) : ?>
    <a href="/<?php echo esc_html($args['see_all_link']); ?>"
        class="text-primary fw-semibold text-decoration-underline small">
        <?php echo !empty($args['see_all_text']) ? esc_html($args['see_all_text']) : 'See all'; ?>
    </a>
    <?php endif; ?>
</div>
<?php if (!empty($args['link'])): ?>
    <a href="<?php echo esc_url($args['link']); ?>"
       class="text-blue fw-semibold text-decoration-underline d-flex align-items-center gap-1 small">
        <?php echo !empty($args['label']) ? esc_html($args['label']) : 'Learn more'; ?>
        <i class="bi bi-arrow-right"></i>
    </a>
<?php endif; ?>

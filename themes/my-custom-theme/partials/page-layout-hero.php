<style>
.dark-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.page-layout-hero {
    height: 580px;
    position: relative;
    z-index: 1;
}

.img-overlay-text {
    position: relative;
    z-index: 2;
}

.hero-title {
    font-size: 3.5rem !important;
}

.stats-card-text {
    font-size: 0.95rem !important;
}

.hero-title {
    width: 50%;
}


@media (max-width: 1199px) {
    .hero-title {
        width: 75% !important;
    }

    .page-layout-hero {
        height: 460px;
    }
}

@media (max-width: 768px) {
    .hero-title {
        width: 100% !important;
    }
}

@media (max-width: 492px) {
    .hero-title {
        font-size: 3rem !important;
    }

    .page-layout-hero {
        height: 350px;
    }
}

@media (max-width: 425px) {
    .hero-title {
        font-size: 2.5rem !important;
    }
}

@media (max-width: 358px) {
    .hero-title {
        font-size: 2.3rem !important;
    }
}
</style>

<?php
$defaults = [
    'bg_image' => '',
    'span_text' => '',
    'title_text' => '',
    'extra_classes' => '',
];
$args = wp_parse_args($args ?? [], $defaults);

if (empty($args['bg_image'])) {
    return;
}
?>

<div class="d-flex align-items-end page-layout-hero <?php echo esc_attr($args['extra_classes']); ?>"
    style="background-image: url('<?php echo esc_url($args['bg_image']); ?>'); background-size: cover; background-position: center; position: relative;">
    <div class="dark-overlay"></div>

    <div class="text-light img-overlay-text w-100">
        <div class="container pb-3">
            <?php if (!empty($args['span_text'])): ?>
            <span class="hero-span"><?php echo esc_html($args['span_text']); ?></span>
            <?php endif; ?>

            <?php if (!empty($args['title_text'])): ?>
            <h1 class="hero-title mt-2"><?php echo esc_html($args['title_text']); ?></h1>
            <?php endif; ?>
        </div>
    </div>
</div>
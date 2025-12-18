<style>
.about-page-carousel-inner img {
    height: auto;
    max-height: 37rem;
    width: 100%;
    object-fit: cover;
}

.about-page-carousel-text-span {
    position: absolute;
    bottom: 10px;
    left: 10px;
    text-align: left;
}

@media (max-width: 500px) {
    .about-page-carousel-text-span {
        right: 11px;
    }

    .custom-badge {
        font-size: 0.9rem !important;
    }
}


.custom-badge {
    white-space: normal !important;
    text-align: left;
}
</style>

<?php
if (empty($gallery_items) || empty($carousel_id)) {
    return;
}
?>

<section>
    <div class="container pb-4">
        <div class="col position-relative">
            <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
                <div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide w-100">
                    <div class="about-page-carousel-inner carousel-inner">
                        <?php foreach ($gallery_items as $index => $gallery_item) : ?>
                        <?php if (!empty($gallery_item['image'])) : ?>
                        <div class="h-100 w-100 carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <img class="custom-rounded d-block w-100"
                                src="<?php echo esc_url($gallery_item['image']); ?>"
                                alt="<?php echo esc_attr(!empty($gallery_item['alt-text']) ? $gallery_item['alt-text'] : 'Slide ' . ($index + 1)); ?>" />


                            <?php if (!empty($gallery_item['text'])) : ?>
                            <div class="about-page-carousel-text-span">
                                <span class="custom-badge badge fs-6">
                                    <?php echo esc_html($gallery_item['text']); ?>
                                </span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <?php render_custom_carousel_indicators($carousel_id, $gallery_items); ?>
        </div>
    </div>
</section>
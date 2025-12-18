<style>
.image-card-image {
    object-fit: cover;
}

.image-card {
    min-height: 325px;
    max-height: 325px;
}

@media (max-width: 991px) {
    .image-card-btn-wrapper {
        width: 100%;
    }
}

@media (max-width: 1199px) {
    .image-card {
        min-height: unset;
        max-height: unset;
    }
}
</style>

<?php

$cards = $args['cards'] ?? [];

if (empty($cards) || !is_array($cards)) {
    return;
}

foreach ($cards as $index => $card) : 
    // Alternate layout
    $textOrder  = ($index % 2 === 0) ? 'order-2 order-md-2' : 'order-2 order-md-1';
    $imageOrder = ($index % 2 === 0) ? 'order-1 order-md-1' : 'order-1 order-md-2';
    $image      = $card['image'] ?? '';
    $image_url  = is_array($image) ? $image['url'] : $image;
    $alt_text   = !empty($card['alt_text']) ? $card['alt_text'] : 'Card Image';
?>
<div class="row align-items-stretch mb-5 mt-4 gx-5 h-100 image-card">
    <div class="col-md-6 <?php echo esc_attr($imageOrder); ?>">
        <?php if ($image_url): ?>
        <img class="img-fluid w-100 h-100 rounded shadow image-card-image" src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($alt_text); ?>" />
        <?php endif; ?>
    </div>
    <div class="col-md-6 <?php echo esc_attr($textOrder); ?>">
        <div class="h-100 d-flex flex-column justify-content-center align-items-start">
            <?php if (!empty($card['header'])): ?>
            <h4 class="mt-4 mt-md-0 fw-semibold">
                <?php echo esc_html($card['header']); ?>
            </h4>
            <?php endif; ?>

            <?php if (!empty($card['text'])): ?>
            <p class="my-3"><?php echo esc_html($card['text']); ?></p>
            <?php endif; ?>

            <?php if (!empty($card['link']) && !empty($card['button_text'])): ?>
            <div class="mt-3 image-card-btn-wrapper">
                <?php
echo do_shortcode('[button variant="primary" link="/' . esc_attr($card['link']) . '"]' . esc_html($card['button_text']) . '[/button]');
?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; ?>
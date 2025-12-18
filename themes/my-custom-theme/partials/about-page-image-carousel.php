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
}
</style>


<?php
$gallery_items = [];

for ($i = 1; $i <= 4; $i++) {
    $image = get_field("about_page_gallery_image_{$i}");
    $span  = get_field("about_page_gallery_image_{$i}_span");

    if ($image) {
        $gallery_items[] = [
            'image' =>
is_array($image) ? $image['url'] : $image, 'text' => $span ]; } } ?>

<section>
    <div class="container pb-4">
        <?php if (!empty($gallery_items)) : ?>
        <div class="col position-relative">
            <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
                <div id="about-page-images-carousel" class="carousel slide w-100">
                    <div class="about-page-carousel-inner carousel-inner">
                        <?php foreach ($gallery_items as $index =>
            $gallery_item) : ?>
                        <?php if (!empty($gallery_item['image'])) : ?>
                        <div class="h-100 w-100 carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <img class="custom-rounded d-block w-100"
                                src="<?php echo esc_url($gallery_item['image']); ?>"
                                alt="Slide <?php echo esc_attr($index + 1); ?>" />
                            <div
                                class="product-info d-flex justify-content-center align-items-center text-align-left pt-4 gap-5">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php if (!empty($gallery_item['text'])) : ?>
            <div class="about-page-carousel-text-span">
                <span class="custom-badge badge fs-6">
                    <?php echo esc_html($gallery_item['text']); ?>
                </span>
            </div>
            <?php endif; ?>


        </div>



        <div class="mt-3">
            <?php render_custom_carousel_indicators('about-page-images-carousel', $gallery_items); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
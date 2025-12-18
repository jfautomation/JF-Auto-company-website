<style>
.popular-categories-icon {
    font-size: 4rem;
}

.category-link:hover {
    text-decoration: underline !important;
}

 @media (max-width: 767px) {
    .categories-container .row > .category:nth-child(2) {
        margin-top: 2rem; /* adjust as needed */
    }
}

</style>



<?php
$popular_categories = [
    [
'header' => get_field('preview_category_1_header'), 
'text' => get_field('preview_category_1_text'), 
'link' => get_field('preview_category_1_link'), 
'image' => get_field('preview_category_1_image'),
'alt_text' => get_field('preview_category_1_image_alt_text'),
], 
[
'header' => get_field('preview_category_2_header'), 
'text' => get_field('preview_category_2_text'), 
'link' => get_field('preview_category_2_link'), 
'image' => get_field('preview_category_2_image'),
'alt_text' => get_field('preview_category_2_image_alt_text'),
], 
]; 

$selling_points = [ [ 'header' =>
get_field('selling_point_1_header'), 'text' =>
get_field('selling_point_1_text'), 'button_text' =>
get_field('selling_point_1_button_text'), 'button_link' =>
get_field('selling_point_1_button_link'), ], [ 'header' =>
get_field('selling_point_2_header'), 'text' =>
get_field('selling_point_2_text'), ], ]; $popular_categories_header =
get_field('popular_categories_header'); ?>

<section>
    <div class="container">
        <div class="row mt-3">
            <h4 class="fw-semibold">
                <?= esc_html($popular_categories_header); ?>
            </h4>
        </div>
        <div class="row categories-container mt-1 gy-4">
            <div class="col-12 col-lg-6">
                <div class="row gx-3">

                    <?php foreach ($popular_categories as $index =>
          $category): ?>
                    <div class="category col-12 col-md-6">
                        <a href="/<?= esc_html($category['link']); ?>">
                            <img class="img-fluid custom-rounded scaled-image" src="<?= esc_url($category['image']); ?>"
                                alt="<?= esc_attr($category['alt_text'] ?: 'Category image'); ?>">
                        </a>


                        <div>
                            <a class="text-dark text-decoration-none category-link"
                                href="/<?= esc_html($category['link']); ?>">
                                <h5 class="mt-3 fw-semibold">
                                    <?= esc_html($category['header']); ?>
                            </a>

                            </h5>
                            <p class="text-grey small-text">
                                <?= esc_html($category['text']); ?>
                            </p>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 ps-lg-5 mt-sm-5 mt-lg-4">
                <div class="row gx-5">
                    <?php foreach ($selling_points as $index =>
          $point): ?>
                    <div class="col-12 col-lg-6 <?= $index === 1 ? 'd-none d-lg-block' : '' ?>">
                        <div class="">
                            <h5 class="fw-semibold">
                                <?= esc_html($point['header']); ?>
                            </h5>
                            <p class="mt-3 text-grey">
                                <?= esc_html($point['text']); ?>
                            </p>
                            <div class="mt-4">
                                <?php if ($index === 0 && !empty($point['button_text']) && !empty($point['button_link'])): ?>
                                <?= do_shortcode('[button variant="primary" link="/' . ltrim(esc_html($point['button_link']), '/') . '" icon="bi-arrow-right"]' . esc_html($point['button_text']) . '[/button]'); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
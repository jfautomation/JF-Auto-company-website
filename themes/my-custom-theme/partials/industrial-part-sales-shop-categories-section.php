

<?php
$categories = [];

for ($i = 1; $i <= 7; $i++) {
    $categories[] = [
        'title' => get_field("category_{$i}_title"),
        'link'  => get_field("category_{$i}_link"),
        'image' => get_field("category_{$i}_image"),
        'alt text' => get_field("category_{$i}_image_alt_text"),
    ];
}

$shop_all_categories_header = get_field('shop_all_categories_header');
?>


<section>
    <div class="container">
        <?php
get_template_part('partials/section-header-simplified', null, array(
    'h5_text' =>
    get_field('shop_all_categories_header'))); ?>

        <div class="row mt-5">
            <?php foreach ($categories as $category): ?>
            <?php if (!empty($category['image']) && !empty($category['link']) && !empty($category['title'])): ?>
            <div class="rounded  col-12 col-md-4 col-lg-3 xl-2 mb-4">
                <a href="/<?php echo esc_html($category['link']); ?>"
                    class="rounded text-decoration-none d-block position-relative">
                    <img src="<?php echo esc_url($category['image']); ?>"
                        alt="<?php echo esc_attr($category['alt text']); ?>" class="rounded img-fluid w-100"
                        style="height: 225px; object-fit: cover" />
                    <div class="rounded position-absolute top-0 start-0 w-100 h-100"
                        style="background-color: rgba(0, 0, 0, 0.5)"></div>
                    <div class="rounded position-absolute top-0 start-0 w-100 p-3">
                        <h5 class="mt-1 text-center text-light">
                            <?php echo esc_html($category['title']); ?>
                        </h5>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
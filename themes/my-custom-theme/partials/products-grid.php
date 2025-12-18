<style>
.product-image {
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, border 0.3s ease;
}

.product-image {
    min-height: 200px;
    max-height: 200px;
    object-fit: contain;
    /* width: fit-content; */
}

.product-btn-wrapper {
    width: fit-content;
}

.product-link:hover {
    text-decoration: underline !important;
}

.category-span:hover {
    text-decoration: underline !important;
}

@media (max-width: 767px) {
    .product-image {
        width: 100%;
    }

    .product-btn-wrapper {
        width: 100%;
    }
}
</style>

<?php 
$products = get_all_products();
$globals_id = 578
?>






<div class="row mt-5">
    <?php foreach ($products as $product): ?>

    <div class="col-12 col-md-6 col-lg-3 mb-5">
        <a class="text-dark text-decoration-none" href="<?php echo esc_url('/all-products/?id=' . $product['id']); ?>">
            <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                <?php if ($product['image']): ?>
                <div
                    class="product-img-wrapper w-100 d-flex justify-content-center align-items-center light-grey-container custom-rounded light-grey-container p-4">
                    <a class="text-dark text-decoration-none"
                        href="<?php echo esc_url('/all-products/?id=' . $product['id']); ?>">

                        <img src="<?php echo esc_url($product['image']); ?>" class="card-img-top product-image scaled-image"
                            alt="<?php echo esc_attr($product['name']); ?>" />
                    </a>
                </div>
                <?php endif; ?>
                <div class="card-body w-100 d-flex flex-column mt-4 justify-content-between">
                    <div>
                        <a class="text-dark text-decoration-none product-link"
                            href="<?php echo esc_url('/all-products/?id=' . $product['id']); ?>">
                            <h6 class="card-title fw-semibold">
                                <?php echo esc_html($product['name']); ?>
                            </h6>
                        </a>

                    </div>


                    <div>
                        <div class="mt-1">
                        <a class="small-text category-span text-grey mt-2 text-decoration-none"
                            href="/<?php echo esc_attr($product['category_url']); ?>">
                            <span class=""> <?php echo esc_html($product['category']); ?></span>
                        </a>
                </div>
                    </div>
                    <div class="w-auto mt-2"><span class="w-auto badge text-success border border-success"><i class="bi bi-box me-2"></i>In
                            stock</span></div>


                </div>
            </div>

    </div>
    <?php endforeach; ?>

</div>




<!-- <div class="mt-lg-5 d-flex w-100 justify-content-center align-items-center">
    <?php
echo do_shortcode(
    '[button variant="primary" size="lg" link="' . esc_url(get_field('view_all_products_btn_url', $globals_id)) . '" ]' 
    . esc_html(get_field('view_all_products_btn_text', $globals_id)) . 
    '[/button]'
);
?>

</div> -->
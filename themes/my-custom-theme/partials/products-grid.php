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
<?php foreach ($products as $product): 

    // Normalize data safely
    $product_id = $product['id'] ?? '';
    $product_slug = $product['slug'] ?? $product_id; // fallback safety

    $product_name = $product['name'] ?? 'Product';
    $product_image = safe_product_image($product['image'] ?? null);
    $product_price = $product['price'] ?? null;
    $product_category = $product['category'] ?? '';
    $product_category_url = $product['category_url'] ?? '#';

    // ✅ CLEAN URL (now uses slug)
    $product_link = esc_url('/all-products/' . $product_slug);
?>

    <div class="col-12 col-md-6 col-lg-3 mb-5">
        <div class="product-card h-100 d-flex flex-column">

            <!-- Clickable Area -->
            <a class="text-dark text-decoration-none d-flex flex-column h-100" href="<?php echo $product_link; ?>">

                <!-- Image -->
                <div class="product-img-wrapper w-100 d-flex justify-content-center align-items-center light-grey-container custom-rounded p-4">
                    <img 
                        src="<?php echo esc_url($product_image); ?>" 
                        class="card-img-top product-image scaled-image"
                        alt="<?php echo esc_attr($product_name); ?>" 
                    />
                </div>

                <!-- Card Body -->
                <div class="card-body d-flex flex-column justify-content-between flex-grow-1 mt-4">

                    <!-- Title -->
                    <h6 class="card-title fw-semibold mb-2">
                        <?php echo esc_html($product_name); ?>
                    </h6>

                    <!-- Price / CTA -->
                    <div>
                        <?php if (!empty($product_price) && $product_price > 0): ?>
                            <div class="mt-2">
                                <span class="fw-semibold fs-5">
                                    $<?php echo number_format((float)$product_price, 2); ?>
                                </span>
                            </div>
                        <?php else: ?>
                            <div class="mt-2">
                                <span class="fw-semibold text-primary">
                                    Request a Quote
                                </span>
                            </div>
                        <?php endif; ?>

                        <!-- Category -->
                        <?php if (!empty($product_category)): ?>
                            <div class="mt-2">
                                <span class="small-text category-span text-grey">
                                    <?php echo esc_html($product_category); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Stock Badge -->
                <div class="mt-auto pt-2">
                    <span class="badge text-success border border-success">
                        <i class="bi bi-box me-2"></i>In stock
                    </span>
                </div>

            </a>

        </div>
    </div>

<?php endforeach; ?>
</div>






<style>
.img-container {
    background-color: var(--color-light-grey-bg);
}

.category-span:hover,
.link-to-item:hover {
    text-decoration: underline !important;
}

.custom-carousel-container {
    overflow: hidden;
    padding: 1rem 0;
}

.custom-carousel-track {
    display: flex;
    transition: transform 0.6s ease;
}

.custom-carousel-card {
    flex: 0 0 25%;
    max-width: 100%;
    box-sizing: border-box;
    border-radius: 10px;
}

.custom-carousel-card:not(:first-child) {
    margin-inline-start: 0.8rem;
}

.custom-carousel-card-inner-wrapper {
    height: 100% !important;
}

.card-col {
    border-radius: 10px;
}


.btn-container {
    width: fit-content;
}


.product-card-description {
    font-size: 0.85rem !important;
}


.arrow-btn {
    height: 1.75rem;
    width: 2rem;
    border-radius: 4.6px;
}

.product-image {
    min-height: 200px;
    max-height: 200px;
    object-fit: contain;
    transition: transform 0.4s ease;
    transform: scale(1.05);
    cursor: pointer;
}

.product-link:hover {
    text-decoration: underline !important;
}

/* Hover effect */
.product-image:hover {
    transform: translateY(-6px);
}

@media (max-width: 991px) {
    .custom-carousel-card {
        flex: 0 0 35%;
    }

}

@media (max-width: 600px) {
    .custom-carousel-container {
        padding: unset;
    }

}

@media (max-width: 767px) {
    .custom-carousel-card {
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }


    .custom-carousel-card:not(:first-child) {
        margin-inline-start: 0;
        margin-top: 0.75rem;
    }
}
</style>

<?php
$globals_id = 578;
?>


<?php
$carousel_id = 'carousel_' . uniqid();

ob_start();

$products = get_all_products();

$products = array_filter($products, function ($product) {
    return !empty($product['name']);
});
?>

<?php foreach ($products as $product): ?>

<div class="custom-carousel-card custom-rounded d-flex flex-column text-dark text-center">
    <div class="custom-carousel-card-inner-wrapper custom-rounded">
        <div class="row h-100">
            <div class="col-12">
                <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                    <?php if ($product['image']): ?>

                    <div class="w-100 d-flex justify-content-center img-container p-3 custom-rounded">
                        <a class="" href="<?php echo esc_url('/all-products/?id=' . $product['id']); ?>">
                            <img src="<?php echo esc_url($product['image']); ?>"
                                class="card-img-top product-image custom-rounded"
                                alt="<?php echo esc_attr($product['name']); ?>">
                        </a>
                    </div>

                    <?php endif; ?>
                    <div class="card-body d-flex flex-column w-100 d-flex flex-column justify-content-between mt-3">
                        <div>
                            <a class="text-dark text-decoration-none product-link"
                                href="<?php echo esc_url('/all-products/?id=' . $product['id']); ?>">
                                <h6 class="card-title fw-semibold text-start">
                                    <?php echo esc_html($product['name']); ?>
                                </h6>
                            </a>
                        </div>
                        <div class="w-100 mt-1 d-flex justify-content-start"><span
                                class="w-auto badge text-success border border-success"><i class="bi bi-box me-2"></i>In
                                stock</span></div>
                        <div>

                            <div class="text-start text-grey small-text"> <a
                                    class="small-text category-span text-grey text-decoration-none"
                                    href="/<?php echo esc_html($product['category_url']); ?>">
                                    <span class=""> <?php echo esc_html($product['category']); ?></span>
                                </a></div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php
$carousel_content = ob_get_clean();
include get_template_directory() . '/partials/carousel-wrapper.php';
?>
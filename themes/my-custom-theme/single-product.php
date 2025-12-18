<style>
.product-image-wrapper {
    width: 300px;
    height: 300px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-page-product-image {
    max-width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

.product-page-category-link {
    text-decoration: none !important;
    color: var(--color-grey-text) !important;
}

.product-page-category-link:hover {
    text-decoration: underline !important;
}

@media (max-width: 991px) {
    .product-image-col {
        display: flex;
        justify-content: center;
    }
}

@media (max-width: 500px) {
    .single-product-page-btn-container {
        flex-direction: column !important;
    }
}
</style>

<?php
$products = get_all_products();
$product_id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : '';

$product = null;
foreach ($products as $p) {
    if ($p['id'] === $product_id) {
        $product = $p;
        break;
    }
}

if (!$product) {
    echo '<div class="container mt-5"><h1>Product not found</h1></div>';
    return;
}

// Make product available for template
$GLOBALS['dynamic_product'] = $product;

// Now just output the product page content
?>


<div class="container pb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/all-products">All products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html($product['name']); ?></li>
        </ol>
    </nav>
    <div class="row mt-md-5 pt-md-3 align-items-start">
        <div class="col-12 col-lg-6 product-image-col">
            <?php if (!empty($product['image'])): ?>
            <div class="product-image-wrapper">
                <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>"
                    class="product-page-product-image">
            </div>
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-6">
            <h2 class="mb-1"><?php echo esc_html($product['name']); ?></h2>
            <div class="w-auto mt-2"><span class="w-auto badge text-success border border-success"><i
                        class="bi bi-box me-2"></i>In stock</span></div>
            <div class="mt-1">
                <a class="product-page-category-link" href="/<?php echo esc_html($product['category_url']); ?>">
                    <span class=""><?php echo esc_html($product['category']); ?></span>
                </a>
            </div>


            <div class="d-flex gap-2 mt-3 single-product-page-btn-container">
                <?php echo do_shortcode(
    '[button variant="primary" link="tel:9052680778"]Call to Purchase[/button]'
); ?>
                <?php echo do_shortcode(
    '[button variant="outline-primary" link="mailto:info@jfautomation.ca"]Email to Purchase[/button]'
); ?>
            </div>
        </div>
    </div>
    <div class="row mt-4">


        <h4 class="fw-semibold">
            <?php 
$globals_id = 578;
echo esc_html( get_field('single_product_page_featured_products_header', $globals_id) ); 
?>
        </h4>
        <p class="mt-1"><?php echo esc_html($product['description']); ?></p>


    </div>




</div>

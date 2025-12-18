<style>
.inner-content-wrapper {
  padding-top: 6rem;
}

.content-wrapper {
  justify-content: center;
}

.hero {
  position: relative;
  z-index: 1;
  /* height: 100vh; */
  height: 100dvh; /* safer on mobile */
}

.hero-overlay {
  background: rgba(0, 0, 0, 0.4);
  z-index: 1;
  pointer-events: none;
}

.hero .content-wrapper,
.hero .hero-product-carousel {
  z-index: 2;
  position: relative;
}
.hero-header {
  font-size: 2.8rem !important;
}

.hero-subheader {
  font-size: 1.05rem !important;
}

.mobile-hero-points {
  display: none;
}

.hero-paragraph {
  color: #454444;
}

.hero-carousel-inner {
  width: 300px;
  height: 400px;
}

.product-info {
  position: absolute;
  bottom: 0;
}

.brand-card-img-wrapper {
  height: 100px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.brand-card-img-wrapper img {
  object-fit: contain;
}

.mobile-hero {
  display: none;
}

.mobile-hero-text {
  display: none;
}

.mobile-image {
  display: none;
}

@media (max-width: 991px) {
  .hero-header {
    font-size: 2.5rem !important;
  }
  .hero-subheader {
    font-size: 1rem !important;
  }
  .mobile-hero {
    display: block;
  }
  .mobile-image {
    display: block;
    max-width: 100%;
  }
  .mobile-hero-text {
    display: block;
  }
  .hero-product-carousel {
    display: none;
  }
  .hero-paragraph {
    display: none;
  }
  .hero-span-icon {
    display: none;
  }
  .hero-subheader {
    margin-top: 1rem !important;
  }
  .hero-header {
    width: 100% !important;
    margin-top: 0.7rem !important;
  }
  .content-wrapper {
    justify-content: flex-end;
  }
  .hero {
    padding-bottom: 8rem;
  }
}

@media (max-width: 600px) {
  .hero {
    padding-bottom: 5rem;
  }
}

@media (max-width: 500px) {
  .hero-header {
    font-size: 2.2rem !important;
  }
}

@media (max-width: 355px) {
  .inner-content-wrapper {
    padding-top: 0;
  }
}

    </style>



<?php
$hero_bg_image = get_field('hero_background_image');

$products = array(
    array(
        'image' => get_field('product_shot_1'),
        'name'  => get_field('product_1_text'),
        'price' => get_field('product_1_price'),
        'sale_price' => get_field('product_1_sale_price'),
        'link'  => get_field('product_1_link'),
    ),
    array(
        'image' => get_field('product_shot_2'),
        'name'  => get_field('product_2_text'),
        'price' => get_field('product_2_price'),
        'sale_price' => get_field('product_2_sale_price'),
        'link'  => get_field('product_2_link'),
    ),
    array(
        'image' => get_field('product_shot_3'),
        'name'  => get_field('product_3_text'),
        'price' => get_field('product_3_price'),
        'sale_price' => get_field('product_3_sale_price'),
        'link'  => get_field('product_3_link'),
    ),
    array(
        'image' => get_field('product_shot_4'),
        'name'  => get_field('product_4_text'),
        'price' => get_field('product_4_price'),
        'sale_price' => get_field('product_4_sale_price'),
        'link'  => get_field('product_4_link'),
    ),
);

$carousel_images = array_filter(array_column($products, 'image'));
?>

<div>
    <div class="page-layout-hero hero d-flex flex-column justify-content-center align-items-center position-relative"
        style="background-image: url('<?php echo esc_url($hero_bg_image); ?>'); background-size: cover; background-position: center;">
        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
        <div class="container h-100">
            <div class="row inner-content-wrapper h-100">
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="content-wrapper h-100 d-flex flex-column align-items-center">

                        <div class="text-light mt-4 d-flex flex-column align-items-start">
                            <h1 class="hero-header text-start fw-semibold mt-3">
                                <?php echo esc_html(get_field('hero_header_text')); ?>
                            </h1>
                            <p class="mt-2 fs-5 pt-1 text-light hero-paragraph">
                                <?php echo esc_html(get_field('hero_paragraph_text')); ?>
                            </p>
                            <p class="mobile-hero-text mt-2 pt-1">
                                <?php echo esc_html(get_field('hero_paragraph_text')); ?>

                            </p>
                            <div class="d-flex gap-2 mt-4 w-100">
                                <!-- <?php
                               echo do_shortcode('[button variant="primary" link="' . esc_url(get_field('hero_button_link_1')) . '" icon="bi-arrow-right"]' . esc_html(get_field('hero_button_text_1')) . '[/button]');
                                ?> -->
                                <?php
echo do_shortcode(
    '[button variant="primary" link="tel:9052680778" icon="bi-arrow-right"]' 
    . esc_html(get_field('hero_button_text_1')) . 
    '[/button]'
);
?>


                            </div>
                            <div class="hero-disclaimer-text d-flex align-items-center mt-4 small-text gap-1">
                                <span><?php echo esc_html(get_field('hero_span_1')); ?></span><span>|</span></span></span><span
                                    class="ms-1"> <i
                                        class="hero-span-icon bi <?php echo esc_attr(get_field('span_icon')); ?> me-1"></i>
                                    <?php echo esc_html(get_field('hero_span_2')); ?><span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<section class="light-grey-container" id="brands">
    <div class="container pb-4">
        <?php
    $args = array(
            'header_text' => get_field('brands_header'),
            'cta_link' => get_field('brands_cta_link'),
            'cta_link_text' => get_field('brands_cta_text'),
            'text' => get_field('brands_text')
        );
        get_template_part('partials/section-header', null, $args);
          ?>
        <?php
$image_url = get_field('landing_page_brands_image');
if ($image_url):
?>
        <div class="row mt-3">
            <div class="col-12 col-lg-9">
                <img src="<?php echo esc_url($image_url); ?>" alt="Brand image" class="custom-rounded img-fluid" />
            </div>

        </div>
        <?php endif; ?>
    </div>
</section>



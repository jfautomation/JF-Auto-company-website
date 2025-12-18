<style>
.about-page-paragraph {
    font-size: 0.95rem !important;
}
</style>

<section class="mt-3">
    <div class="container">
        <div class="row gx-5">
            <div class="col-12 col-lg-7 d-flex flex-column justify-content-between">
                <div class="row">
                    <h4 class="fw-semibold mb-0 text-with-brand-links">
                        <?php 
$bio_paragraph = get_field('about_page_opening_paragraph');
echo wpautop($bio_paragraph, false);  ?>
                    </h4>
                </div>
                <div>
                    <div class="row mt-4 mt-lg-0">
                        <?php
    for ($i = 1; $i <= 2; $i++) {
        $icon  = get_field("about_page_selling_point_{$i}_icon");
        $title = get_field("about_page_selling_point_{$i}_title");
        $text  = get_field("about_page_selling_point_{$i}_text");

        if ($icon || $title || $text): ?>
                        <div class="col stat-card">
                            <div class="">
                                <?php if ($title): ?>
                                <h2 class="fw-semibold text-primary stat-number">
                                    <?php echo esc_html($title); ?>
                                </h2>
                                <?php endif; ?>

                                <?php if ($text): ?>
                                <p class="fw-semibold stat-text mb-0">
                                    <?php echo esc_html($text); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif;
    }
    ?>
                    </div>
                </div>
            </div>
            <div class="col mt-5 mt-lg-0">
                <div class="light-grey-container custom-rounded py-3 px-4">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex align-items-center gap-3">
                            <span class="fs-5 fw-semibold">About us</span><i class="bi bi-gear-wide-connected fs-3"></i>
                        </div>

                    </div>
                    <p class="mt-2 about-page-paragraph"><?= get_field('about_page_bio_paragraph'); ?></p>

                    <div class="d-flex gap-2 mt-4 pt-2">
                        <?php
$button_text = get_field('about_page_bio_button_text');
$temp_link = 'tel:9052680778';

echo do_shortcode('[button variant="primary" link="' . esc_url($temp_link) . '" icon="bi-arrow-right"]' . esc_html($button_text) . '[/button]');
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
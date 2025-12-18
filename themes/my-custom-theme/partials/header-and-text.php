<style>
.header-and-text-title,
.header-and-text-paragraph-wrapper {
    justify-content: flex-end;
}

.header-and-text-paragraph {
    font-size: 0.95rem;
    text-align: right;
    width: 75%;
}

.header-and-text-btn-container {
    width: fit-content;
}

@media (max-width: 991px) {

    .header-and-text-title,
    .header-and-text-paragraph-wrapper {
        justify-content: flex-start;
    }

    .header-and-text-paragraph {
        text-align: left;
        width: 100%;
    }
}
</style>

<?php
$args = wp_parse_args($args);
?>

<div class="row mt-4 pb-2">
    <div class="col-12 col-lg-8">
        <?php if (!empty($args['h2_text'])) : ?>
        <h4 class="fw-semibold mb-0">
            <?php echo esc_html($args['h2_text']); ?>
        </h4>
        <?php endif; ?>
        <!-- <div class="mt-4 pt-3 header-and-text-btn-container">
            <?php
echo do_shortcode(
    '[button variant="primary" link="tel:9052680778" icon="bi-arrow-right"]' 
    . esc_html(get_field('hero_button_text_1')) . 
    '[/button]'
);
?>
        </div> -->

    </div>
    <div class="col">
        <?php if (!empty($args['p'])) : ?>

        <div class="d-flex flex-column mt-5 mt-lg-0">
            <?php if (!empty($args['subheader']))  : ?>
            <div class="d-flex w-100 header-and-text-title gap-2 align-items-center">
                <span class="fs-5 fw-semibold"><?php echo esc_html($args['subheader']); ?>
                </span>
                <?php endif; ?>
                <?php if (!empty($args['icon'])) : ?>
                <i class="ms-1 fs-4 bi-<?php echo esc_attr($args['icon']); ?>"></i>
            </div>
            <?php endif; ?>

            <div class="w-100 header-and-text-paragraph-wrapper d-flex">
                <p class="d-flex mt-3 header-and-text-paragraph">
                    <?php echo esc_html($args['p']); ?>
                </p>
            </div>


        </div>

        <?php endif; ?>
    </div>
</div>
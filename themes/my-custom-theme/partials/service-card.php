<?php
$service_heading = $args['service_heading'] ?? '';
$paragraph       = $args['paragraph'] ?? '';
$link            = $args['link'] ?? '#';
$span            = $args['span'] ?? '';
$icon            = $args['icon'] ?? '';

// Determine if this card's link is the current page
$is_active = untrailingslashit($link) === untrailingslashit($_SERVER['REQUEST_URI']);
?>



<style>
.service-card {
    background-color: white;
    cursor: pointer;
    transition: color 0.3s ease, background-color 0.3s ease,
        border-color 0.3s ease;
}

.service-card:hover {
    box-shadow: var(--shadow-med);
}

.service-card-inside-span {
    position: absolute;
    top: 0;
    width: 100%;
    height: 5px;
}

.btn-grey {
    background-color: #d9dde2;
    font-size: 0.9rem;
    transition: background 0.3s ease, color 0.3s ease;
}

.btn-grey:hover {
    background: linear-gradient(to right,
            var(--color-gradient-light-blue),
            var(--color-gradient-dark-blue));
    color: white;
}

.outline-btn-container {
    width: fit-content;
}

.icon-container {
    width: 2rem;
    height: 2rem;
    padding: 0.5rem;
    border-radius: 50%;
    border: 1px solid #e3dfdf;
}

.service-card-link:hover {
    text-decoration: underline;
}
</style>



<div class="col-12 col-md-6 col-lg-4">
    <a class="position-relative text-decoration-none" href="<?php echo esc_url( '/' . ltrim( $args['link'], '/' ) ); ?>">
        <?php if ($is_active) : ?>
        <span class="service-card-inside-span bg-primary"></span>
        <?php endif; ?>

        <div
            class="service-card flex-grow-1 h-100 service-card pb-4 pt-3 px-4 shadow-light custom-rounded d-flex flex-column justify-content-between">


            <div>
                <div class="w-100 d-flex justify-content-between mt-1">

                    <div>
                        <i class="service-card-icon fs-2 text-dark <?php echo esc_html($args['icon']); ?>"></i>
                    </div>


                </div>
                <h4 class="text-dark fw-semibold card-header mt-2">
                    <?php echo esc_html($args['service_heading']); ?>
                </h4>
                <p class="mt-3 text-grey">
                    <?php echo esc_html($args['paragraph']); ?>
                </p>
            </div>
            <div class="d-flex justify-content-end text-primary mt-2">
                <span class="small-text fw-semibold">Learn more<span>
                        <i class="bi bi-chevron-right"></i>
            </div>
        </div>
    </a>
</div>
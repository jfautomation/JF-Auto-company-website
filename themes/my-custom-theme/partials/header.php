<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8L0L7PF2QZ"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    // Google Ads
    gtag('config', 'G-8L0L7PF2QZ');

    // Google Analytics
    gtag('config', 'G-LG63EEQP3M');

    gtag('event', 'contact_us', {});
    </script>

    <?php
    /*
     * Dynamic product SEO.
     */
    $is_dynamic_product = !empty($GLOBALS['dynamic_product'])
        && is_array($GLOBALS['dynamic_product']);

    $product = $is_dynamic_product
        ? $GLOBALS['dynamic_product']
        : [];

    if ($is_dynamic_product) {
        remove_action('wp_head', '_wp_render_title_tag', 1);
    }
    ?>

    <?php if ($is_dynamic_product): ?>

    <title><?php
            echo esc_html(
                $product['seo_title'] ?? get_bloginfo('name')
            );
        ?></title>

    <?php if (!empty($product['meta_description'])): ?>
    <meta name="description" content="<?php echo esc_attr($product['meta_description']); ?>">
    <?php endif; ?>

    <?php if (!empty($product['canonical_url'])): ?>
    <link rel="canonical" href="<?php echo esc_url($product['canonical_url']); ?>">
    <?php endif; ?>

    <?php endif; ?>

    <style>
    /* =========================================
           SITE HEADER
        ========================================= */

    #site-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
    }

    /* =========================================
           FULL-WIDTH QUALITY MARQUEE
        ========================================= */

    .quality-marquee {
        display: block;
        position: relative;
        width: 100%;
        overflow: hidden;
        background-color: #000000 !important;
        color: #ffffff !important;
        padding: 5px 0;
        white-space: nowrap;
    }

    .quality-marquee-track {
        display: flex;
        width: max-content;
        animation: marquee-scroll 30s linear infinite;
    }

    .quality-marquee-group {
        display: flex;
        align-items: center;
        flex-shrink: 0;
    }

    .quality-marquee-group span {
        color: #ffffff !important;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @keyframes marquee-scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    .quality-marquee:hover .quality-marquee-track {
        animation-play-state: paused;
    }

    /* =========================================
           MAIN NAVIGATION DECK
        ========================================= */

    #main-navbar {
        position: relative;
        width: 100%;
        margin: 0;
        display: block;
        padding-top: 0.4px !important;
    }


    .company-logo {
        width: 160px;
        height: auto;
        max-height: 50px;
    }

    .company-logo-container {
        padding: 0 !important;
    }


    .navbar-brand {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        margin-top: -5px;
    }

    .navbar-toggler {
        border: none !important;
        background-color: white;
    }

    .navbar-toggler:focus {
        outline: none;
        box-shadow: none;
    }

    .dropdown-toggle::after {
        position: relative !important;
    }

    .dropdown-item {
        font-size: 0.95rem !important;
    }

    .dropdown-item:hover {
        background-color: #ebebeb;
    }

    /* Default transparent navbar */

    .navbar {
        background-color: transparent;
        color: white;
        transition: background-color 0.05s ease-in-out !important;
    }

    .navbar a.nav-link,
    .navbar a.nav-link.active {
        color: white;
        text-transform: uppercase;
        width: fit-content;
        transition: color 0.3s ease;
        padding: unset !important;
        font-size: 0.96rem;
        margin-top: 6px;
    }

    .navbar a.nav-link:hover,
    .navbar a.nav-link.active:hover {
        color: rgb(184, 184, 184);
    }

    /* White navbar state */

    .navbar.nav-white {
        background-color: white !important;
        color: black;
        transition: box-shadow 0.1s ease-in-out;
    }

    .navbar.nav-white.scrolled {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .navbar.nav-white a.nav-link,
    .navbar.nav-white a.nav-link.active {
        color: black;
    }

    /* When menu opens */

    .navbar.menu-open a.nav-link {
        color: black !important;
        transition: none !important;
    }

    /* Logo switching */

    .logo-dark {
        display: none;
    }

    .navbar.nav-white .logo-dark {
        display: inline-block;
    }

    .navbar.nav-white .logo-light {
        display: none;
    }

    .navbar.nav-transparent .logo-light {
        display: inline-block;
    }

    .navbar.nav-transparent .logo-dark {
        display: none;
    }

    /* =========================================
           RESPONSIVE HEADER
        ========================================= */

    @media (max-width: 767px) {
        .quality-marquee-group span {
            padding: 0 10px;
            font-size: 10px;
            letter-spacing: 0.5px;
        }
    }

    @media (max-width: 400px) {
        .quality-marquee-group span {
            padding: 0 7px;
            font-size: 9px;
        }
    }
    </style>

    <?php
    /*
     * Load global CSS inline if available.
     */
    $globals_css_path = get_template_directory() . '/css/globals.css';

    if (file_exists($globals_css_path)) {
        echo '<style id="globals-inline">'
            . file_get_contents($globals_css_path)
            . '</style>';
    }

    /*
     * Run WordPress head hooks.
     */
    wp_head();
    ?>

</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php
    /*
     * Determine transparent navbar pages.
     */
    $transparent_pages = ['about', 'services'];

    $page_id = get_queried_object_id();

    $slug = $page_id
        ? get_post_field('post_name', $page_id)
        : '';

    $current_path = trim(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
        '/'
    );

    $is_transparent_page =
        is_front_page()
        || in_array($slug, $transparent_pages, true)
        || str_starts_with($current_path, 'services');

    $header_class = $is_transparent_page
        ? 'nav-transparent'
        : 'nav-white';
    ?>

    <header id="site-header" class="site-header <?php echo esc_attr($header_class); ?>">

        <!-- =====================================
             FULL-WIDTH MARQUEE
        ====================================== -->

        <div class="quality-marquee" aria-label="Professional Service. Quality Guaranteed. Reasonable Pricing.">

            <div class="quality-marquee-track">

                <?php for ($i = 0; $i < 2; $i++): ?>

                <div class="quality-marquee-group" <?php echo $i === 1 ? 'aria-hidden="true"' : ''; ?>>

                    <span>Professional Service</span>
                    <span>✦</span>
                    <span>Quality Guaranteed</span>
                    <span>✦</span>
                    <span>Reasonable Pricing</span>
                    <span>✦</span>

                </div>

                <?php endfor; ?>

            </div>

        </div>

        <!-- =====================================
             MAIN NAVIGATION
        ====================================== -->

        <nav class="navbar navbar-expand-lg text-light" id="main-navbar">

            <div class="container inner-nav-container mt-1">

                <?php
                $globals_id = 578;

                $company_logo_light = get_field(
                    'company_logo_light',
                    $globals_id
                );

                $company_logo_dark = get_field(
                    'company_logo_dark',
                    $globals_id
                );
                ?>

                <!-- Company Logo -->

                <a href="/" class="navbar-brand d-inline-block company-logo-container">

                    <?php if ($company_logo_light): ?>
                    <img src="<?php echo esc_url($company_logo_light); ?>" alt="JF Automation"
                        class="company-logo logo-light">
                    <?php endif; ?>

                    <?php if ($company_logo_dark): ?>
                    <img src="<?php echo esc_url($company_logo_dark); ?>" alt="JF Automation"
                        class="company-logo logo-dark">
                    <?php endif; ?>

                </a>

                <!-- Mobile Menu Toggle -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <!-- Navigation Links -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mt-3 mb-lg-0 ms-lg-5 pb-2 d-flex gap-lg-5">

                        <?php
                        $locations = get_nav_menu_locations();
                        $menu_id = $locations['primary'] ?? null;

                        if ($menu_id):

                            $menu_items = wp_get_nav_menu_items($menu_id);

                            if (!empty($menu_items)):

                                $menu_children = [];

                                foreach ($menu_items as $item) {
                                    if ($item->menu_item_parent) {
                                        $menu_children[$item->menu_item_parent][] = $item;
                                    }
                                }

                                foreach ($menu_items as $item):

                                    if ($item->menu_item_parent != 0) {
                                        continue;
                                    }

                                    $has_children = isset($menu_children[$item->ID]);

                                    $is_services = (
                                        strtolower($item->title) === 'services'
                                    );

                                    $is_active = (
                                        untrailingslashit($item->url)
                                        === untrailingslashit(
                                            home_url($_SERVER['REQUEST_URI'])
                                        )
                                    ) ? 'active' : '';

                                    if ($is_services && $has_children):
                        ?>

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle <?php echo esc_attr($is_active); ?> services-link"
                                href="<?php echo esc_url($item->url); ?>" id="servicesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">

                                <?php echo esc_html($item->title); ?>

                            </a>

                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">

                                <?php foreach ($menu_children[$item->ID] as $child): ?>

                                <li>
                                    <a class="dropdown-item" href="<?php echo esc_url($child->url); ?>">

                                        <?php echo esc_html($child->title); ?>

                                    </a>
                                </li>

                                <?php endforeach; ?>

                            </ul>

                        </li>

                        <?php else: ?>

                        <li class="nav-item">

                            <a class="nav-link <?php echo esc_attr($is_active); ?>"
                                href="<?php echo esc_url($item->url); ?>">

                                <?php echo esc_html($item->title); ?>

                            </a>

                        </li>

                        <?php
                                    endif;

                                endforeach;

                            endif;

                        endif;
                        ?>

                    </ul>

                    <!-- Shop Button -->

                    <div class="d-flex align-items-center gap-3 btn-and-social-links-nav-container mt-2">

                        <?php
                        $globals_id = 578;

                        $shop_button_text = get_field(
                            'shop_button_text',
                            $globals_id
                        );

                        $shop_button_link = ltrim(
                            (string) get_field('shop_button_link', $globals_id),
                            '/'
                        );

                        echo do_shortcode(
                            '[button id="nav-btn" button variant="white" size="md" link="/'
                            . esc_attr($shop_button_link)
                            . '" icon="bi-arrow-right"]'
                            . esc_html($shop_button_text)
                            . '[/button]'
                        );
                        ?>

                    </div>

                </div>

            </div>

        </nav>

    </header>

</body>

</html>
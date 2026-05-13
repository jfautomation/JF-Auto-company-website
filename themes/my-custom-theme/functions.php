<?php

require_once get_template_directory() . '/includes/helpers.php';


/* =========================================================
   PRODUCT URL REWRITE (CLEAN URL SUPPORT)
   /all-products/product-slug/
========================================================= */

function jf_add_product_rewrite_rules() {
    add_rewrite_rule(
        '^all-products/([^/]+)/?$',
        'index.php?pagename=all-products&product_slug=$matches[1]',
        'top'
    );
}
add_action('init', 'jf_add_product_rewrite_rules');


function jf_add_query_vars($vars) {
    $vars[] = 'product_slug';
    return $vars;
}
add_filter('query_vars', 'jf_add_query_vars');


/* =========================================================
   THEME SETUP
========================================================= */

function my_custom_theme_setup() {

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'my_custom_theme_setup');


/* =========================================================
   TAGS FOR PAGES
========================================================= */

function add_tags_to_pages() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tags_to_pages');


require_once get_template_directory() . '/includes/products.php';


/* =========================================================
   BUTTON SHORTCODE
========================================================= */

function custom_button_shortcode($atts, $content = null) {

    $atts = shortcode_atts(
        array(
            'id'      => '',
            'variant' => 'primary',
            'link'    => '#',
            'size'    => '',
            'icon'    => '',
        ),
        $atts,
        'button'
    );

    $id      = esc_attr($atts['id']);
    $variant = esc_attr($atts['variant']);
    $size    = esc_attr($atts['size']);
    $link    = esc_url($atts['link']);
    $icon    = esc_attr($atts['icon']);

    $button_class = 'btn-base btn-' . $variant;

    if (!empty($size)) {
        $button_class .= ' btn-' . $size;
    }

    $icon_html = $icon ? ' <i class="ms-2 mt-1 bi ' . $icon . '"></i>' : '';
    $id_attr   = $id ? ' id="' . $id . '"' : '';

    $button_html = '<a href="' . $link . '" class="' . $button_class . '"' . $id_attr . '>';

    if (str_starts_with($variant, 'outline-')) {
        $button_html .= '<span class="btn-inner"></span>';
    }

    $button_html .= do_shortcode($content) . $icon_html;
    $button_html .= '</a>';

    return $button_html;
}
add_shortcode('button', 'custom_button_shortcode');


/* =========================================================
   CAROUSEL INDICATORS
========================================================= */

function render_custom_carousel_indicators($carousel_id, $images) {

    if (empty($images)) return;
    ?>

    <div class="w-100 d-flex justify-content-end gap-2">

        <span role="button"
              data-bs-target="#<?php echo esc_attr($carousel_id); ?>"
              data-bs-slide="prev"
              class="indicator-container bg-light cursor-pointer">
            <i class="bi bi-arrow-left"></i>
        </span>

        <span role="button"
              data-bs-target="#<?php echo esc_attr($carousel_id); ?>"
              data-bs-slide="next"
              class="indicator-container bg-light cursor-pointer">
            <i class="bi bi-arrow-right"></i>
        </span>

    </div>

    <?php
}


/* =========================================================
   SCRIPTS
========================================================= */

function my_custom_theme_scripts() {

    wp_enqueue_style('my-custom-theme-style', get_stylesheet_uri());

    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css'
    );

    wp_enqueue_style(
        'my-global-styles',
        get_template_directory_uri() . '/css/globals.css',
        array(),
        '1.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'my_custom_theme_scripts');


/* =========================================================
   MENUS
========================================================= */

function my_custom_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));
}
add_action('after_setup_theme', 'my_custom_register_menus');


/* =========================================================
   DYNAMIC PRODUCT SEO (UPDATED FOR CLEAN URLS)
========================================================= */

function dynamic_product_seo() {

    $product_slug = get_query_var('product_slug');

    if (!$product_slug || get_query_var('pagename') !== 'all-products') {
        return;
    }

    $products = get_all_products();
    $product = null;

    foreach ($products as $p) {
        if (($p['id'] ?? '') === $product_slug) {
            $product = $p;
            break;
        }
    }

    if (!$product) {
        return;
    }

    // SEO title
    add_filter('wpseo_title', fn($title) =>
        $product['seo_title'] ?? $title
    );

    // Meta description
    add_filter('wpseo_metadesc', fn($desc) =>
        $product['meta_description'] ?? $desc
    );

    // Canonical (FIXED)
    add_filter('wpseo_canonical', fn($canonical) =>
        home_url('/all-products/' . $product['id'] . '/')
    );

    // OpenGraph
    add_filter('wpseo_opengraph_title', fn($title) =>
        $product['seo_title'] ?? $title
    );

    add_filter('wpseo_opengraph_desc', fn($desc) =>
        $product['meta_description'] ?? $desc
    );

    add_filter('wpseo_opengraph_url', fn($url) =>
        home_url('/all-products/' . $product['id'] . '/')
    );
    // Canonical override (clean product URL)
    add_filter('wpseo_canonical', function($canonical) {
       $slug = get_query_var('product_slug');

      if ($slug) {
         return home_url('/all-products/' . $slug . '/');
    }

    return $canonical;
});

    // Twitter
    add_filter('wpseo_twitter_title', fn($title) =>
        $product['seo_title'] ?? $title
    );

    add_filter('wpseo_twitter_description', fn($desc) =>
        $product['meta_description'] ?? $desc
    );
}
add_action('wp', 'dynamic_product_seo');

add_action('template_redirect', function () {

    if (get_query_var('product_slug') && !isset($_GET['id'])) {
        $_GET['id'] = get_query_var('product_slug');
    }

});

add_filter('wpseo_canonical', function ($canonical) {

    $slug = get_query_var('product_slug');

    if (!empty($slug)) {
        return home_url('/all-products/' . $slug . '/');
    }

    return $canonical;
}, 999);
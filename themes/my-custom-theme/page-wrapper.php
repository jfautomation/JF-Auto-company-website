<?php
/**
 * Template Name: Page Wrapper
 */
?> 

<?php
get_template_part('partials/header');

$page_id = get_queried_object_id();
$slug = get_post_field('post_name', $page_id);

$transparent_pages = ['/', 'about', 'services'];
// Get current URL path
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// Determine if current page is transparent
$is_transparent_page =
    is_front_page() ||                                    
    in_array($slug, $transparent_pages) ||                
    str_starts_with($current_path, 'services');           
?>


<!-- <?php if ($is_white_page) echo '<section class="white-page-section">'; ?> -->

     <main class="site-main-content">
        <?php if (!$is_transparent_page) echo '<section class="white-page-section">'; ?>

<?php
if (is_front_page()) {
    get_template_part('page-landing');
} elseif (is_home()) {
    get_template_part('page-blog-index');
} elseif (is_single() && get_post_type() === 'post') {
    get_template_part('single');
} elseif (is_archive()) {
    get_template_part('partials/pages/archive');
} elseif ($slug === 'all-products') {
    $product_id = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : '';
    $product_id ? get_template_part('single-product') : get_template_part('page-all-products');
} else {
    $partial_path = "page-{$slug}.php";
    if (locate_template($partial_path)) {
        get_template_part("page-{$slug}");
    } else {
          // --- Bootstrap Breadcrumb ---
    
        echo '<div class="container pb-5">';
        echo '<nav aria-label="breadcrumb">';
        echo '<ol class="breadcrumb pb-2 d-flex align-items-center">';
        echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
        if (is_home() || is_single() && get_post_type() === 'post') {
           echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/blog')) . '">Blog</a></li>';
         }
        echo '<li class="breadcrumb-item active small-text" aria-current="page">' . esc_html(get_the_title($page_id)) . '</li>';

        echo '</ol>';
        echo '</nav>';
        echo '<h1>' . esc_html(get_the_title($page_id)) . '</h1>';
        echo '<div class="mt-4">';
        the_content();
        echo '</div></div>';
    }
}
?>

</main>
<?php if (!$is_transparent_page) echo '</section>'; ?>


<?php get_template_part('partials/footer'); ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-745467518"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-745467518');
</script>

    <?php if (!empty($GLOBALS['dynamic_product'])): 
        $product = $GLOBALS['dynamic_product']; ?>
    <title><?php echo esc_html($product['seo_title']); ?></title>
    <meta name="description" content="<?php echo esc_attr($product['meta_description']); ?>">
    <?php if (!empty($product['canonical_url'])): ?>
    <link rel="canonical" href="<?php echo esc_url($product['canonical_url']); ?>">
    <?php endif; ?>
    <?php else: ?>
    <?php wp_head(); // Normal CMS pages ?>
    <?php endif; ?>

<style>
    .company-logo {
  width: 175px;
}

.navbar-brand {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.navbar-toggler {
  border: none !important;
  background-color: white;
}

.navbar-toggler:focus {
  outline: none;
  box-shadow: none;
}

.top-nav {
  border-bottom: 1px solid rgba(186, 186, 186, 0.49);
  height: 2.25rem;
}

.top-nav.grey-border {
  border-bottom: 1px solid #e5e5e5;
}

.navbar-brand {
  margin-top: -8px;
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

/* //// conditionals  */

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

/* Box shadow only when scrolled */
.navbar.nav-white.scrolled {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.navbar.nav-white a.nav-link,
.navbar.nav-white a.nav-link.active {
  color: black;
}

/* When menu (drawer) opens — instant change */
.navbar.menu-open a.nav-link {
  color: black !important;
  transition: none !important; /* instant switch, no delay */
}

.company-logo {
  height: auto;
  max-height: 50px; /* adjust as needed */
}

.logo-dark {
  display: none; /* hidden by default */
}

.navbar.nav-white .logo-dark {
  display: inline-block; /* show dark logo when nav is white */
}

.navbar.nav-white .logo-light {
  display: none; /* hide light logo when nav is white */
}

.navbar.nav-transparent .logo-light {
  display: inline-block; /* show light logo when transparent */
}

.navbar.nav-transparent .logo-dark {
  display: none; /* hide dark logo when transparent */
}
</style>

<?php
// Place this in header.php, right before </head>
$globals_css_path = get_template_directory() . '/css/globals.css';
if (file_exists($globals_css_path)) {
    echo '<style id="globals-inline">' . file_get_contents($globals_css_path) . '</style>';
}
?>


</head>




<body <?php body_class(); ?>>


<?php
// Define which pages should have a transparent nav
$transparent_pages = ['about', 'services'];

$page_id = get_queried_object_id();
$slug = $page_id ? get_post_field('post_name', $page_id) : '';
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// TRUE if on home, or if slug/path matches transparent pages
$is_transparent_page =
    is_front_page() ||
    in_array($slug, $transparent_pages) ||
    str_starts_with($current_path, 'services');

// Default is white navbar, only add "nav-transparent" if needed
$header_class = $is_transparent_page ? 'nav-transparent' : 'nav-white';
?>

<header id="site-header" class="site-header <?php echo $header_class; ?>">
   <nav class="fixed-top navbar navbar-expand-lg text-light d-flex flex-column" id="main-navbar"> 
     <div class="container top-nav d-flex justify-content-end">
    
                <div class="d-flex gap-3 align-items-center text-light">
                    <a href="tel:9052680778">
                        <i class="text-light header-social-icon bi bi-telephone-fill"></i>
                    </a>

                    <?php
$globals_id = 578;
?>
                    <a href="<?php echo esc_url(get_field('social_icon_link_1', $globals_id)); ?>">
                        <i
                            class="text-light bi fs-5 header-social-icon <?php echo esc_attr(get_field('social_icon_1', $globals_id)); ?>"></i>
                    </a>

                    <a href="<?php echo esc_url(get_field('social_icon_link_2', $globals_id)); ?>">
                        <i
                            class="text-light bi fs-5 header-social-icon <?php echo esc_attr(get_field('social_icon_2', $globals_id)); ?>"></i>
                    </a>
                </div>
            </div>


            <div class="container inner-nav-container mt-1">


                <?php 
$globals_id = 578;
$company_logo_light = get_field('company_logo_light', $globals_id);
$company_logo_dark = get_field('company_logo_dark', $globals_id);
?>
                <a href="/" class="navbar-brand d-inline-block">
                    <?php if ($company_logo_light): ?>
                    <img src="<?= esc_url($company_logo_light); ?>" alt="Logo Light" class="company-logo logo-light">
                    <?php endif; ?>

                    <?php if ($company_logo_dark): ?>
                    <img src="<?= esc_url($company_logo_dark); ?>" alt="Logo Dark" class="company-logo logo-dark">
                    <?php endif; ?>
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mt-3 mb-lg-0 ms-lg-5 pb-2 d-flex gap-lg-5">
                        <?php
          $locations = get_nav_menu_locations();
          $menu_id = $locations['primary'] ?? null;

          if ($menu_id) :
              $menu_items = wp_get_nav_menu_items($menu_id);

              $menu_items_by_id = [];
              $menu_children = [];

              foreach ($menu_items as $item) {
                  $menu_items_by_id[$item->ID] = $item;
                  if ($item->menu_item_parent) {
                      $menu_children[$item->menu_item_parent][] = $item;
                  }
              }

              foreach ($menu_items as $item) :
                  if ($item->menu_item_parent != 0) {
                      continue;
                  }

                  $has_children = isset($menu_children[$item->ID]);
                  $is_services = (strtolower($item->title) === 'services');
                  $is_active = (esc_url($item->url) === home_url($_SERVER['REQUEST_URI'])) ? 'active' : '';

                  if ($is_services && $has_children) :
          ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $is_active; ?> services-link"
                                href="<?php echo esc_url($item->url); ?>" id="servicesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo esc_html($item->title); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <?php foreach ($menu_children[$item->ID] as $child) : ?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo esc_url($child->url); ?>">
                                        <?php echo esc_html($child->title); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php
                  else :
          ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $is_active; ?>" href="<?php echo esc_url($item->url); ?>">
                                <?php echo esc_html($item->title); ?>
                            </a>
                        </li>
                        <?php
                  endif;
              endforeach;
          endif;
          ?>
                    </ul>

                    <div class="d-flex align-items-center gap-3 btn-and-social-links-nav-container mt-2">
                        <?php
$globals_id = 578;

$shop_button_text = esc_html(get_field('shop_button_text', $globals_id));
$shop_button_link = ltrim(get_field('shop_button_link', $globals_id), '/'); // remove any accidental leading slash

echo do_shortcode(
    '[button id="nav-btn" button variant="white" size="md" link="/' . esc_attr($shop_button_link) . '" icon="bi-arrow-right"]' .
    $shop_button_text .
    '[/button]'
);
?>


                    </div>
                </div>
            </div>
        </nav>
    </header>

</body>

</html>
<?php
function safe_product_image($image_field) {
    $placeholder = 'http://jf-auto-company-site.local/wp-content/uploads/2026/04/placeholder.jpeg';

    if (empty($image_field)) return $placeholder;

    // ACF array
    if (is_array($image_field)) {
        return $image_field['sizes']['medium']
            ?? $image_field['url']
            ?? $placeholder;
    }

    // STRING (this is your case)
    if (is_string($image_field) && !empty($image_field)) {
        return $image_field;
    }

    // ID
    if (is_numeric($image_field)) {
        $url = wp_get_attachment_image_url($image_field, 'medium');
        if ($url) return $url;
    }

    return $placeholder;
}
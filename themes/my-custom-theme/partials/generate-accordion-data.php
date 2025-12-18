<?php
/**
 * Generate accordion data from ACF fields.
 *
 * @param string $base_key Base name of the ACF field group (e.g. 'automation_repair_page_service')
 * @param int $max_sections Max number of sections to check
 * @param int $max_subpoints Max number of subpoints to check per section
 * @return array Array of items for the accordion component
 */

function generate_accordion_items($base_key, $max_sections = 10, $max_subpoints = 10) {
    $accordion_items = [];

    for ($i = 1; $i <= $max_sections; $i++) {
        $header = get_field("{$base_key}_{$i}_header");

        if (!$header) {
            continue;
        }

        $content = '';

        // Check for plain text content
        $plain_text = get_field("{$base_key}_{$i}_text");

        if (!empty($plain_text)) {
            $content = '<p>' . esc_html($plain_text) . '</p>';
        } else {
            // Check for bullet point subservices
            $subpoints = [];

            for ($j = 1; $j <= $max_subpoints; $j++) {
                $sub = get_field("{$base_key}_{$i}_subservice_{$j}");
                if (!$sub) {
                    break;
                }
                $subpoints[] = $sub;
            }

            if (!empty($subpoints)) {
                $content = '<ul class="mb-0">';
                foreach ($subpoints as $point) {
                    $content .= '<li>' . esc_html($point) . '</li>';
                }
                $content .= '</ul>';
            }
        }

        if (!empty($content)) {
            $accordion_items[] = [
                'title'   => $header,
                'content' => $content,
            ];
        }
    }
    

    return $accordion_items;
}
?>

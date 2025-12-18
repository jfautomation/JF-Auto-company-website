<?php

if (empty($accordion_id) || empty($items) || !is_array($items)) {
    return;
}
?>

<div class="accordion pb-4 mt-4" id="<?php echo esc_attr($accordion_id); ?>">
    <?php foreach ($items as $index => $item) :
        $heading_id = "{$accordion_id}-heading-{$index}";
        $collapse_id = "{$accordion_id}-collapse-{$index}";
    ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
            <button class="fw-semibold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false"
                aria-controls="<?php echo esc_attr($collapse_id); ?>">
                <?php echo esc_html($item['title']); ?>
            </button>
        </h2>
        <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse"
            aria-labelledby="<?php echo esc_attr($heading_id); ?>"
            data-bs-parent="#<?php echo esc_attr($accordion_id); ?>">
            <div class="accordion-body">
                <?php echo wp_kses_post($item['content']); ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
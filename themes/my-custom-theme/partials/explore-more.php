<style>
.explore-more-link:hover {
    background-color: var(--color-primary) !important;
    color: white !important;
    font-size: 0.9rem !important;
}

.explore-more-link {
    font-size: 0.9rem !important;
}
</style>


<?php
$fields = $args['fields'] ?? [];
$globals_id = $args['globals_id'] ?? null;

$links = [];

foreach ($fields as $field) {
    $text = get_field("{$field}_label", $globals_id);
    $url  = get_field("{$field}_url", $globals_id);

    if (!empty($text) && !empty($url)) {
        $links[] = [
            'text' => $text,
            'link' => $url,
        ]; 
    }
}
?>

<div class="container pb-5">
    <h2 class="fw-semibold">Explore more</h2>
    <?php if (!empty($links)): ?>
    <div class="d-flex flex-wrap gap-3 mt-4">
        <?php foreach ($links as $link): ?>
        <div>
            <a href="/<?php echo esc_html($link['link']); ?>"
                class="explore-more-link d-flex justify-content-center w-100 text-dark text-decoration-none fw-semibold bg-light py-1 px-2 border rounded shadow-sm">
                <?php echo esc_html($link['text']); ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>




<?php
$globals_id = 578;
?>
<?php
if (!isset($carousel_id)) return;
?>

<?php
$globals_id = 578;
?>

<style>
@media (max-width: 767px) {
    .indicators-container {
        justify-content: center !important;
    }
}
</style>

<div class="custom-carousel-container position-relative">
    <div class="custom-carousel-track" id="<?php echo esc_attr($carousel_id); ?>_track">
        <?php if (isset($carousel_content)) echo $carousel_content; ?>
    </div>
</div>



<div class="indicators-container mt-5 d-flex justify-content-end">
    <div class="indicators-inner-wrapper d-flex gap-2">
        <span id="<?php echo esc_attr($carousel_id); ?>_prev" class="indicator-container bg-light cursor-pointer">
            <i class="bi bi-arrow-left"></i>
        </span>
        <span id="<?php echo esc_attr($carousel_id); ?>_next" class="indicator-container bg-light cursor-pointer">
            <i class="bi bi-arrow-right"></i>
        </span>
    </div>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    initCarousel("<?php echo esc_js($carousel_id); ?>");
});
</script>
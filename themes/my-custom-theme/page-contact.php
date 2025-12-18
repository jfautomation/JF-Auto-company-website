<style>
  .form {
    background-color: white;
  }

  .wp-form p {
    margin-bottom: 0 !important;
  }

  .form input::placeholder,
  .form textarea::placeholder {
    color: rgb(143, 143, 143);
    font-size: 0.9rem;
  }

  .email-icon {
    color: rgb(143, 143, 143);
    top: 8px;
    left: 9px;
  }

  .email-input {
    padding-left: 2rem !important;
  }

  .submit-btn-wrapper {
    height: 50px;
  }

  .submit-btn-wrapper input {
    font-size: 0.9rem;
    font-family: "Titillium Web";
    font-weight: 600;
    min-width: 10rem !important;
    display: flex;
    justify-content: center;
    align-items: center;
    white-space: nowrap;
    padding: 13px 32px;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    border-radius: var(--rounded-border);
    background-color: var(--color-primary);
    color: white;
    border: none !important;
  }

  .contact-page-btn-container,
  .contact-us-btn-container {
    width: fit-content;
  }

  @media (max-width: 991px) {
    .submit-btn-wrapper input {
      width: 100%;
    }

    .contact-page-btn-container,
    .contact-us-btn-container {
      width: 100%;
    }
  }

  @media (max-width: 767px) {
    .form-group-wrapper {
      flex-direction: column !important;
    }
  }
</style>

<div class="">
  <div class="container pb-5">
    <div class="row gx-5">
      <div class="col-12 col-lg-6">
        <div class="row">
          <div class="d-flex flex-column gap-3">
            <h2 class="fw-semibold">
              <?php echo esc_html(get_field('contact_page_header')); ?>
            </h2>
            <p class="mb-0 w-md-75">
              <?php echo esc_html(get_field('contact_page_paragraph')); ?>
            </p>
            <span class="fw-semibold text-primary text-decoration-underline">
              <?php echo esc_html(get_field('contact_page_email')); ?></span
            >
            <span class="contact-us-btn-container mt-2">
              <?php get_template_part('partials/call-us-btn'); ?></span
            >
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 mt-5 mt-lg-0">
        <div class="form shadow custom-rounded p-3 p-md-4 d-flex flex-column">
          <h3 class="fw-semibold">
            <?php echo esc_html(get_field('contact_page_form_header')); ?>
          </h3>
          <span class=""
            ><?php echo esc_html(get_field('contact_page_form_text')); ?></span
          >
          <?php echo do_shortcode('[contact-form-7 id="d715a6d" title="Untitled"]'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="light-grey-container pt-5 pb-5">
    <div class="container">
  <div class="row gx-5">
    <div class="col-md-12 col-lg-5">
      <h2>
        <?php echo esc_html(get_field('contact_page_company_bio_header')); ?>
      </h2>
      <p class="mt-4">
        <?php echo esc_html(get_field('contact_page_company_bio_text')); ?>
      </p>
      <div class="mt-4 pt-3 contact-page-btn-container">
        <?php
$btn_text = esc_html(get_field('get_directions_btn_text'));
$btn_url  = esc_url(get_field('get_directions_btn_link_url'));

echo do_shortcode('[button variant="primary" link="' . $btn_url . '"]' . $btn_text . '[/button]');
?>
      </div>
    </div>

    <div class="col-md-12 col-lg-7 mt-5 mt-lg-0">
      <img
        class="custom-rounded w-100 img-fluid"
        src="<?php echo esc_url(get_field('contact_page_company_photo')); ?>"
      />
    </div>
  </div>
      </div>
    </div>
  </div>
</div>
<div class="container w-100 pt-5 pb-5">
  <?php
get_template_part('partials/map');
?>
</div>

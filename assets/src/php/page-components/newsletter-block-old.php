<?php
	 //- Declare variables for custom logo
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<div class="card newsletter-signup">
  <div class="inner">
    <div class="pairing">
      <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sdsa_logo_bg.svg" loading="lazy" alt="" />
      </figure>
      <div class="form">
        <div class="fields">
          <h1>Get our newsletter</h1>
            <input type="text" placeholder="Your Name" />
            <input type="text" placeholder="Your Email" />
            <input type="submit" class="submit dark" value="Sign me up!">
        </div>
      </div>
    </div>
  </div>
</div><!-- newsletter signup -->

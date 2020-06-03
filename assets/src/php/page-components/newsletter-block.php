<?php
	 //- Declare variables for custom logo
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<div class="card cell large-6 medium-6 small-12 newsletter-signup">
	<div class="grid-x grid-margin-x">
		<figure class="cell large-4 medium-3 small-6">
		    <img src="<?php echo $logo[0]; ?>" loading="lazy" alt="" />
		</figure>
		<div class="form cell large-8 medium-9 small-6">
		    <div class="fields">
				<h1>Get our newsletter</h1>
            	<input type="text" placeholder="Your Name" />
            	<input type="text" placeholder="Your Email" />
            	<input type="submit" class="submit dark" value="Sign me up!">
		    </div>
		</div>
	</div>
</div>
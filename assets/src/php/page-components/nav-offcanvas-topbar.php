<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

	 <?php
	 //- Declare variables for custom logo
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<div class="top-bar hide-for-print" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
			<li><img src="<?php echo $logo[0]; ?>" width="35" height="35" alt="" /> <a href="<?php echo home_url(); ?>" class="dsa-top-name"><?php bloginfo('name'); ?></a></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>
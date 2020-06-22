<?php
// rewrite of nav-offcanvas-topbar to be simpler structure and more css driven
//- Declare variables for custom logo
$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>

<script>
		// toggle functionf or the menu. I know this is hacky but whatevs
function toggleMenuViz() {
  var mobileMenu = document.getElementById("mobileMenu");
  if (mobileMenu.style.display === "none") {
    mobileMenu.style.display = "block";
  } else {
    mobileMenu.style.display = "none";
  }
}
</script>


<header class="header hide-for-print top-bar" id="top-bar-menu" role="banner">

	<!-- home and logo -->
	<ul class="menu top-bar-left float-left">
		<li>
			<img src="<?php echo $logo[0]; ?>" width="35" height="35" alt="" />

				<a href="<?php echo home_url(); ?>" class="top-name"><?php bloginfo('name'); ?></a>
		</li>
	</ul>



	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>
	</div>
	<div class="top-bar-right float-right show-for-small-only menu">
		<button onclick="toggleMenuViz()">
			Menu
		</button>

		<li id="mobileMenu" style="display: none;">
			<?php joints_top_nav(); ?>
		</li>

	</div>



</header>
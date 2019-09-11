<?php
/*
Template Name: Custom Layout
*/
?>

<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="grid-x grid-margin-x">

		    <main id="main" class="cell dsa-readable" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'assets/src/php/page-components/loop', 'page' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>

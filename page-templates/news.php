<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

 <?php
 // WP query
 $wp_query = new WP_Query( array( 'post_type' => 'post', 'orderby' => 'post_id', 'order' => 'DESC' ) );
 ?>

<div id="content" class="archive-page">

	<div id="inner-content" class="grid-container">

		<main id="main" class="grid-x grid-margin-x" role="main">

			<header class="archive-header">
				<h1 class="page-title"> <?php single_term_title(); ?> </h1>
				<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
			</header>
			<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part('assets/src/php/page-components/loop', 'archive'); ?>

				<?php endwhile; ?>

				<?php insert_page_navigation(); ?>

			<?php else : ?>

				<?php get_template_part('assets/src/php/page-components/content', 'missing'); ?>

			<?php endif; ?>

		</main> <!-- end #main -->



	</div> <!-- end #inner-content -->

</div> <!-- end #content -->


<?php get_footer(); ?>
<?php
/*
Template Name: Hompage
*/
?>

<?php get_header(); ?>

	<div id="content">
		<div class="sdsa-2017-frontispiece">

		  <article class="essay">
		    <div class="grid-container">
		    	<?php get_template_part( 'assets/src/php/page-components/content', 'dsaAlertBox' ); ?> <!-- see "DSA Alert Box" metabox in the Page Editor or customize in /assets/src/php/page-components/content-dsaAlertBox.php -->
		      <div class="grid-x grid-margin-x">
		        <div class="plate card cell large-offset-6 large-6 medium-offset-3 medium-9 small-12"><!-- Begin Main Content-->
		        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'assets/src/php/page-components/loop', 'pagealt' ); ?>
					<?php endwhile; endif; ?>
		        </div>
		      </div>
		    </div>
		  </article><!-- end article -->

		  <div class="diptych">
		    <div class="grid-container">
		      <div class="grid-x grid-margin-x">

			<?php
				include( get_template_directory() . '/assets/src/php/page-components/text-carousel-card.php' );

				include( get_template_directory() . '/assets/src/php/page-components/newsletter-block.php' );
			?>

		      </div>
		    </div><!-- end bound -->
		  </div><!-- end diptych -->
		</div><!-- end sdsa-2017-frontispiece -->

		<div id="dsa-home-row-3" class="bg-DSAred">

		<?php include( get_template_directory() . '/assets/src/php/page-components/events-section.php' );
			 //get_template_part( 'assets/src/php/page-components/content', 'events' );
			 ?> <!-- see /assets/src/php/page-components/content-events.php -->
		</div>

		<div id="dsa-home-row-4" class="bg-dark-1">
			<?php get_template_part( 'assets/src/php/page-components/content', 'dispatches' ); ?> <!-- see /assets/src/php/page-components/content-dispatches.php -->
		</div>

	</div> <!-- end #content -->

<?php get_footer(); ?>

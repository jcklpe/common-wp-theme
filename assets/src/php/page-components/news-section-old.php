<div
	id="dsa-home-row-4"
	class="bg-dark-1"
>

	<h1 class="row dsa-home-row-4-edit text-center txt-white">
		News
	</h1>
	<div class="row">
		<?php
					$how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));

					/* Here, we're making sure that the number fetched is reasonable. In case it's higher than 200 or lower than 2, we're just resetting it to the default value of 15. */
					if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 2;

					$my_query = new WP_Query('post_type=post&nopaging=1');
					if($my_query->have_posts()) {
					  echo '<div class="archives-latest-section">';
					  $counter = 1;
					  while($my_query->have_posts() && $counter <= $how_many_last_posts) {
					    $my_query->the_post();
					    ?>
		<div class="large-6 medium-6 small-12 columns">
			<div class="large-12 medium-12 small-12 columns card-gray bdr-stripe-black">

				<h4 class="txt-bold"><a
						href="<?php the_permalink() ?>"
						rel="bookmark"
						title="Read <?php the_title_attribute(); ?>"
					><?php the_title(); ?></a></h4><br />
				<b>By <?php the_author() ?> / <?php the_time('F j, Y') ?></b>
			</div>
		</div>
		<?php
					    $counter++;
					  }
					  echo '</div>';
					  wp_reset_postdata();
					}
					?>
	</div><br>
	<div class="row text-center padding-bottom">
		<?php
   					// Get the ID of a given category
   					$category_id = get_cat_ID( 'dispatches' );

				    // Get the URL of this category
				    $category_link = get_category_link( $category_id );
				?>

		<!-- Print a link to this category -->
		<a
			href="<?php echo esc_url( $category_link ); ?>"
			class="button"
			title="Dispatches"
		>See All</a>
	</div>
</div>

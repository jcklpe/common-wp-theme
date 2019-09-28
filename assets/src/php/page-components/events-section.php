<?php
//- declaring variables for template readability
$events_plugin_isactive = in_array('the-events-calendar/the-events-calendar.php', apply_filters('active_plugins', get_option('active_plugins')));

$calendar_image = get_stylesheet_directory_uri() . "/assets/images/icons/white/calendar.svg" . '"' . "loading='lazy'";

$location_image = get_stylesheet_directory_uri() . "/assets/images/icons/white/location.svg" . '"' . "loading='lazy'";

?>

<div id="events-section" class="info-section">
	<div class="grid-container homepage-events">
		<div class="grid-x grid-margin-x grid-margin-y text-center">
			<img src="<?php echo $calendar_image ?> class=" cell large-2 large-offset-5 medium-4 medium-offset-4 small-6 small-offset-3" />

			<h2 class="section-title txt-white cell">
				Upcoming Events
			</h2>

			<div class="cell grid-x grid-margin-x grid-margin-y">
				<?php // Retrieve the next 2 upcoming events

				if ($events_plugin_isactive) {

					//plugin is activated
					$events = tribe_get_events(array(
						'posts_per_page' => 3, 'start_date' => date('Y-m-d H:i:s', strtotime("-6 hours")),
						// this was in the old one but gotten taken out for some reason
						// 'tax_query'=> array(
						// 	array(
						// 		'taxonomy' => 'tribe_events_cat',
						// 		'field' => 'slug',
						// 		'terms' => 'general'
						// 	   )
						// )
					));

					//REMOVE: I don't know what this function is here for. I'm commenting it out. If nothing breaks over the course of the next couple of months then it should be removed.
					// function empty_content($str)
					// {
					// 	return trim(str_replace('&nbsp;', '', strip_tags($str))) == '';
					// }

					include(get_template_directory() . '/assets/src/php/page-components/events-section-loop.php');
					?>


					<div class="cell text-center">
						<a class="button dark" href="<?php echo home_url(); ?>/events/">
							See All
						</a>
					</div>
				<?php } else {
					echo 'This template uses The Events Calendar plugin. Please install first';
				} ?>
			</div>
		</div>
	</div>
</div>
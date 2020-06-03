<?php

// Loop through the events, displaying the title
// and content for each
foreach ($events as $event) {
    //- loop variables
    $event_description = $event->post_content;

    $event_description_preview = substr($event_description, 0, 290);

    $event_link_full = tribe_get_event_link($event->ID, $full_link = true);

    $event_link = tribe_get_event_link($event->ID);

    $event_date = tribe_events_event_schedule_details($event->ID);

    ?>

    <div class="card cell small-12">
        <h3><?php echo $event_link_full; ?></h3>
        <hr>
        <div class="grid-x grid-margin-x">
            <div class="cell large-7 medium-6 small-12 event-description">
                <p><?php echo $event_description_preview ?>
                    ...

                </p>
                <a href="<?php echo $event_link; ?>" class="button find-out-more">
                    Find out more >
                </a>
            </div>
            <div class="cell large-5 medium-6 small-12 event-details-block">
                <div class="grid-x grid-margin-x date-block">
                    <div class="cell large-3 medium-4 small-3">
                        <a href="<?php echo $event_link ?>">
                            <img src="<?php echo $calendar_image; ?> class='calendar-icon' />
											</a>
										</div>
										<div class=" cell large-9 medium-8 small-9">
                            <p class="event-date">
                                <?php echo $event_date; ?>
                            </p>
                    </div>
                </div>

                <div class="grid-x grid-margin-x location-block">
                    <div class="cell large-3 medium-4 small-3">
                        <a href="<?php echo $event_link ?>">
                            <img src="<?php echo $location_image ?>" />
                        </a>
                    </div>
                    <div class="cell large-9 medium-8 small-9 event-info">
                        <p>
                            <?php echo tribe_get_venue_single_line_address($event->ID, $link = false); ?>
                        </p>

                        <?php if (tribe_show_google_map_link($event->ID)) : ?>
                            <a href="<?php tribe_get_map_link($event->ID) ?>" class="button">Google Map</a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php } ?>
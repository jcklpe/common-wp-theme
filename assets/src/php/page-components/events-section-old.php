<div id="events-section"class="info-section"><div class="row events-section-edit"><div class="text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui-foregrounds/calendar.svg"loading="lazy"width="141"height="141"/><br /><h2 class="dsa-section-title txt-DSAwhite">Upcoming Events</h2></div><?php // Retrieve the next 5 upcoming events

if(in_array('the-events-calendar/the-events-calendar.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    //plugin is activated


    $events=tribe_get_events(array('posts_per_page'=> 2,
            'start_date'=> date('Y-m-d H:i:s', strtotime("-6 hours")),
            'tax_query'=> array(array('taxonomy'=> 'tribe_events_cat',
                    'field'=> 'slug',
                    'terms'=> 'general'
                ))));

    function empty_content($str) {
        return trim(str_replace('&nbsp;', '', strip_tags($str)))=='';
    }

    // Loop through the events, displaying the title
    // and content for each
    foreach ($events as $event) {
        $dsa_event_description=$event->post_content;
        ?><div class="card-gray large-10 large-centered medium-10 medium-centered small-12\">
<h4>echo tribe_get_event_link($event->ID, $full_link=true);
        echo "</h4><hr><div class=\"row\"><div class=\"large-6 medium-6 small-12 column\"><p>";
        echo substr($dsa_event_description, 0, 300);
        echo "...</p><a href=\"";
        echo tribe_get_event_link ($event->ID);
        echo "\" class=\"button\"><b>Find out more &rsaquo;</b></a></div>";
        echo "<div class=\"large-6 medium-6 small-12 column\">";
        echo "<div class=\"row\"><div class=\"large-3 medium-4 small-3 column\"><a href=\"";
        echo tribe_get_event_link ($event->ID);
        echo "\"><img src=\"";
        echo get_stylesheet_directory_uri();
        echo "/assets/images/icons/white/calendar.svg\" loading=\"lazy\" class=\"dsa-calendar-icon\" /></a></div><div class=\"large-9 medium-8 small-9 column\">";
        echo tribe_events_event_schedule_details($event->ID);
        echo "</div></div><br><div class=\"row\"><div class=\"large-3 medium-4 small-3 column\"><a href=\"";
        echo tribe_get_event_link ($event->ID);
        echo "\"><img src=\"";
        echo get_stylesheet_directory_uri();
        echo "/assets/images/icons/white/location.svg\" class=\"dsa-calendar-icon\" loading=\"lazy\" /></a></div><div class=\"large-9 medium-8 small-9 column\">";
        echo tribe_get_venue_single_line_address ($event->ID, $link=false);
        echo "<br>";

        if (tribe_show_google_map_link($event->ID)) {
            echo tribe_get_map_link_html($event->ID);
        }

        echo "</div></div></div></div></div><br>";
    }

    echo "<div class=\"text-center\"><a class=\"button dark\" href=\"https://seattledsa.org/events/\">See All</a></div>";
}

else {
    echo "<div>This template uses The Events Calendar plugin.</div>";
}

?></div></div>
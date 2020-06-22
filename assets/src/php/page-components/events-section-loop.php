<?php

// truncate function to truncate event description preview without breaking the html. Originally from CakePHP

function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
    if (is_array($ending)) {
        extract($ending);
    }
    if ($considerHtml) {
        if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        $totalLength = mb_strlen($ending);
        $openTags = array();
        $truncate = '';
        preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
        foreach ($tags as $tag) {
            if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                    array_unshift($openTags, $tag[2]);
                } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                    $pos = array_search($closeTag[1], $openTags);
                    if ($pos !== false) {
                        array_splice($openTags, $pos, 1);
                    }
                }
            }
            $truncate .= $tag[1];

            $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
            if ($contentLength + $totalLength > $length) {
                $left = $length - $totalLength;
                $entitiesLength = 0;
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entitiesLength <= $left) {
                            $left--;
                            $entitiesLength += mb_strlen($entity[0]);
                        } else {
                            break;
                        }
                    }
                }

                $truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
                break;
            } else {
                $truncate .= $tag[3];
                $totalLength += $contentLength;
            }
            if ($totalLength >= $length) {
                break;
            }
        }

    } else {
        if (mb_strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = mb_substr($text, 0, $length - strlen($ending));
        }
    }
    if (!$exact) {
        $spacepos = mb_strrpos($truncate, ' ');
        if (isset($spacepos)) {
            if ($considerHtml) {
                $bits = mb_substr($truncate, $spacepos);
                preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
                if (!empty($droppedTags)) {
                    foreach ($droppedTags as $closingTag) {
                        if (!in_array($closingTag[1], $openTags)) {
                            array_unshift($openTags, $closingTag[1]);
                        }
                    }
                }
            }
            $truncate = mb_substr($truncate, 0, $spacepos);
        }
    }

    $truncate .= $ending;

    if ($considerHtml) {
        foreach ($openTags as $tag) {
            $truncate .= '</'.$tag.'>';
        }
    }

    return $truncate;
}

// Loop through the events, displaying the title
// and content for each
foreach ($events as $event) {
    //- loop variables
    $event_description = $event->post_content;

    $event_description_preview = truncate($event_description, 290, '...', true, true);

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
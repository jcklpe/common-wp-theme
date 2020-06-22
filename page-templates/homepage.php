<?php
/*
Template Name: Homepage
*/




get_header();

// page variables
$thumb_id = get_post_thumbnail_id();
$thumbURL = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

//- HERO
?>
<figure class="hero">
    <img src="<?php echo $thumbURL[0]; ?>" alt=""></figure>

<div id="content">
    <div id="content" class="grid-container">

        <div id="inner-content" class="grid-x grid-x-margin">

            <main id="main" class="front-page-content cell medium-12 readable" role="main">

                <?php if (have_posts()) : while (have_posts()) : the_post();
                        get_template_part('assets/src/php/page-components/loop', 'page');
                    endwhile;
                endif; ?>

            </main> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->
    <?php

    //NOTE: this is the original components from the Seattle theme componentized out as php template partials but someday these should be converted into actual Gutenberg blocks
    // include( get_template_directory() . '/assets/src/php/page-components/frontpage.php' );

    //NOTE: Someday both of these should be converted to Gutenberg Blocks but right now that's beyond my knowledge. Also it's kinda dicey because the events one realies on The Event Calendar plugin and I'm not really sure how to grab guten from the php stuff through a gutenberg block
    include(get_template_directory() . '/assets/src/php/page-components/events-section.php');

    include(get_template_directory() . '/assets/src/php/page-components/news-section.php');

    ?>
</div> <!-- end #content -->

<?php get_footer(); ?>
<?php
/*
Template Name: Homepage
*/

//TODO: Style front-page hero image
//TODO: separate out scss for individual frontpage components and sassify them.
//TODO: selectively revert back to 2017 style while sassifying component structure and making it possible to switch to alternative style in the future.


 get_header(); ?>

<div id="content">
<?php

include( get_template_directory() . '/assets/src/php/page-components/frontispiece.php' );

include( get_template_directory() . '/assets/src/php/page-components/events-section.php' );

include( get_template_directory() . '/assets/src/php/page-components/news-section.php' );

?>
</div> <!-- end #content -->

<?php get_footer(); ?>

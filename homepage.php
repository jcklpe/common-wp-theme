<?php
/*
Template Name: Homepage
*/

//TODO: separate out scss for individual frontpage components and sassify them.


 get_header(); ?>

<div id="content">
<?php
include( get_template_directory() . '/assets/src/php/page-components/frontispiece.php' );

include( get_template_directory() . '/assets/src/php/page-components/events-section.php' );

include( get_template_directory() . '/assets/src/php/page-components/news-section.php' );

?>
</div> <!-- end #content -->

<?php get_footer(); ?>

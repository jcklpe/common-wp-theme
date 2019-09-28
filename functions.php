<?php // Theme support options
require_once(get_template_directory() . '/assets/src/php/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory() . '/assets/src/php/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory() . '/assets/src/php/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory() . '/assets/src/php/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory() . '/assets/src/php/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory() . '/assets/src/php/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory() . '/assets/src/php/page-components/page-navigation.php');

// Adds support for multiple languages
require_once(get_template_directory() . '/assets/translation/translation.php');

// Add custom metaboxes
require(get_template_directory() . '/assets/src/php/functions/custom-metaboxes.php');

// Add custom settings to admin panel for
require_once(get_template_directory() . '/assets/src/php/functions/custom-global-settings.php');


//- CUSTOM BLOCKS
// This function loads the plugin.
// function load_custom_blocks()
// {
// 	require(get_template_directory() . '/assets/blocks/index.php');
// }

// add_action('enqueue_block_editor_assets', 'load_custom_blocks');









/*
 * Possible solution for Single Event page 404 errors where the WP_Query has an attachment set
 * IMPORTANT: Flush permalinks after pasting this code: http://tri.be/support/documentation/troubleshooting-404-errors/
 * Updated to work with post 3.10 versions
 */
function tribe_attachment_404_fix()
{
	if (class_exists('Tribe__Events__Main')) {
		remove_action('init', array(Tribe__Events__Main::instance(), 'init'), 10);
		add_action('init', array(Tribe__Events__Main::instance(), 'init'), 1);
	}
}

add_action('after_setup_theme', 'tribe_attachment_404_fix');





// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/php/functions/disable-emoji.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/php/functions/editor-styles.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/php/functions/login.php');

// Customize the WordPress admin
require_once(get_template_directory() . '/assets/src/php/functions/admin.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/php/functions/related-posts.php');



// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/php/functions/custom-post-type.php');


//- SECURITY

// disable xmlrpc
add_filter('xmlrpc_enabled', '__return_false');

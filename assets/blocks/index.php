<?php

defined( 'ABSPATH' ) || exit;

//- ADD BLOCK EDITOR ASSETS
add_action( 'enqueue_block_editor_assets', 'block05editor_scripts' );

function block05editor_scripts() {
	wp_enqueue_script(
		'block05editor_scripts',
		get_stylesheet_directory() . '/Jackalope-Gutenberg/05-media-block/block.build.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-editor', 'wp-components' ),
		''
	);



	wp_enqueue_style(
		'block05editor_styles',
		get_stylesheet_directory()  . '/Jackalope-Gutenberg/05-media-block/editor.css',
		array(),
		''
	);
}

//- ADD BLOCK ASSETS FOR FRONTEND
add_action( 'enqueue_block_assets', 'block05frontend_styles' );

function block05frontend_styles() {
	wp_enqueue_style(
		'block05frontend_styles',
		get_stylesheet_directory()  . '/Jackalope-Gutenberg/05-media-block/style.css',
		array(),
		''
	);
}

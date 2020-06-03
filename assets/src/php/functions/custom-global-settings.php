<?php


// echo get_option('welcomemessage');

//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Global Custom Fields</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>My Name:</strong><br />
	<input type="text" name="myname" size="45" value="<?php echo get_option('myname'); ?>" /></p>

	<p><strong>Amazon ID:</strong><br />
	<input type="text" name="amazonid" size="45" value="<?php echo get_option('amazonid'); ?>" /></p>

	<p><strong>Today's Featured Website:</strong><br />
	<input type="text" name="todaysite" size="45" value="<?php echo get_option('todaysite'); ?>" /></p>

	<p><strong>Welcome Text:</strong><br />
	<textarea name="welcomemessage" cols="100%" rows="7"><?php echo get_option('welcomemessage'); ?></textarea></p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="myname,amazonid,todaysite,welcomemessage" />

	</form>
	</div>
	<?php
}

?>
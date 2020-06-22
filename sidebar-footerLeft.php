<div id="footerLeft" class="sidebar sidebar-footer" role="complementary">

	<?php if ( is_active_sidebar( 'footerleft' ) ) : ?>

		<?php dynamic_sidebar( 'footerleft' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<div class="alert help">
		<p><?php _e( '&nbsp;', 'jointswp' );  ?></p>
	</div>

	<?php endif; ?>

</div>
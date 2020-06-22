<footer class="footer padding-tophide-for-print" role="contentinfo">
	<!-- <div class="grid-container"> -->
	<div id="footers-container" class="hide-for-print ">
		<?php get_sidebar('footerLeft'); ?>
		<?php get_sidebar('footerCenter'); ?>
		<?php get_sidebar('footerRight'); ?>
	</div>
	<!-- </div> -->

	<div class="grid-container footer-lastline">
		<nav role="navigation">
			<?php joints_footer_links(); ?>
		</nav>

		<p class="source-org copyright">
				&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
		</p>

	</div> <!-- end #inner-footer -->
</footer> <!-- end .footer -->

<!-- the below tags have matching tags thar are also turned off in the header.php.  -->
<!-- </div> end .main-content -->
<!-- </div> end .off-canvas-wrapper -->

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->
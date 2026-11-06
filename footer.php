<?php
/**
 * The footer template.
 *
 * @package Arsiv
 */
?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<p><?php
		printf(
			/* translators: %s: current year. */
			esc_html__( '© %s', 'arsiv' ),
			esc_html( wp_date( 'Y' ) )
		);
		?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Not found template.
 *
 * @package Arsiv
 */
get_header();
?>
<main id="main-content" class="site-main">
	<section class="error-404">
		<h1><?php esc_html_e( 'Sayfa bulunamadı', 'arsiv' ); ?></h1>
		<p><?php esc_html_e( 'Aradığınız sayfa taşınmış veya kaldırılmış olabilir. Arama yapabilir ya da ana sayfaya dönebilirsiniz.', 'arsiv' ); ?></p>
		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Ana sayfaya dön', 'arsiv' ); ?></a></p>
	</section>
</main>
<?php
get_footer();

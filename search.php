<?php
/**
 * Search results template.
 *
 * @package Arsiv
 */
get_header();
?>
<main id="main-content" class="site-main">
	<header class="page-header">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: search query. */
				esc_html__( 'Arama sonuçları: %s', 'arsiv' ),
				'<span>' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
		<?php get_search_form(); ?>
	</header>
	<?php get_template_part( 'template-parts/archive', 'loop' ); ?>
</main>
<?php
get_footer();

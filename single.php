<?php
/**
 * Single post template.
 *
 * @package Arsiv
 */
get_header();
?>
<main id="main-content" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'single' );
		the_post_navigation(
			array(
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Önceki içerik:', 'arsiv' ) . '</span> %title',
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Sonraki içerik:', 'arsiv' ) . '</span> %title',
			)
		);
	endwhile;
	?>
</main>
<?php
get_footer();

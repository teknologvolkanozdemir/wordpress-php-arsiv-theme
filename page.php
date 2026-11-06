<?php
/**
 * Static page template.
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
	endwhile;
	?>
</main>
<?php
get_footer();

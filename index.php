<?php
/**
 * Main template.
 *
 * @package Arsiv
 */
get_header();
?>
<main id="main-content" class="site-main">
	<header class="page-header">
		<h1 class="page-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
	</header>
	<?php get_template_part( 'template-parts/archive', 'loop' ); ?>
</main>
<?php
get_footer();

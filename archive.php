<?php
/**
 * Archive template.
 *
 * @package Arsiv
 */
get_header();
?>
<main id="main-content" class="site-main">
	<header class="page-header">
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>
	<?php get_template_part( 'template-parts/archive', 'loop' ); ?>
</main>
<?php
get_footer();

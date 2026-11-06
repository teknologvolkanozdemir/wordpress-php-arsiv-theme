<?php
/**
 * Single entry content.
 *
 * @package Arsiv
 */
?>
<article <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<p class="entry-meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php
			$post_type_object = get_post_type_object( get_post_type() );
			if ( $post_type_object ) :
				?>
				<span> · <?php echo esc_html( $post_type_object->labels->singular_name ); ?></span>
			<?php endif; ?>
		</p>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'large',
				array(
					'alt' => arsiv_theme_image_alt( get_post_thumbnail_id() ),
				)
			);
			?>
		<?php endif; ?>
	</header>
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'İçerik sayfaları', 'arsiv' ) . '"><span>' . esc_html__( 'Sayfalar:', 'arsiv' ) . '</span>',
				'after'  => '</nav>',
			)
		);
		?>
	</div>
</article>

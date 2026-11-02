<?php
/**
 * Archive card.
 *
 * @package Arsiv
 */
$post_type_object = get_post_type_object( get_post_type() );
?>
<article <?php post_class( 'archive-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		the_post_thumbnail(
			'large',
			array(
				'class' => 'archive-card__image',
				'alt'   => arsiv_theme_image_alt( get_post_thumbnail_id() ),
			)
		);
		?>
	<?php endif; ?>
	<?php if ( $post_type_object ) : ?>
		<p class="archive-card__type"><?php echo esc_html( $post_type_object->labels->singular_name ); ?></p>
	<?php endif; ?>
	<h2 class="archive-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p class="entry-meta"><time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></p>
	<?php the_excerpt(); ?>
</article>

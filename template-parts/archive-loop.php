<?php
/**
 * Archive loop.
 *
 * @package Arsiv
 */
if ( have_posts() ) :
	?>
	<div class="archive-grid">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'card' );
		endwhile;
		?>
	</div>
	<?php
	the_posts_pagination(
		array(
			'mid_size'           => 1,
			'prev_text'          => esc_html__( 'Önceki sayfa', 'arsiv' ),
			'next_text'          => esc_html__( 'Sonraki sayfa', 'arsiv' ),
			'screen_reader_text' => esc_html__( 'Sayfa bağlantıları', 'arsiv' ),
		)
	);
else :
	get_template_part( 'template-parts/content', 'none' );
endif;

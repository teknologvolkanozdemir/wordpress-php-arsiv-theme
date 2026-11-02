<?php
/**
 * Accessible search form.
 *
 * @package Arsiv
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Arama terimi', 'arsiv' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Ara…', 'search placeholder', 'arsiv' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<button type="submit" class="search-submit"><?php esc_html_e( 'Ara', 'arsiv' ); ?></button>
</form>

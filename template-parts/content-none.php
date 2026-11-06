<?php
/**
 * Message shown when a query has no results.
 *
 * @package Arsiv
 */
?>
<section class="no-results">
	<h2><?php esc_html_e( 'İçerik bulunamadı', 'arsiv' ); ?></h2>
	<p><?php esc_html_e( 'Aramanızı farklı sözcüklerle deneyebilir veya arşivlere göz atabilirsiniz.', 'arsiv' ); ?></p>
	<?php get_search_form(); ?>
</section>

<?php
/**
 * Theme setup and archive content types.
 *
 * @package Arsiv
 */

function arsiv_theme_setup() {
	load_theme_textdomain( 'arsiv', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Ana Menü', 'arsiv' ),
		)
	);
}
add_action( 'after_setup_theme', 'arsiv_theme_setup' );

function arsiv_theme_menu_fallback( $args ) {
	$menu  = '<ul class="menu">';
	$menu .= '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Ana sayfa', 'arsiv' ) . '</a></li>';

	$posts_page_id = (int) get_option( 'page_for_posts' );
	if ( $posts_page_id ) {
		$menu .= '<li class="menu-item"><a href="' . esc_url( get_permalink( $posts_page_id ) ) . '">' . esc_html__( 'Makaleler', 'arsiv' ) . '</a></li>';
	}

	foreach ( array( 'rss_item', 'music_archive', 'video_archive', 'archived_link' ) as $post_type ) {
		$archive_url    = get_post_type_archive_link( $post_type );
		$post_type_object = get_post_type_object( $post_type );

		if ( $archive_url && $post_type_object ) {
			$menu .= '<li class="menu-item"><a href="' . esc_url( $archive_url ) . '">' . esc_html( $post_type_object->labels->name ) . '</a></li>';
		}
	}

	$menu .= wp_list_pages(
		array(
			'echo'     => false,
			'title_li' => '',
		)
	);
	$menu .= '</ul>';

	return $menu;
}

function arsiv_theme_register_archive_types() {
	$types = array(
		'rss_item'     => array(
			'singular' => __( 'RSS İçeriği', 'arsiv' ),
			'plural'   => __( 'RSS İçerikleri', 'arsiv' ),
		),
		'music_archive' => array(
			'singular' => __( 'Müzik', 'arsiv' ),
			'plural'   => __( 'Müzikler', 'arsiv' ),
		),
		'video_archive' => array(
			'singular' => __( 'Video', 'arsiv' ),
			'plural'   => __( 'Videolar', 'arsiv' ),
		),
		'archived_link' => array(
			'singular' => __( 'Bağlantı', 'arsiv' ),
			'plural'   => __( 'Bağlantılar', 'arsiv' ),
		),
	);

	foreach ( $types as $type => $labels ) {
		register_post_type(
			$type,
			array(
				'labels'        => array(
					'name'          => $labels['plural'],
					'singular_name' => $labels['singular'],
					'add_new_item'  => sprintf(
						/* translators: %s: content type singular label. */
						__( 'Yeni %s ekle', 'arsiv' ),
						$labels['singular']
					),
					'edit_item'     => sprintf(
						/* translators: %s: content type singular label. */
						__( '%s düzenle', 'arsiv' ),
						$labels['singular']
					),
				),
				'public'        => true,
				'has_archive'   => true,
				'show_in_rest'  => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
				'rewrite'       => array( 'slug' => sanitize_title( $labels['plural'] ) ),
			)
		);
	}
}
add_action( 'init', 'arsiv_theme_register_archive_types' );

function arsiv_theme_enqueue_styles() {
	wp_enqueue_style(
		'arsiv-theme-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'arsiv_theme_enqueue_styles' );

function arsiv_theme_image_alt( $attachment_id ) {
	$alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );

	if ( '' === trim( (string) $alt ) ) {
		$alt = get_the_title( $attachment_id );
	}

	return $alt;
}

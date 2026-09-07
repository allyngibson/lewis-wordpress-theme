<?php

function lewis_setup() {

	// Enqueue fonts & stylesheets
	add_action( 'wp_enqueue_scripts', 'lewis_styles' );

	// Enqueue Gutenberg fonts & styles
	if ( !function_exists( 'shoreditch_block_editor_styles' ) ) remove_action( 'enqueue_block_editor_assets', 'shoreditch_block_editor_styles', 5 );
	add_action( 'enqueue_block_editor_assets', 'lewis_block_editor_styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Remove Sticky Posts; remove option in composition screens, turn off in db
	update_option( 'sticky_posts' , array() );
	add_action( 'admin_print_styles', 'lewis_hide_sticky' );

	// Activate tags and categories for Pages
	add_action( 'admin_init', 'lewis_tags_for_pages' );

	// Remove image height & width attributes
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	// Add nav menu
	register_nav_menu( 'social', __( 'Social Menu', 'lewis' ) );

	// Delist the default WordPress widgets replaced by custom theme widgets
	add_action('widgets_init', 'lewis_unregister_default_widgets', 11);

	// Adjust number of posts per reload in Infinite Scroll
	add_filter( 'infinite_scroll_settings', 'lewis_infinite_scroll_settings' );

	// Thumbnail & image sizes
	add_image_size( 'lewis-banner', 2000, 1500, true );
	add_image_size( 'fullwidth', 1200, 9999 );

	// Add custom post image size to Media Library
	add_filter( 'image_size_names_choose', 'lewis_custom_sizes' );

	// Post Nav backgrounds
	remove_action( 'wp_enqueue_scripts', 'shoreditch_post_nav_background', 5 );
	add_action( 'wp_enqueue_scripts', 'lewis_post_nav_background' );

	// Hide Featured tag
	add_filter( "term_links-post_tag", 'lewis_filter_tags', 100, 1 );

	// Turn off lazy load of images
	// add_filter( 'wp_lazy_loading_enabled', '__return_false' );
}

add_action( 'after_setup_theme', 'lewis_setup', 15 );

// turn off sticky post functions
function lewis_hide_sticky() {
    global $post_type, $pagenow;
    if( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
        return;
    ?>
    <style type="text/css">#sticky-span { display:none!important }</style>
    <?php
}

// Enqueue styles
// Overwrite parant them function
function shoreditch_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	$fonts[] = 'Montserrat:400,400i,700,700i';
	$fonts[] = 'Eagle Lake:400';
	$fonts[] = 'Inconsolata:400,700';
	$fonts[] = 'Poppins:400,700';

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}


function lewis_styles() {
	wp_enqueue_style( 'lewis_fontawesome', get_stylesheet_directory_uri() . '/fontawesome-4.5.0.min.css' );
	wp_enqueue_style( 'lewis-block-style', get_stylesheet_directory_uri() . '/css/blocks.css' );
}

// Add categories and tags to pages
function lewis_tags_for_pages() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}

// Remove height & width attributes from images added in post screens
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Remove height & width attributes from images added in post screens
function remove_sizes_attribute( $html ) {
   $html = preg_replace( '/(sizes|srcset)="*"\s/', "", $html );
   return $html;
}

// remove two standard WordPress widgets
function lewis_unregister_default_widgets() {
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Recent_Posts');
}

// Remove responsive images
function lewis_removeresponsive() {
	remove_filter( 'the_content', 'wp_make_content_images_responsive' );
}
add_action( 'init', 'lewis_removeresponsive' );

// infinite scroll posts per loop
function lewis_infinite_scroll_settings( $args ) {
	if ( is_array( $args ) )
		$args['posts_per_page'] = 12;
		$args['type'] = 'scroll';
	return $args;
}

// Adds a pretty "Continue Reading" link to custom post excerpts.
function lewis_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . 'Continue reading <span class="meta-nav">&rarr;</span>' . '</a>';
}

function lewis_auto_excerpt_more( $more ) {
	return ' &hellip;' . lewis_continue_reading_link();
}
add_filter( 'excerpt_more', 'lewis_auto_excerpt_more' );

function lewis_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= lewis_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'lewis_custom_excerpt_more' );

// Add custom post image size to Media Library
function lewis_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'fullwidth' => __( 'Full Width Image' ),
	) );
}

// Replace Shoreditch background image
function lewis_background_image() {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'lewis-banner' );

	if ( ! is_array( $image ) ) {
		return;
	}

	printf( ' style="background-image: url(\'%s\');"', esc_url( $image[0] ) );
}

function lewis_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'fullwidth' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); text-shadow: 0 0 0.15em rgba(0, 0, 0, 0.5); }
			.post-navigation .nav-previous .post-title,
			.post-navigation .nav-previous a:focus .post-title,
			.post-navigation .nav-previous a:hover .post-title { color: #fff; }
			.post-navigation .nav-previous .meta-nav { color: rgba(255, 255, 255, 0.75); }
			.post-navigation .nav-previous a { background-color: rgba(0, 0, 0, 0.2); border: 0; }
			.post-navigation .nav-previous a:focus,
			.post-navigation .nav-previous a:hover { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'fullwidth' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); text-shadow: 0 0 0.15em rgba(0, 0, 0, 0.5); }
			.post-navigation .nav-next .post-title,
			.post-navigation .nav-next a:focus .post-title,
			.post-navigation .nav-next a:hover .post-title { color: #fff; }
			.post-navigation .nav-next .meta-nav { color: rgba(255, 255, 255, 0.75); }
			.post-navigation .nav-next a { background-color: rgba(0, 0, 0, 0.2); border: 0; }
			.post-navigation .nav-next a:focus,
			.post-navigation .nav-next a:hover { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'shoreditch-style', $css );
}

// Replace Jetpack Featured Content query
function lewis_featured_posts() {
	$featured_posts = get_posts( array(
		'numberposts' => 6,
		'post_type'   => 'post',
		'suppress_filters' => false,
		'tax_query'   => array(
			array(
				'field'    => 'term_id',
				'taxonomy' => 'prominence',
				'terms'    => 'featured',
				),
			),
		) );
	return $featured_posts;
}

// Hide Featured tag
function lewis_filter_tags( $term_links ) {
    $result = array();
    $exclude_tags = array( 'featured' );
    foreach ( $term_links as $link ) {
        foreach ( $exclude_tags as $tag ) {
            if ( stripos( $link, $tag ) !== false ) continue 2;
        }
        $result[] = $link;
    }
    return $result;
}

// Register Gutenberg fonts & styling for editor
function lewis_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'lewis-block-editor-style', get_stylesheet_directory_uri() . '/css/editor-blocks.css' );

	// Font styles.
	wp_enqueue_style( 'lewis-fonts', shoreditch_fonts_url(), array(), null );
}

?>

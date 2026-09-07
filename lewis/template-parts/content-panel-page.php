<?php
/**
 * Template part for displaying page content in panel-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lewis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); lewis_background_image(); ?>>
	<?php $headline = get_post_meta( $post->ID, 'show-headline', $single = true ); ?>
	<div class="hentry-wrapper">
		<?php if ( $headline !== '' ) { ?>
		<header class="entry-header">
			<?php
			if ( $post->post_parent > 0 ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			} else {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
			?>
		</header><!-- .entry-header -->
		<?php } ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shoreditch' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'shoreditch' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'shoreditch' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
		?>
	</div><!-- .hentry-wrapper -->
</article><!-- #post-## -->

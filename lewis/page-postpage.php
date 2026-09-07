<?php
/*
Template Name: Custom -- Post to Page
 *
 * @package Lewis
 *
 * This template will allow you to convert a blog post
 * into a static page.  Place the Post ID in the post's
 * content field, and the resulting page will use the
 * title given in the Page management area along with the
 * post content.
 *
 * NOTE: The page will not use the post's original thumbnail/
 * featured image.
 *
 */

get_header(); ?>

	<?php the_post(); ?>
	<?php get_template_part( 'template-parts/content', 'hero' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="hentry-wrapper">
					<?php if ( ! has_post_thumbnail() ) : ?>
						<header class="entry-header" <?php shoreditch_background_image(); ?>>
							<div class="entry-header-wrapper">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</div><!-- .entry-header-wrapper -->
						</header><!-- .entry-header -->
					<?php endif; ?>

					<div class="entry-content">
						<?php
							$post_id = get_the_content();
							$queried_post = get_post($post_id);
							$content = $queried_post->post_content;
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							echo $content;
						?>
						<hr width="75%" />
						<p><i>Originally published <a href="<?php echo get_permalink( $queried_post ); ?>">here</a>.</i></p>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shoreditch' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'shoreditch' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) ); ?>
					</div><!-- .entry-content -->

				</div><!-- .hentry-wrapper -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>
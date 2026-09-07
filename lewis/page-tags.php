<?php
/*
Template Name: Tags
 *
 * @package Iona
 *
 * The template for displaying a tag cloud.
 */

get_header();
the_post();
$tagcloud = get_the_content(); ?>

	<?php get_template_part( 'template-parts/content', 'hero' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="hentry-wrapper">
					<?php if ( ! has_post_thumbnail() ) : ?>
						<header class="entry-header" <?php shoreditch_background_image(); ?>>
							<div class="entry-header-wrapper">
								<h1 class="entry-title"><?php _e('Tag Cloud'); ?></h1>
							</div><!-- .entry-header-wrapper -->
						</header><!-- .entry-header -->
					<?php endif; ?>

					<div class="entry-content">
						<?php if ( $tagcloud == "wpcom" && function_exists( 'wpcom_tag_cloud' ) ) {
								wpcom_tag_cloud( 'smallest=10&largest=40&number=500&orderby=name' );
							} else {
								wp_tag_cloud( 'smallest=10&largest=40&number=500&orderby=name' );
						} ?>					
			   </div><!-- .entry-content -->

				</div><!-- .hentry-wrapper -->
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>
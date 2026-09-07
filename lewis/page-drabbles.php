<?php
/**
Template Name: Custom -- Drabble Archive
 *
 * This is the template that displays drabble archives.
 * When using this page, put the slug for the Short Fiction category
 * into the content window.  The page will pull that and build a
 * loop from what's entered there.
 */

get_header(); ?>
<?php remove_action('pre_get_posts', 'allyngibson_drabble_exclude'); ?>
<?php the_post(); ?>
<?php $drabbleslug = get_the_content(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content', 'hero' ); ?>
	<?php endwhile; ?>

	<div class="site-content-wrapper">
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
							<?php wp_reset_query(); ?>
							<?php $drabble = query_posts( array(
								'tax_query' => array(
									array(
										'taxonomy' => 'short-fiction',
										'field' => 'slug',
										'terms' => $drabbleslug
									)
								),
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => -1 ) );
							?>
							<?php if ( have_posts() ) : ?>

							<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post(); ?>
									<div class="post-inner">
										<div class="post-content">
											<h2 class="entry-title"><?php the_title(); ?></h2>
											<?php the_content(); ?>
										</div> <!-- /post-content -->
										<div class="clear"></div>
									</div> <!-- /post-inner -->
								<?php endwhile;

							else : ?>

								<div class="post-inner">
									<h2 class="entry-title">Nothing Found</h2>
									<div class="post-content">
										<p>Apologies, but no drabbles were found!</p>
									</div><!-- .post-content -->
								</div>

							<?php endif; ?>

						</div><!-- .entry-content -->

					</div><!-- .hentry-wrapper -->
				</article><!-- #post-## -->

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .site-content-wrapper -->

<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>
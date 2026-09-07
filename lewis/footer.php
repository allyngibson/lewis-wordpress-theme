<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lewis
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-wrapper">
			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<div class="lewis-social-navigation">
					<ul class="social-menu">
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=>	'social',
									'container'			=>	'',
									'container_class'	=>	'menu-social',
									'items_wrap'		=>	'%3$s',
									'menu_id'			=>	'menu-social-items',
									'menu_class'		=>	'menu-items',
									'depth'				=>	1,
									'link_before'		=>	'<span class="screen-reader-text">',
									'link_after'		=>	'</span>',
									'fallback_cb'		=>	'',
								)
							);
						?>
					</ul> <!-- /social-menu -->
				</div>
			<?php endif; ?>

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'shoreditch' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'shoreditch' ), 'WordPress' ); ?></a>
				<span class="sep">/</span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'shoreditch' ), 'Shoreditch', '<a href="https://wordpress.com/themes/" rel="designer">Automattic</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .site-footer-wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

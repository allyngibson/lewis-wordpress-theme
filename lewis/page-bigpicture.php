<?php
/**
 * Template Name: HTML5 UP! Big Picture
 * 	Big Picture by HTML5 UP
 * 	html5up.net | @ajlkn
 * Adapted to Wordpress by Allyn Gibson, February-March 2021
 * 	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
 *
 * @package Iona 2021
 */

global $wp_query;
$intro_img_url = get_the_post_thumbnail_url( $wp_query->post->ID, 'lewis-banner');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/css/main.css" />
		<?php 	wp_enqueue_style( 'lewis-fonts', shoreditch_fonts_url(), array(), null ); ?>
		<style>
			#intro {
			background: url("<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/css/images/overlay.png"), url("<?php echo( $intro_img_url ); ?>");
			background-size: 256px 256px, cover;
			background-attachment: fixed, fixed;
			background-position: top left, bottom center;
			background-repeat: repeat, no-repeat;
		}
		</style>
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<noscript><link rel="stylesheet" href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1><?php bloginfo('name'); ?></h1>
				<nav>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => '',
							'menu_class'     => '',
							'depth'          => 1,
						) );
					?>
				</nav>
			</header>

			<?php while (have_posts()) : the_post(); ?>
		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content">
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					<?php the_content();?>
					<footer>
						<a href="#one" class="button style2 down">More</a>
					</footer>
				</div>
			</section>
		<?php endwhile; ?>

		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>What I Do</h2>
					</header>
					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
					id varius justo euismod in. Curabitur egestas consectetur magna.</p>
				<a href="#" class="button right">Link</a>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>

		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Who I Am</h2>
					</header>
					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
					id varius justo euismod in. Curabitur egestas consectetur magna.</p>
				<a href="#" class="button right">Link</a>
				</div>
				<a href="#three" class="button style2 down anchored">Next</a>
			</section>

		<!-- Three -->
			<section id="three" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>What I Write</h2>
					</header>
					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
					id varius justo euismod in. Curabitur egestas consectetur magna.</p>
				<a href="#" class="button right">Link</a>
				</div>
				<a href="#four" class="button style2 down anchored">Next</a>
			</section>

		<!-- Four -->
			<section id="four" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Where I Work</h2>
					</header>
					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
					id varius justo euismod in. Curabitur egestas consectetur magna.</p>
				<a href="#" class="button right">Link</a>
				</div>
				<a href="#work" class="button style2 down anchored">Next</a>
			</section>

		<!-- Work -->
			<section id="work" class="main style3 primary">
				<div class="content">
					<header>
						<h2>My Work</h2>
						<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
						Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis
						arcu, id varius justo euismod in. Curabitur egestas consectetur magna vitae.</p>
					</header>

					<!-- Gallery  -->
						<div class="gallery">
							<article class="from-left">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/01.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/01.jpg" title="The Anonymous Red" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/02.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/02.jpg" title="Airchitecture II" alt="" /></a>
							</article>
							<article class="from-left">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/03.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/03.jpg" title="Air Lounge" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/04.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/04.jpg" title="Carry on" alt="" /></a>
							</article>
							<article class="from-left">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/05.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/05.jpg" title="The sparkling shell" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/fulls/06.jpg" class="image fit"><img src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/images/thumbs/06.jpg" title="Bent IX" alt="" /></a>
							</article>
						</div>

				</div>
			</section>

		<!-- Contact -->
			<section id="contact" class="main style3 secondary">
				<div class="content">
					<header>
						<h2>Say Hello.</h2>
						<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.</p>
					</header>
					<div class="box">
						<form method="post" action="#">
							<div class="fields">
								<div class="field half"><input type="text" name="name" placeholder="Name" /></div>
								<div class="field half"><input type="email" name="email" placeholder="Email" /></div>
								<div class="field"><textarea name="message" placeholder="Message" rows="6"></textarea></div>
							</div>
							<ul class="actions special">
								<li><input type="submit" value="Send Message" /></li>
							</ul>
						</form>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">

				<!-- Icons -->
					<ul class="icons">
						<li><a href="mailto:allyn@allyngibson.net" class="icon brands fa-envelope"><span class="label">Email</span></a></li>
						<li><a href="https://www.amazon.com/gp/profile/amzn1.account.AGVUEY3GWNG7GG2OPAK6CG6E73UA" class="icon brands fa-amazon"><span class="label">Amazon</span></a></li>
						<li><a href="https://ello.co/allyngibson" class="icon brands fa-ello"><span class="label">Ello</span></a></li>
						<li><a href="https://www.facebook.com/allyngibson1973" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="https://instagram.com/allyngibson/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="http://www.last.fm/user/allyngibson" class="icon brands fa-lastfm-square"><span class="label">last.fm</span></a></li>
						<li><a href="https://www.linkedin.com/pub/allyn-gibson/36/7a4/9a2" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						<li><a href="https://twitter.com/allyngibson" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					</ul>

				<!-- Menu -->
					<ul class="menu">
						<li>&copy; <?php bloginfo('name'); ?></li>
						<li>Design by <a href="https://html5up.net">HTML5 UP</a></li>
						<li>Proudly powered by <a href="https://wordpress.org/">WordPress</a></li>
					</ul>

			</footer>

	<!-- Scripts -->
			<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/jquery.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/jquery.poptrox.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/jquery.scrolly.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/jquery.scrollex.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/browser.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/breakpoints.min.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/util.js"></script>
<script src="<?php echo( get_theme_root_uri() ); ?>/html5up-big-picture/assets/js/main.js"></script>

</body>
</html>


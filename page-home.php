<?php
/**
 * Template Name: Home Page
 *
 * This is the custom home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package V12_Fitness
 */

get_header('home');
?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
			
			<div class="home-landing">
				<div class="landing-text" id="landing-v">V</div>
				<img id="ripped-guy-landing" src="/wp-content/themes/v12-fitness/src/img/v12-4.jpg"></img>
				<div class="landing-text">12</div>
			</div><!-- .home-landing -->
			<div class="landing-fitness-text-container">
				<div id="landing-fitness-text">FITNESS</div>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('home'); 
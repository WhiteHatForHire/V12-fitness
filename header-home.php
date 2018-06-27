<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package V12_Fitness
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site home-page">

			<?php>`	<?php
		wp_nav_menu([
			'menu'            => 'left-side',
			'theme_location'  => 'left-side',
			'container' 	  => 'div',
			// 'container_id'    => 'bs4navbar',
			'container_class' => 'static-side-nav',
			// 'menu_id'	      => 'main-menu',
			// 'menu_class'	  => 'navbar-nav ml-auto',
			'depth' 		  => 2,
			// 'fallback_cb'	  => 'bs4navwalker::fallback',
			// 'walker'		  => new bs4navwalker()
		]);
		?>


	<div id="content" class="site-content row">

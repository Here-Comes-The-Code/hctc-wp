<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hctc_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="l_site__header">
			<div class='c-logo'>
				<?php the_custom_logo(); ?>
			</div>
			<nav id="site-navigation" class="c-nav js-nav main-navigation is-not-active">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-1',
					'container'		 =>	'none',
					'menu_id'        => 'primary-menu',
					'menu_class' 	 => 'c-nav'
				));
				?>
			</nav>
		</header>
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
$acf = get_field('contact-info', 'options');

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
		<header id="masthead" class="l-site__header">
			<div class='l-site__top-bar c-top-bar'>
				<!-- top-bar-content -->
				<a class=' c-top-bar__data c-header--icon-map-marker' target="_blank" href="https://www.google.com/maps/search/?api=1&zoom=5&query=<?php echo urlencode(strip_tags($acf['address'])) ?> ">
					<?php echo $acf['address'] ?>
				</a>
				<a class='c-top-bar__data  c-header--icon-phone ' href="tel:<?php echo $acf['phone'] ?>"><?php echo $acf['phone'] ?></a>
				<a class='c-top-bar__data  c-header--icon-envelope' href="mailto:<?php echo $acf['e-mail'] ?>"><?php echo $acf['e-mail'] ?></a>
			</div>
			<div class='l-site__header-main'>
				<div class='c-logo'>
					<?php the_custom_logo(); ?>
				</div>
				<button class='c-btn c-btn--primary c-nav--mobile-btn js-mobile-nav-trigger '>
					<i class="las la-bars"></i>
				</button>
				<nav id="site-navigation" class="c-nav js-nav">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'container'		 =>	'none',
						'menu_id'        => 'primary-menu',
						'menu_class' 	 => 'c-nav__menu'
					));
					?>
				</nav>
			</div>
		</header>
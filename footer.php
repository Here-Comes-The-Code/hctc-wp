<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hctc_theme
 */
$acf = get_field('contact-info', 'options');
$year = date('Y');
?>

<footer id="colophon" class="site-footer l-site__footer">

	<div class='c-footer__content'>
		<div class='c-footer__content-col c-nav--footer'>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'container'		 =>	'none',
				'menu_id'        => 'primary-menu',
				'menu_class' 	 => 'c-nav__menu--footer c-footer--icon-sitemap'
			));
			?>
		</div>
		<div class='c-footer__content-col'>
			<p class='c-footer--icon-info'>
				<strong>
					<?php echo $acf['company-name'] ?>
				</strong>
			</p>
			<p><?php echo $acf['name'] ?></p>
		</div>
		<div class='c-footer__content-col'>
			<!-- expect wysiwyg, no html -->
			<a class='c-footer--icon-map-marker' target="_blank" href="https://www.google.com/maps/search/?api=1&zoom=5&query=<?php echo urlencode(strip_tags($acf['address'])) ?> ">
				<?php echo $acf['address'] ?>
			</a>
		</div>
		<div class='c-footer__content-col'>
			<p><a class='c-footer--icon-envelope' href="mailto:<?php echo $acf['e-mail'] ?>"><?php echo $acf['e-mail'] ?></a></p>
		</div>
		<div class='c-footer__content-col'>
			<p><a class='c-footer--icon-phone ' href="tel:<?php echo $acf['phone'] ?>"><?php echo $acf['phone'] ?></a></p>
		</div>
	</div>
	<div class='c-footer__bottom'>
		Copyrights © AS Projekt, <?php echo $year ?>
		<a class='c-link c-link--author'>
			herecomesthecode
		</a>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
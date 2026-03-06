<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--	<meta name="viewport" content="width=1280">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="https://svetlyachok.info/wp-content/uploads/2017/09/%D1%81%D0%B2%D0%B5%D1%82%D0%BB%D1%8F%D1%87%D0%BE%D0%BA-%D0%B2%D0%B5%D0%BA%D1%82%D0%BE%D1%80-%D0%BB%D0%BE%D0%B3%D0%BE-CRV-11.png" />
    <? if(0) { ?>
	    <title>Reflective products in bulk and on order | Reflective products - USA Firefly</title>
    <? } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='/wp-content/themes/firefly/css/owl.carousel.min.css' type='text/css' media='all' />
	<link rel='stylesheet' href='/wp-content/themes/firefly/css/owl.theme.default.min.css' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="/dist/jquery.fancybox.css" media="screen" />
	<link rel='stylesheet' href='/wp-content/themes/firefly/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='/wp-content/themes/firefly/style-2.css' type='text/css' media='all' />
	<?php wp_head(); ?>
    <style>
        /* @supports (background-image: url('/wp-content/themes/firefly/i/newgif.webp')) {
            .image.webpcheck{
                background-image: url('/wp-content/themes/firefly/i/newgif.webp');
            }
        } */
        .image.webpcheck
        {
            background-image:url("/wp-content/uploads/2024/03/production-mini.jpg");
        }
    </style>
</head>

<body <?body_class()?>>
<div class="almost-header"></div>
<div class="mobile-menu">
	<span class="mobile-menu-closer"></span>
	<?if(wpm_get_language() == 'en') { ?>
		<?php if ((is_front_page()) and (!is_paged())) : ?>
			<nav data-anchors>
				<ul>
					<li><a href="#link_block">Product</a></li>
					<li><a href="#quality">Quality</a></li>
					<li><a href="#shema">How to receive your order</a></li>
					<li><a href="#skid">Discounts</a></li>
					<li><a href="#contacts">Contact details</a></li>
				</ul>
			</nav>
		<?php else : ?>
			<nav data-anchors>
				<ul>
					<li><a href="/#link_block">Product</a></li>
					<li><a href="/#quality">Quality</a></li>
					<li><a href="/#shema">How to receive your order</a></li>
					<li><a href="/#skid">Discounts</a></li>
					<li><a href="/#contacts">Contact details</a></li>
				</ul>
			</nav>
		<?php endif; ?>
	<? } else { ?>
		<?php if ((is_front_page()) and (!is_paged())) : ?>
			<nav data-anchors>
				<ul>
					<li><a href="#link_block">Product</a></li>
					<li><a href="#quality">Quality</a></li>
					<li><a href="#shema">How to receive your order</a></li>
					<li><a href="#skid">Discounts</a></li>
					<li><a href="#contacts">Contact details</a></li>
				</ul>
			</nav>
		<?php else : ?>
			<nav data-anchors>
				<ul>
					<li><a href="/#link_block">Product</a></li>
					<li><a href="/#quality">Quality</a></li>
					<li><a href="/#shema">How to receive your order</a></li>
					<li><a href="/#skid">Discounts</a></li>
					<li><a href="/#contacts">Contact details</a></li>
				</ul>
			</nav>
		<?php endif; ?>
	<? } ?>
</div>
<header class="fixed">

	<?if(wpm_get_language() == 'en' || is_front_page()): //Локализация?>
		<div class="container">
			<div class="header-content">
				<div class="logo">
					<a href="/">
                        <img src="<?= get_field('logo',7) ?>" alt="USAfirefly logo">
						<div class="header">USA Firefly</div>
                    </a>
				</div>

				<?php if ((is_front_page()) and (!is_paged())) : ?>
					<nav data-anchors>
						<a href="#link_block">Product</a>
						<a href="#quality">Quality</a>
						<a href="#shema">How to receive your order</a>
						<a href="#skid">Discounts</a>
						<a href="#contacts">Contact details</a>
					</nav>
				<?php else : ?>
					<nav data-anchors>
						<a href="/#link_block">Product</a>
						<a href="/#quality">Quality</a>
						<a href="/#shema">How to receive your order</a>
						<a href="/#skid">Discounts</a>
						<a href="/#contacts">Contact details</a>
					</nav>
				<?php endif; ?>

				<div class="contacts">
					<div class="phone">
						<a href="#" onclick="return false;" data-toggle="modal" data-target="#callback" >+1-727-989-00-35</a>
					</div>
					<a href="#" onclick="return false;" data-toggle="modal" data-target="#callback" class="y-but call-but">Request a phone call</a>
					<? //echo my_site_custom_languages_selector_template();?>
				</div>
				<div class="mobile-menu-opener"></div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?else:?>
		<div class="container">
			<div class="header-content">
				<div class="logo">
					<a href="/"><img src="<?= get_field('logo',7) ?>" alt="USAfirefly logo">
					<div class="header">USAfirefly</div></a>
				</div>
				<?php if ((is_front_page()) and (!is_paged())) : ?>
					<nav data-anchors>
						<a href="#link_block">Product</a>
						<a href="#quality">Quality</a>
						<a href="#shema">How to receive your order</a>
						<a href="#skid">Discounts</a>
						<a href="#contacts">Contact details</a>
					</nav>
				<?php else : ?>
					<nav data-anchors>
						<a href="/#link_block">Product</a>
						<a href="/#quality">Quality</a>
						<a href="/#shema">How to receive your order</a>
						<a href="/#skid">Discounts</a>
						<a href="/#contacts">Contact details</a>
					</nav>
				<?php endif; ?>
				<div class="contacts">
					<div class="phone">
						<? if(isMobile()) {?>
							<a href="tel:<?= '+1-727-989-00-35' ?>"><?= '+1-727-989-00-35' ?></a>
						<? } else { ?>
							<a href="#" onclick="return false;" data-toggle="modal" data-target="#callback" ><?= '+1-727-989-00-35' ?></a>
						<? } ?>
					</div>
					<a href="#" onclick="return false;" data-toggle="modal" data-target="#callback" class="y-but call-but">Request a phone call</a>
					<? //echo my_site_custom_languages_selector_template();?>
				</div>
				<div class="clearfix"></div>
				<div class="mobile-menu-opener"></div>
			</div>
		</div>
	<?endif;?>

</header>

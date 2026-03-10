<?php
$uid = get_the_ID();
if (!$uid) {
    $uid = 7;
}

/**
 * Anti-spam signed token (must match footer.php + mail.php)
 * Only safe chars: A-Z a-z 0-9 _
 */
$ff_secret = 'Sv3tly4ch0k_2026_SpamShield_f9A7KpQm2R8XwZ';
$ff_ts = time();
$ff_ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ff_token = hash_hmac('sha256', $ff_ts . '|' . $ff_ua, $ff_secret);
$ff_is_en = true;
?>

<section id="banner" >

	<div class="banner" style="background-image:url(<?= get_field('img',$uid); ?>);">
		<div class="container">
			<div class="titile"><?= get_field('title',$uid); ?></div>		
			<div class="stats">					
				<?php if($ff_is_en):?>		
				<?php $table = get_field( 'sets_en',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php   foreach ( $table['body'] as $tr ) {  ?>
							<?php      foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>
				<?php else:?>	
				<?php $table = get_field( 'sets',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php   foreach ( $table['body'] as $tr ) {  ?>
							<?php      foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>	
				<?php endif;?>				
			</div>
			<div <?php if($ff_is_en): //Локализация?>id="action-eng"<?php endif;?> class="action">
				<!-- <div class="text-action"><?= get_field('action',$uid); ?></div> -->
				<div><a href="#" onclick="$(`#get_it [name='reason']`).val('Запрос прайс-листа (верхний баннер)'); return false;" data-toggle="modal" data-target="#get_it" class="y-but get-price"><?php if($ff_is_en):?>Request a Price List<?php else:?>Request a Price List<?php endif;?></a></div>
			</div>
		</div>
	</div>
</section>

<a name="link_block"></a>
<section id="link_block" >
	
	<div class="container">
		<div class="titile"><?php if($ff_is_en): //Локализация?>COMPLETE PRODUCT LINE<?php else:?>COMPLETE PRODUCT LINE<?php endif;?></div>		
		<div class="link_block">				
			<a class="item" href="<?php if($ff_is_en): //Локализация?>/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?php else:?>/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?php endif;?>">
				<span class="image first-image">
                    <img
                            src="<?php  bloginfo('template_url')?>/imgs/l1.jpg" alt=""
                            srcset="<?php  bloginfo('template_url')?>/imgs/l1.jpg 320w, <?php  bloginfo('template_url')?>/imgs/l1.jpg 480w"
                            sizes="(max-width: 320px) 320px, (max-width: 480px) 480px, 604px"
                    >
                </span>
				<span class="name"><?php if($ff_is_en): //Локализация?>REFLECTIVE COMPONENTS<br>FOR APPAREL MANUFACTURERS<?php else:?>REFLECTIVE COMPONENTS<br>FOR APPAREL MANUFACTURERS<?php endif;?></span>
			</a>
			<a class="item" href="<?php if($ff_is_en): //Локализация?>/category/produkciya/reflective-product/<?php else:?>/category/produkciya/reflective-product/<?php endif;?>">
				<span class="image webpcheck" style="">
				</span>
				<span class="name"><?php if($ff_is_en): //Локализация?>REFLECTIVE PRODUCT CATALOG<?php else:?>REFLECTIVE PRODUCT CATALOG<?php endif;?></span>
			</a>
		</div>
	</div>

</section> 


<!-- Убрали отсюда -->


<section id="about">
	<div class="container">
		<div class="about-content">
			<div class="left-60">
				<div class="left-line"><h2><?= get_field('about-title', $uid); ?></h2></div>
				<div class="text"><?= get_field('about-text', $uid); ?></div>
				<?php  if(0) {?>
					<div class="a-ats">
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at-icon', $uid); ?>"><p><?= get_field('at-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at2-icon', $uid); ?>"><p><?= get_field('at2-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at3-icon', $uid); ?>"><p><?= get_field('at3-text', $uid); ?></p></div>
					</div>
					<div>
						<?php if(0): //force founder-photo variant?>
						<?php else:?>
						<?php  foreach(acf_photo_gallery('cerf', get_the_ID()) as $cerf) { ?>
						<a class="attachment_href" target="_blank" href="<?= $cerf['full_image_url']; ?>">
							<?php if(stristr($cerf['title'], '[:ru]')):?>
							<?php  preg_match('~\[:'.wpm_get_language().'\](.+?)\[~', $cerf['title'], $matches);print_r($matches[1]); ?>
							<?php else:?>
							<?= $cerf['title']?>
							<?php endif;?>
						</a>
						<?php  } ?>
						<?php endif;?>
					</div>
				<?php  } ?>
			</div>
			<?php if(0): //force founder-photo variant?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
					<div class="round-banner">
						<div class="round-banner-part1">
							<div class="round-banner-header">500+</div>
							<div class="round-banner-text">Product SKUs</div>
						</div>
						<div class="round-banner-part2">
							<div class="round-banner-header">2 sec</div>
							<div class="round-banner-text">To remember our name</div>
						</div>
						<div class="round-banner-part3">
							<div class="round-banner-header">#1</div>
							<div class="round-banner-text">For response speed</div>
						</div>
						<div class="round-banner-part4">
							<div class="round-banner-header">100%</div>
							<div class="round-banner-text">We love our products, too</div>
						</div>
					</div>
				</div>
			<?php else:?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
					<div class="director-photo">
						<img src="https://svetlyachok.info/wp-content/themes/firefly/imgs/dir_photo.jpg" alt="Photo CEO">
					</div>
					<div class="round-banner">
						<div class="round-banner-part1">
							<div class="round-banner-header">#1</div>
							<div class="round-banner-text">For response speed</div>
						</div>
						<div class="round-banner-part2">
							<div class="round-banner-header">2 sec</div>
							<div class="round-banner-text">To remember our name</div>
						</div>
						<div class="round-banner-part3">
							<div class="round-banner-header">100%</div>
							<div class="round-banner-text">We love our products, too</div>
						</div>
						<div class="round-banner-part4">
							<div class="round-banner-header">500+</div>
							<div class="round-banner-text">Product SKUs</div>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<section id="otzivi">
	<div class="container">
		<div class="def-title center"><h2><?= get_field('otziv-title', $uid); ?></h2></div>
		<?php  $bens = get_field('otzivs', $uid); ?>
		<div class="otzivs">
			<div class="owl-carousel owl-otzivs">
				<?php if (is_array($bens) || $bens instanceof Traversable) { foreach($bens as $ben) { ?>
					<div class="otziv">
						<div>
							<div class="otziv-name"><?= get_field('otziv-name', $ben); ?></div>
							<div class="otziv-text text"><?= get_field('otziv-text', $ben); ?></div>
						</div>
						<div class="otziv-meta">

                            <div class="left">
                                <?php if(get_field('otziv-logo', $ben)) {?>
                                    <img src="<?= get_field('otziv-logo', $ben); ?>" data-nopreview="true" alt="отзывы о компании <?= get_field('otziv-name', $ben); ?>">
                                <?php  } ?>
                                <div class="text"><?= get_field('otziv-city', $ben); ?></div>
                            </div>

							<div class="right">
								<?php  if(get_field('otziv-phone', $ben)) {?>
									<p class="text text-right"><span>Тел:</span>  <?= get_field('otziv-phone', $ben); ?></p>
								<?php  } ?>
								<p class="text text-right">  <?= get_field('otziv-spec', $ben); ?></p>
								<p class="text text-right">  <?= get_field('otziv-fio', $ben); ?></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php }} ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</section>

<section id="shema">
	<div class="container center">
		<div class="def-title center"><h2><?= get_field('shema-title', $uid); ?></h2></div>
		<div class="shema-line">
			<div class="shema-block">
				<img class="lazy_loading" src="<?php  bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema1-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php  bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema2-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php  bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema3-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php  bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema4-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php  bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema5-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema5-text', $uid); ?></p>
			</div>
		</div>
		<div class="schema-button">
			<a href="#" onclick="return false;" data-toggle="modal" data-target="#order-popup" class="y-but call-but">Submit a Request</a>
		</div>
	</div>
</section>

<section id="quality">
	<div class="container">
		<div class="def-title center"><h2><?= get_field('quality-title', $uid); ?></h2></div>
		<div class="quality-content">
			<div class="quality__img">
				<img src="<?= get_field('quality-img', $uid); ?>" alt="">
			</div>
			<div class="quality__text">
				<?= get_field('quality-text', $uid); ?>
			</div>
		</div>
	</div>
</section>

<?php if(0): //keep full discount+gif block?>
<section id="skid">
	<div class="bg" <?php  if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<?php  } ?>>
		<div class="container">
			<div class="left-line"><h2>Delivery to any place in the World</h2></div>
		</div>
	</div>
</section>
<?php else:?>
<section id="skid">
	<div class="bg" <?php  if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<?php  } ?>>
		<div class="container">
			<div class="left-line"><h2><?= get_field('skid-title', $uid); ?></h2></div>
			<div class="skid-content">
				<div class="skid-wrap">
					<div class="text"><?= get_field('skid-verh', $uid); ?></div>
					<div class="skid-table">
					<table>
					<?php $table = get_field( 'skid-table',$uid ); ?>
						<?php if ( $table ) {  ?>
							<?php   foreach ( $table['body'] as $tr ) {
								echo '<tr>'; ?>
								<?php   $i=0;   foreach ( $tr as $td ) {
									if ($i==0) {	echo '<td class="cen">'; } else{ 	echo '<td>';}
									echo $td['c'];
									echo '</td>';
									$i++;
							} echo '</tr>'; }}   ?>
					</table>
				</div>
					<div class="text"><?= get_field('skid-nix', $uid); ?></div>
				</div>
				<div class="y-div">
					<div class="cargo-img">
						<img src="<?php  bloginfo('template_url')?>/imgs/cargo.gif" alt="">
					</div>
					<a href="#" onclick="$(`#zvonok [name='reason']`).val('Получить прайс лист (блок скидки и доставка)'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but action-but">Request a Price List</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>

<section id="contacts">
	<div class="map">
		<div id="mapHolder">
	<?= ""//get_field('map', $uid); ?>
		</div>
		<div id="mapHolderMobile">
		</div>
		<div class="conts-wrap">
			<div class="container">
				<div class="ccs">
					<div class="left-60">
						<div class="contact-form">
							<form method="POST" action="/mail.php" data-with-ajax="">
								<input type="hidden" name="form_type" value="question">
								<input type="hidden" name="reason" value="Задать вопрос (форма в подвале)">
								<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

								<!-- Signed anti-spam token -->
								<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
								<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

								<!-- Honeypot anti-spam field -->
								<input type="text" name="website" value="" autocomplete="off" tabindex="-1"
									   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

								<div class="ssf"><div class="left"><label><?php if($ff_is_en): //Локализация?>NAME<?php else:?>NAME<?php endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?php if($ff_is_en): //Локализация?>PHONE NUMBER<?php else:?>PHONE NUMBER<?php endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?php if($ff_is_en): //Локализация?>QUESTION<?php else:?>QUESTION<?php endif;?>:</label></div><div class="right"><?php echo "<textarea name=\"question\"></" . "textarea>"; ?></div><div class="clearfix"></div></div>
								<div class="left personal-agree">	<label class="galka"> <input type="checkbox" required="" /> <?php if($ff_is_en): //Локализация?>I give you permission to process<br>my personal data.<?php else:?>I give you permission to process<br>my personal data<?php endif;?></label></div>
								<div class="right submit-wrap">	<button type="submit" class="y-but y-but-invert "><?php if($ff_is_en): //Локализация?>ASK A QUESTION<?php else:?>ASK A QUESTION<?php endif;?></button></div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="right-40">
						<div class="cont-c">
							<?php if(0): //show full contacts block?>
								<div class="cont-t"> E-mail </div>
								<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
							<?php else:?>
								<div class="cont-t">Phone number </div>
								<div class="cont-d text"> <?= get_field('footer-phone', $uid); ?> </div>
								<div class="cont-t"> E-mail </div>
								<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
								<div class="cont-t"> Adress </div>
								<div class="cont-d text"> <?= get_field('footer-adress', $uid); ?> </div>
								<div class="cont-t"> We are on Whatsapp and Telegram </div>
								<div class="cont-d text messengers">
									<a href="https://wa.me/17279890035"><img src="<?php  bloginfo('template_url')?>/imgs/wa-icon.svg" alt=""></a>
									<a href="https://t.me/17279890035"><img src="<?php  bloginfo('template_url')?>/imgs/tg-icon.svg" alt=""></a>
								</div>
							<?php endif;?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>

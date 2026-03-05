<?php
$uid = get_the_ID();
$is_en = true;

/**
 * Anti-spam signed token (must match footer.php + mail.php)
 * Only safe chars: A-Z a-z 0-9 _
 */
$ff_secret = 'Sv3tly4ch0k_2026_SpamShield_f9A7KpQm2R8XwZ';
$ff_ts = time();
$ff_ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ff_token = hash_hmac('sha256', $ff_ts . '|' . $ff_ua, $ff_secret);
?>

<section id="banner" >

	<div class="banner" style="background-image:url(<?php echo get_field('img',$uid); ?>);">
		<div class="container">
			<div class="titile"><?php echo get_field('title',$uid); ?></div>		
			<div class="stats">					
				<?php if($is_en):?>		
				<?php $table = get_field( 'sets_en',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php  foreach ( $table['body'] as $tr ) {  ?>
							<?php     foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>
				<?php else: ?>	
				<?php $table = get_field( 'sets',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php  foreach ( $table['body'] as $tr ) {  ?>
							<?php     foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>	
				<?php endif; ?>				
			</div>
			<div <?php if($is_en): //Локализация?>id="action-eng"<?php endif; ?> class="action">
				<!-- <div class="text-action"><?php echo get_field('action',$uid); ?></div> -->
				<div><a href="#" onclick="$(`#get_it [name='reason']`).val('Запрос прайс-листа (верхний баннер)'); return false;" data-toggle="modal" data-target="#get_it" class="y-but get-price"><?php if($is_en):?>GET A PRICE-LIST<?php else: ?>Получить прайс<?php endif; ?></a></div>
			</div>
		</div>
	</div>
</section>

<a name="link_block"></a>
<section id="link_block" >
	
	<div class="container">
		<div class="titile"><?php if($is_en): //Локализация?>OUR RANGE OF PRODUCTS<?php else: ?>Полный ассортимент нашей продукции<?php endif; ?></div>		
		<div class="link_block">				
			<a class="item" href="<?php if($is_en): //Локализация?>/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?php else: ?>/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?php endif; ?>">
				<span class="image first-image">
                    <img
                            src="<?php bloginfo('template_url')?>/imgs/l1.jpg" alt=""
                            srcset="<?php bloginfo('template_url')?>/imgs/l1.jpg 320w, <?php bloginfo('template_url')?>/imgs/l1.jpg 480w"
                            sizes="(max-width: 320px) 320px, (max-width: 480px) 480px, 604px"
                    >
                </span>
				<span class="name"><?php if($is_en): //Локализация?>GARMENT ACCESORIES<?php else: ?>Световозвращающая фурнитура<br>для производителей одежды<?php endif; ?></span>
			</a>
			<a class="item" href="<?php if($is_en): //Локализация?>/en/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/<?php else: ?>/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/<?php endif; ?>">
				<span class="image webpcheck" style="">
				</span>
				<span class="name"><?php if($is_en): //Локализация?>CATALOGUE OF OUR REFLECTIVE ACCESORIES<?php else: ?>Каталог<br>световозвращающей продукции<?php endif; ?></span>
			</a>
		</div>
	</div>

</section> 


<!-- Убрали отсюда -->


<section id="about">
	<div class="container">
		<div class="about-content">
			<div class="left-60">
				<div class="left-line"><h2><?php echo get_field('about-title', $uid); ?></h2></div>
				<div class="text"><?php echo get_field('about-text', $uid); ?></div>
				<?php if(0) {?>
					<div class="a-ats">
						<div class="a-at"><img class="lazy_loading" data-src="<?php echo get_field('at-icon', $uid); ?>"><p><?php echo get_field('at-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?php echo get_field('at2-icon', $uid); ?>"><p><?php echo get_field('at2-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?php echo get_field('at3-icon', $uid); ?>"><p><?php echo get_field('at3-text', $uid); ?></p></div>
					</div>
					<div>
						<?php if($is_en): //Локализация?>
						<?php else: ?>
						<?php foreach(acf_photo_gallery('cerf', get_the_ID()) as $cerf) { ?>
						<a class="attachment_href" target="_blank" href="<?php echo $cerf['full_image_url']; ?>">
							<?php if(stristr($cerf['title'], '[:ru]')):?>
							<?php preg_match('~\[:'.($is_en ? 'en' : wpm_get_language()).'\](.+?)\[~', $cerf['title'], $matches);print_r($matches[1]); ?>
							<?php else: ?>
							<?php echo $cerf['title']; ?>
							<?php endif; ?>
						</a>
						<?php } ?>
						<?php endif; ?>
					</div>
				<?php } ?>
			</div>
			<?php if($is_en): //Локализация?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?php echo get_field('info-img', $uid); ?>" ></div-->
					<div class="round-banner">
						<div class="round-banner-part1">
							<div class="round-banner-header">100+</div>
							<div class="round-banner-text">Types of<br>product</div>
						</div>
						<div class="round-banner-part2">
							<div class="round-banner-header">24 h</div>
							<div class="round-banner-text">Maximum<br>delivery time</div>
						</div>
						<div class="round-banner-part3">
							<div class="round-banner-header">№1</div>
							<div class="round-banner-text">In Russia and the CIS <br>by range</div>
						</div>
						<div class="round-banner-part4">
							<div class="round-banner-header">5%</div>
							<div class="round-banner-text">Discount for an order<br>of more than 50,000 rub.</div>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?php echo get_field('info-img', $uid); ?>" ></div-->
					<div class="director-photo">
						<img src="<?php bloginfo('template_url')?>/imgs/dir_photo.jpg" alt="">
					</div>
					<div class="round-banner">
						<div class="round-banner-part1">
							<div class="round-banner-header">500+</div>
							<div class="round-banner-text">&nbsp;<br>Наименований<br>продукции</div>
						</div>
						<div class="round-banner-part2">
							<div class="round-banner-header">2 сек</div>
							<div class="round-banner-text">Only this long<br>to remember the name USAfirefly</div>
						</div>
						<div class="round-banner-part3">
							<div class="round-banner-header">№1</div>
							<div class="round-banner-text">В РФ по уровню<br>дружелюбия</div>
						</div>
						<div class="round-banner-part4">
							<div class="round-banner-header"><img src="<?php bloginfo('template_url')?>/imgs/100.png" alt=""></div>
							<div class="round-banner-text">Нам самим нравится то,<br>что мы производим</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<section id="otzivi">
	<div class="container">
		<div class="def-title center"><h2><?php echo get_field('otziv-title', $uid); ?></h2></div>
		<?php $bens = get_field('otzivs', $uid); ?>
		<div class="otzivs">
			<div class="owl-carousel owl-otzivs">
				<?php foreach($bens as $ben) { ?>
					<div class="otziv">
						<div>
							<div class="otziv-name"><?php echo get_field('otziv-name', $ben); ?></div>
							<div class="otziv-text text"><?php echo get_field('otziv-text', $ben); ?></div>
						</div>
						<div class="otziv-meta">

                            <div class="left">
                                <?php if(get_field('otziv-logo', $ben)) {?>
                                    <img src="<?php echo get_field('otziv-logo', $ben); ?>" data-nopreview="true" alt="USAfirefly review from <?php echo get_field('otziv-name', $ben); ?>">
                                <?php } ?>
                                <div class="text"><?php echo get_field('otziv-city', $ben); ?></div>
                            </div>

							<div class="right">
								<?php if(get_field('otziv-phone', $ben)) {?>
									<p class="text text-right"><span>Phone:</span>  <?php echo get_field('otziv-phone', $ben); ?></p>
								<?php } ?>
								<p class="text text-right">  <?php echo get_field('otziv-spec', $ben); ?></p>
								<p class="text text-right">  <?php echo get_field('otziv-fio', $ben); ?></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</section>

<section id="shema">
	<div class="container center">
		<div class="def-title center"><h2><?php echo get_field('shema-title', $uid); ?></h2></div>
		<div class="shema-line">
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?php echo get_field('shema1-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?php echo get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?php echo get_field('shema2-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?php echo get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?php echo get_field('shema3-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?php echo get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?php echo get_field('shema4-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?php echo get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?php echo get_field('shema5-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?php echo get_field('shema5-text', $uid); ?></p>
			</div>
		</div>
		<div class="schema-button">
			<a href="#" onclick="return false;" data-toggle="modal" data-target="#order-popup" class="y-but call-but">Оставить заявку</a>
		</div>
	</div>
</section>

<section id="quality">
	<div class="container">
		<div class="def-title center"><h2><?php echo get_field('quality-title', $uid); ?></h2></div>
		<div class="quality-content">
			<div class="quality__img">
				<img src="<?php echo get_field('quality-img', $uid); ?>" alt="">
			</div>
			<div class="quality__text">
				<?php echo get_field('quality-text', $uid); ?>
			</div>
		</div>
	</div>
</section>

<?php if($is_en): //Локализация?>
<section id="skid">
	<div class="bg" <?php if(0) { ?>style="background-image:url(<?php echo get_field('skid-img',$uid); ?>);"<?php } ?>>
		<div class="container">
			<div class="left-line"><h2>Delivery to any place in the World</h2></div>
		</div>
	</div>
</section>
<?php else: ?>
<section id="skid">
	<div class="bg" <?php if(0) { ?>style="background-image:url(<?php echo get_field('skid-img',$uid); ?>);"<?php } ?>>
		<div class="container">
			<div class="left-line"><h2><?php echo get_field('skid-title', $uid); ?></h2></div>
			<div class="skid-content">
				<div class="skid-wrap">
					<div class="text"><?php echo get_field('skid-verh', $uid); ?></div>
					<div class="skid-table">
					<table>
					<?php $table = get_field( 'skid-table',$uid ); ?>
						<?php if ( $table ) {  ?>
							<?php  foreach ( $table['body'] as $tr ) {
								echo '<tr>'; ?>
								<?php  $i=0;   foreach ( $tr as $td ) {
									if ($i==0) {	echo '<td class="cen">'; } else{ 	echo '<td>';}
									echo $td['c'];
									echo '</td>';
									$i++;
							} echo '</tr>'; }}   ?>
					</table>
				</div>
					<div class="text"><?php echo get_field('skid-nix', $uid); ?></div>
				</div>
				<div class="y-div">
					<div class="cargo-img">
						<img src="<?php bloginfo('template_url')?>/imgs/cargo.gif" alt="">
					</div>
					<a href="#" onclick="$(`#zvonok [name='reason']`).val('Получить прайс лист (блок скидки и доставка)'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but action-but">GET A PRICE-LIST</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section id="contacts">
	<div class="map">
		<div id="mapHolder">
	<?php echo ""; //get_field('map', $uid); ?>
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
								<input type="hidden" name="referrer" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

								<!-- Signed anti-spam token -->
								<input type="hidden" name="ff_ts" value="<?php echo $ff_ts; ?>">
								<input type="hidden" name="ff_token" value="<?php echo $ff_token; ?>">

								<!-- Honeypot anti-spam field -->
								<input type="text" name="website" value="" autocomplete="off" tabindex="-1"
									   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

								<div class="ssf"><div class="left"><label><?php if($is_en): //Локализация?>NAME<?php else: ?>ИМЯ<?php endif; ?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?php if($is_en): //Локализация?>PHONE NUMBER<?php else: ?>ТЕЛЕФОН<?php endif; ?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?php if($is_en): //Локализация?>QUESTION<?php else: ?>ВОПРОС<?php endif; ?>:</label></div><div class="right"><textarea name="question"></text<?php echo "area"; ?>></div><div class="clearfix"></div></div>
								<div class="left personal-agree">	<label class="galka"> <input type="checkbox" required="" /> <?php if($is_en): //Локализация?>I give you permission to process<br>my personal data.<?php else: ?>Согласен на обработку<br/>персональных данных<?php endif; ?></label></div>
								<div class="right submit-wrap">	<button type="submit" class="y-but y-but-invert "><?php if($is_en): //Локализация?>ASK A QUESTION<?php else: ?>Задать вопрос<?php endif; ?></button></div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="right-40">
						<div class="cont-c">
								<div class="cont-t">Phone</div>
								<div class="cont-d text">+1-727-989-00-35</div>
								<div class="cont-t">E-mail</div>
								<div class="cont-d text">usa.reflective@gmail.com</div>
								<div class="cont-t">We are on WhatsApp and Telegram</div>
								<div class="cont-d text messengers">
									<a href="https://wa.me/17279890035"><img src="<?php bloginfo('template_url')?>/imgs/wa-icon.svg" alt=""></a>
									<a href="https://t.me/svetlyachokk"><img src="<?php bloginfo('template_url')?>/imgs/tg-icon.svg" alt=""></a>
								</div>
							</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>

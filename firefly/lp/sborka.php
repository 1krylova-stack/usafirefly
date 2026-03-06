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
?>

<section id="banner" >

	<div class="banner" style="background-image:url(<?= get_field('img',$uid); ?>);">
		<div class="container">
			<div class="titile"><?= get_field('title',$uid); ?></div>		
			<div class="stats">					
				<?if(wpm_get_language() == 'en'):?>		
				<?php $table = get_field( 'sets_en',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php   foreach ( $table['body'] as $tr ) {  ?>
							<?php      foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>
				<?else:?>	
				<?php $table = get_field( 'sets',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php   foreach ( $table['body'] as $tr ) {  ?>
							<?php      foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';  
						}}}   ?>	
				<?endif;?>				
			</div>
			<div <?if(wpm_get_language() == 'en'): //Локализация?>id="action-eng"<?endif;?> class="action">
				<!-- <div class="text-action"><?= get_field('action',$uid); ?></div> -->
				<div><a href="#" onclick="$(`#get_it [name='reason']`).val('Запрос прайс-листа (верхний баннер)'); return false;" data-toggle="modal" data-target="#get_it" class="y-but get-price"><?if(wpm_get_language() == 'en'):?>GET A PRICE-LIST<?else:?>Получить прайс<?endif;?></a></div>
			</div>
		</div>
	</div>
</section>

<a name="link_block"></a>
<section id="link_block" >
	
	<div class="container">
		<div class="titile"><?if(wpm_get_language() == 'en'): //Локализация?>OUR RANGE OF PRODUCTS<?else:?>Полный ассортимент нашей продукции<?endif;?></div>		
		<div class="link_block">				
			<a class="item" href="<?if(wpm_get_language() == 'en'): //Локализация?>/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?else:?>/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/<?endif;?>">
				<span class="image first-image">
                    <img
                            src="<? bloginfo('template_url')?>/imgs/l1.jpg" alt=""
                            srcset="<? bloginfo('template_url')?>/imgs/l1.jpg 320w, <? bloginfo('template_url')?>/imgs/l1.jpg 480w"
                            sizes="(max-width: 320px) 320px, (max-width: 480px) 480px, 604px"
                    >
                </span>
				<span class="name"><?if(wpm_get_language() == 'en'): //Локализация?>GARMENT ACCESORIES<?else:?>Световозвращающая фурнитура<br>для производителей одежды<?endif;?></span>
			</a>
			<a class="item" href="<?if(wpm_get_language() == 'en'): //Локализация?>/en/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/<?else:?>/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/<?endif;?>">
				<span class="image webpcheck" style="">
				</span>
				<span class="name"><?if(wpm_get_language() == 'en'): //Локализация?>CATALOGUE OF OUR REFLECTIVE ACCESORIES<?else:?>Каталог<br>световозвращающей продукции<?endif;?></span>
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
				<? if(0) {?>
					<div class="a-ats">
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at-icon', $uid); ?>"><p><?= get_field('at-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at2-icon', $uid); ?>"><p><?= get_field('at2-text', $uid); ?></p></div>
						<div class="a-at"><img class="lazy_loading" data-src="<?= get_field('at3-icon', $uid); ?>"><p><?= get_field('at3-text', $uid); ?></p></div>
					</div>
					<div>
						<?if(wpm_get_language() == 'en'): //Локализация?>
						<?else:?>
						<? foreach(acf_photo_gallery('cerf', get_the_ID()) as $cerf) { ?>
						<a class="attachment_href" target="_blank" href="<?= $cerf['full_image_url']; ?>">
							<?if(stristr($cerf['title'], '[:ru]')):?>
							<? preg_match('~\[:'.wpm_get_language().'\](.+?)\[~', $cerf['title'], $matches);print_r($matches[1]); ?>
							<?else:?>
							<?= $cerf['title']?>
							<?endif;?>
						</a>
						<? } ?>
						<?endif;?>
					</div>
				<? } ?>
			</div>
			<?if(wpm_get_language() == 'en'): //Локализация?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
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
			<?else:?>
				<div class="right-40">
					<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
					<div class="director-photo">
						<img src="https://svetlyachok.info/wp-content/themes/firefly/imgs/dir_photo.jpg" alt="Фото основателя">
					</div>
					<div class="round-banner">
						<div class="round-banner-part1">
							<div class="round-banner-header">500+</div>
							<div class="round-banner-text">&nbsp;<br>Наименований<br>продукции</div>
						</div>
						<div class="round-banner-part2">
							<div class="round-banner-header">2 сек</div>
							<div class="round-banner-text">Столько нужно<br>чтобы запомнить наше название Светлячок</div>
						</div>
						<div class="round-banner-part3">
							<div class="round-banner-header">№1</div>
							<div class="round-banner-text">В РФ по уровню<br>дружелюбия</div>
						</div>
						<div class="round-banner-part4">
							<div class="round-banner-header"><img src="<?bloginfo('template_url')?>/imgs/100.png" alt=""></div>
							<div class="round-banner-text">Нам самим нравится то,<br>что мы производим</div>
						</div>
					</div>
				</div>
			<?endif;?>
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<section id="otzivi">
	<div class="container">
		<div class="def-title center"><h2><?= get_field('otziv-title', $uid); ?></h2></div>
		<? $bens = get_field('otzivs', $uid); ?>
		<div class="otzivs">
			<div class="owl-carousel owl-otzivs">
				<? foreach($bens as $ben) { ?>
					<div class="otziv">
						<div>
							<div class="otziv-name"><?= get_field('otziv-name', $ben); ?></div>
							<div class="otziv-text text"><?= get_field('otziv-text', $ben); ?></div>
						</div>
						<div class="otziv-meta">

                            <div class="left">
                                <?if(get_field('otziv-logo', $ben)) {?>
                                    <img src="<?= get_field('otziv-logo', $ben); ?>" data-nopreview="true" alt="отзывы о компании <?= get_field('otziv-name', $ben); ?>">
                                <? } ?>
                                <div class="text"><?= get_field('otziv-city', $ben); ?></div>
                            </div>

							<div class="right">
								<? if(get_field('otziv-phone', $ben)) {?>
									<p class="text text-right"><span>Тел:</span>  <?= get_field('otziv-phone', $ben); ?></p>
								<? } ?>
								<p class="text text-right">  <?= get_field('otziv-spec', $ben); ?></p>
								<p class="text text-right">  <?= get_field('otziv-fio', $ben); ?></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<? } ?>
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
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema1-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema2-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema3-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema4-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema5-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema5-text', $uid); ?></p>
			</div>
		</div>
		<div class="schema-button">
			<a href="#" onclick="return false;" data-toggle="modal" data-target="#order-popup" class="y-but call-but">Оставить заявку</a>
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

<?if(wpm_get_language() == 'en'): //Локализация?>
<section id="skid">
	<div class="bg" <? if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<? } ?>>
		<div class="container">
			<div class="left-line"><h2>Delivery to any place in the World</h2></div>
		</div>
	</div>
</section>
<?else:?>
<section id="skid">
	<div class="bg" <? if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<? } ?>>
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
						<img src="<? bloginfo('template_url')?>/imgs/cargo.gif" alt="">
					</div>
					<a href="#" onclick="$(`#zvonok [name='reason']`).val('Получить прайс лист (блок скидки и доставка)'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but action-but">Получить прайс-лист</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?endif;?>

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

								<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>QUESTION<?else:?>ВОПРОС<?endif;?>:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
								<div class="left personal-agree">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process<br>my personal data.<?else:?>Согласен на обработку<br/>персональных данных<?endif;?></label></div>
								<div class="right submit-wrap">	<button type="submit" class="y-but y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>ASK A QUESTION<?else:?>Задать вопрос<?endif;?></button></div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="right-40">
						<div class="cont-c">
							<?if(wpm_get_language() == 'en'): //Локализация?>
								<div class="cont-t"> E-mail </div>
								<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
							<?else:?>
								<div class="cont-t">Телефон </div>
								<div class="cont-d text"> <?= get_field('footer-phone', $uid); ?> </div>
								<div class="cont-t"> E-mail </div>
								<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
								<div class="cont-t"> Адрес </div>
								<div class="cont-d text"> <?= get_field('footer-adress', $uid); ?> </div>
								<div class="cont-t"> Мы в Whatsapp и Telegram </div>
								<div class="cont-d text messengers">
									<a href="https://wa.me/79006363775"><img src="<? bloginfo('template_url')?>/imgs/wa-icon.svg" alt=""></a>
									<a href="https://t.me/svetlyachokk"><img src="<? bloginfo('template_url')?>/imgs/tg-icon.svg" alt=""></a>
								</div>
							<?endif;?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>

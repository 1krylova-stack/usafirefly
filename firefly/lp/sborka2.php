<?php $uid = 7; ?>
<?php $uid_page = get_the_ID(); ?>

<?php
// Anti-spam signed token (must match mail.php + footer.php + other templates)
$ff_secret = 'Sv3tly4ch0k_2026_SpamShield_f9A7KpQm2R8XwZ';
$ff_ts = time();
$ff_ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ff_token = hash_hmac('sha256', $ff_ts . '|' . $ff_ua, $ff_secret);
?>

<section id="brdh">
	<div class="container">
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

	</div>
	<div class="clearfix"></div>	
</section>

<?php if(is_single()){?>

<section id="products">
	<div class="container">
		<div class="center"><?= get_field('prod-title',$uid_page); ?></div>

		<div class="at-bars">
				<div class="at-bar at-bar-<?= $uid_page; ?> at-vis">
				<div class="left-60 center">
					<? $video = get_field('video', $uid_page); ?>
					<? if($video) { ?>
					<div class="iframe-wrapper main-img">
						<iframe style="width: 100%"  frameborder="0" allowfullscreen class="lazy" data-src="https://www.youtube.com/embed/<?= $video; ?>" ></iframe>
					</div>
					<br>
					<? } else { ?>
					<a href="<?= get_field('main-img', $uid_page); ?>" class="fansybox" data-fancybox="gallery"><img class="main-img mx-auto img-responsive" src="<?= get_field('main-img', $uid_page); ?>" /></a>
					<? } ?>
					<div class="img-line">
						<div class="row">
							<div class="col-3"><a href="<?= get_field('img1', $uid_page); ?>" class="fansybox" data-fancybox="gallery"><img class="img-responsive" src="<?= get_field('img1', $uid_page); ?>" alt="<? the_title()?>. изображение 1"/></a></div>
							<div class="col-3"><a href="<?= get_field('img2', $uid_page); ?>" class="fansybox" data-fancybox="gallery"><img class="img-responsive" src="<?= get_field('img2', $uid_page); ?>" alt="<? the_title()?>. изображение 2"/></a></div>
							<div class="col-3"><a href="<?= get_field('img3', $uid_page); ?>" class="fansybox" data-fancybox="gallery"><img class="img-responsive" src="<?= get_field('img3', $uid_page); ?>" alt="<? the_title()?>. изображение 3"/></a></div>
							<div class="col-3"><a href="<?= get_field('img4', $uid_page); ?>" class="fansybox" data-fancybox="gallery"><img class="img-responsive" src="<?= get_field('img4', $uid_page); ?>" alt="<? the_title()?>. изображение 4"/></a></div>
						</div>
					</div>
				</div>
				<div class="right-40">
					<div class="left-line"><h1><?= get_field('title', $uid_page); ?></h1></div>
					<div class="text"><?= get_field('text', $uid_page); ?></div>
					<br/>
					<div class="y-div">
						<?php if(1753 == $post->ID || 1781 == $post->ID || 1769 == $post->ID || 1793 == $post->ID) {?>
							<?php if(1769 == $post->ID) {?>
								<a href="#" onclick="$(`#calculate-order [name='reason']`).val('Запросить каталог <?= get_field('name', $uid_page); ?>'); return false;" data-toggle="modal" data-target="#calculate-order" class="y-but get-price">
									<?if(wpm_get_language() == 'en'): //Локализация?>Request catalog<?else:?>Запросить каталог<?endif;?>
								</a>
							<?php } else {?>
								<a href="#" onclick="$(`#calculate-order [name='reason']`).val('Рассчитать заказ для <?= get_field('name', $uid_page); ?>'); return false;" data-toggle="modal" data-target="#calculate-order" class="y-but get-price">
									<?if(wpm_get_language() == 'en'): //Локализация?>Calculate your order<?else:?>Рассчитать ваш заказ<?endif;?>
								</a>
							<?php } ?>
						<?php } else { ?>
						<a href="#" onclick="$(`#zvonok [name='reason']`).val('Прайс для <?= get_field('name', $uid_page); ?>'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but get-price"><?if(wpm_get_language() == 'en'): //Локализация?>GET THE WHOLESALE PRICE-LIST<?else:?>Получить оптовый прайс<?endif;?></a>
					<?php } ?>
                            <?if(wpm_get_language() == 'en'): //Локализация?>

                                <?if(get_field('show_amazon')):?>
                                    <div style="margin-top: 15px; display: flex;">
                                        <a href="<?= get_field('amazon_link')? get_field('amazon_link') : get_field('amazon_global', 7); ?>" class="y-but get-price y-but--ozon">BUY ON AMAZON</a>
                                </div>
                            <?endif;?>    

                        <?else:?>

                            <?php /*if(get_field('show_wildberries') or get_field('show_ozon')): ?>
                                <div style="display: flex;flex-wrap:wrap;">
                                    <?php if(get_field('show_wildberries')): ?>
                                        <a href="<?= get_field('wildberries_link')? get_field('wildberries_link') : get_field('wildberries_global', 7); ?>" class="y-but get-price y-but--wildberries" style="margin-right: 15px;">Купить на Wildberries</a>
                                    <?php endif; ?>
                                    <?php if(get_field('show_ozon')): ?>
                                        <a href="<?= get_field('ozon_link')? get_field('ozon_link') : get_field('ozon_global', 7); ?>" class="y-but get-price y-but--ozon">Купить на OZON</a>
                                    <?php endif; ?>
                                    <?php if(get_field('show_ym')): ?>
                                        <a href="<?= get_field('ym_link')? get_field('ym_link') : get_field('ym_global', 7); ?>" class="y-but get-price y-but--ym">Купить на Яндекс Маркете</a>
                                    <?php endif; ?>
                                    <?php if(get_field('show_dm')): ?>
                                        <a href="<?= get_field('dm_link')? get_field('dm_link') : get_field('dm_global', 7); ?>" class="y-but get-price y-but--dm">Купить на сайте Детский Мир</a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; */?>

                        <?endif;?>
                    </div>
						
					<div class="at-line">
						<div class="at3">
							<img src="<?= get_field('at1-icon', $uid_page); ?>">
							<div class="at-desc"><?= get_field('at1-text', $uid_page); ?></div>
						</div>
						<div class="at3">
							<img src="<?= get_field('at2-icon', $uid_page); ?>">
							<div class="at-desc"><?= get_field('at2-text', $uid_page); ?></div>
						</div>
						<div class="at3">
							<img src="<?= get_field('at3-icon', $uid_page); ?>">
							<div class="at-desc"><?= get_field('at3-text', $uid_page); ?></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<?}else if(is_category()){?>

<section id="products">
	<div class="container">
		<h2 class="center"><?php single_cat_title(); ?></h2>
		<div class="at-mar">
			<div class="prod_tabl">			
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

				<a href="<?php the_permalink() ?>"><div class="prod prod-<?= $post->ID; ?>">
						<div class="himg">
							<?
							$image = get_field('slide-img');
							$size = 'img_slider';
							if( $image ) { /*echo wp_get_attachment_image( $image, $size );*/?>
								<img class="img-responsive" src="<?=wp_get_attachment_url($image)?>" alt="">
							<? } ?>
						</div>
					<h3 class="center hh3"><?= get_field('name'); ?></h3>
				</div></a>
	<?php endwhile; ?>
<?php endif; ?>	

			</div>
		</div>
	</div>
	<div class="clearfix"></div>

	<!--форма обратной связи-->
	<?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/' ||
		$_SERVER['REQUEST_URI'] == '/category/produkciya/reflective-product/'):?>
	<div class="callback-form">
		<?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
			<div class="center modal-title-one" style="line-height:3;">БРЕНДИРУЕМ, ДЕЛАЕМ ПОД ВАШИ ПОТРЕБНОСТИ, ИДЕМ НАВСТРЕЧУ</div>
		<?elseif($_SERVER['REQUEST_URI'] == '/category/produkciya/reflective-product/'):?>
			<div class="center modal-title-one mb-3">БРЕНДИРУЕМ, ДЕЛАЕМ ПОД ВАС И ИДЕМ НАВСТРЕЧУ</div>
		<?endif;?>
	  <div class="modal-dialog" role="document" style="margin:auto">
	    <div class="modal-content">
	    <?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
			<div class="center modal-title-one">Заказать звонок директора</div>
		<?elseif($_SERVER['REQUEST_URI'] == '/category/produkciya/reflective-product/'):?>
			<div class="center modal-title-one">Заказать звонок доброго специалиста</div>
		<?endif;?>	
        
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="callback">
						<?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
							<input type="hidden" name="reason" value="Запрос звонка директора">
						<?elseif($_SERVER['REQUEST_URI'] == '/category/produkciya/reflective-product/'):?>
							<input type="hidden" name="reason" value="Запрос звонка доброго специалиста">
						<?endif;?>	
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1"
							   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label>ИМЯ:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label>ТЕЛЕФОН:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="pp personal-agree">	<label class="galka"> <input type="checkbox" required="" /> Согласен на обработку персональных данных</label></div>
						<div class="send submit-wrap">	<button  type="submit" class="y-but 1y-but-invert ">Отправить</button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>

	</div>
	<?endif;?>	
	<!--КОНЕЦ форма обратной связи-->

	<!--форма обратной связи ENG-->
	<?if($_SERVER['REQUEST_URI'] == '/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/' ||
		$_SERVER['REQUEST_URI'] == '/en/category/produkciya/reflective-product/'):?>
	<div class="callback-form">
		<?if($_SERVER['REQUEST_URI'] == '/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
			<div class="center modal-title-one" style="line-height:3;">WE BRAND, WE ACT ACCORDING TO YOUR REQUIREMENTS, AND MEET YOUR NEEDS</div>
		<?elseif($_SERVER['REQUEST_URI'] == '/en/category/produkciya/reflective-product/'):?>
			<div class="center modal-title-one" style="line-height:3;">WE BRAND, WE ACT ACCORDING TO YOUR REQUIREMENTS, AND MEET YOUR NEEDS</div>
		<?endif;?>
	  <div class="modal-dialog" role="document" style="margin:auto">
	    <div class="modal-content">
	    <?if($_SERVER['REQUEST_URI'] == '/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
			<div class="center modal-title-one">REQUEST A CALL FROM THE DIRECTOR</div>
		<?elseif($_SERVER['REQUEST_URI'] == '/en/category/produkciya/reflective-product/'):?>
			<div class="center modal-title-one">REQUEST A CALL FROM KIND SPECIALIST</div>
		<?endif;?>	
        
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="callback">
						<?if($_SERVER['REQUEST_URI'] == '/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
							<input type="hidden" name="reason" value="Запрос звонка директора">
							<?elseif($_SERVER['REQUEST_URI'] == '/en/category/produkciya/reflective-product/'):?>
							<input type="hidden" name="reason" value="Запрос звонка доброго специалиста">
						<?endif;?>	
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1"
							   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label>NAME:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label>PHONE NUMBER:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="pp personal-agree">	<label class="galka"> <input type="checkbox" required="" /> I give permission for you to process my personal information</label></div>
						<div class="send submit-wrap">	<button  type="submit" class="y-but 1y-but-invert ">SEND</button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>

	</div>
	<?endif;?>	
	<!--КОНЕЦ форма обратной связи ENG-->

</section>	

<?}else{?>

<section id="products">
	<div class="container">
		<h2 class="center"><?= get_field('prod-title',$uid_page); ?></h2>
		<div class="at-mar">
			<div class="prod_tabl">			
			<? $bens = get_field('products', $uid_page); ?>
			<? foreach($bens as $k => $ben) { ?>			
				<div class="prod prod-<?= $ben; ?> <?= ($k == 0)? 'active' : ''; ?>">
					<div class="himg"><!-- <img src=""> --><?
					$image = get_field('slide-img', $ben);
					$size = 'img_slider'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}?></div>
					<h3 class="center hh3"><?= get_field('name', $ben); ?></h3>
				</div>					
			<? } ?>	
			</div>
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<?}?>

<?php if(is_single()){?>
<!-- Убрали код отсюда -->
<?}?>

<section id="contacts">
	<div class="map">
		<div id="mapHolder">
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
							<div class="cont-t"> <?if(wpm_get_language() == 'en'): //Локализация?>Phone number<?else:?>Телефон<?endif;?> </div>
							<div class="cont-d text"> <?= get_field('footer-phone', $uid); ?> </div>
							<div class="cont-t"> E-mail </div>
							<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
							<div class="cont-t"> <?if(wpm_get_language() == 'en'): //Локализация?>ADDRESS<?else:?>Адрес<?endif;?> </div>
							<div class="cont-d text"> <?= get_field('footer-adress', $uid); ?> </div>
							<div class="cont-t"> Мы в Whatsapp и Telegram </div>
							<div class="cont-d text messengers">
								<a href="https://wa.me/79006363775"><img src="<? bloginfo('template_url')?>/imgs/wa-icon.svg" alt=""></a>
								<a href="https://t.me/svetlyachokk"><img src="<? bloginfo('template_url')?>/imgs/tg-icon.svg" alt=""></a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>

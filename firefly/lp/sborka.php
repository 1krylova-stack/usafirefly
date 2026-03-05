<?php $uid = get_the_ID(); ?>
<?php $is_en = (wpm_get_language() == 'en'); ?>
<?php
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
				<?php $table = get_field( 'sets',$uid ); ?>
					<?php if ( $table ) {  ?>
						<?php   foreach ( $table['body'] as $tr ) {  ?>
							<?php      foreach ( $tr as $td ) {
								echo '<div class="stat">';
								echo $td['c'];
								echo '</div>';
						}}}   ?>
			</div>
			<div class="action">
				<!-- <div class="text-action"><?= get_field('action',$uid); ?></div> -->
				<div><a href="#" onclick="$(`#get_it [name='reason']`).val('Запрос прайс-листа (верхний баннер)'); return false;" data-toggle="modal" data-target="#get_it" class="y-but get-price">Получить прайс</a></div>
			</div>
		</div>
	</div>
</section>

<!-- 
<section id="link_block" >
	
	<div class="container">
		<div class="titile">Полный ассортимент нашей продукции</div>		
		<div class="link_block">				
			<a class="item" href="/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/ ">
				<span class="image" style="background-image:url(/wp-content/themes/firefly/i/l1.png)"></span>
				<span class="name">Световозвращающая фурнитура<br>для производителей одежды</span>
			</a>
			<a class="item" href="/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/ ">
				<span class="image" style="background-image:url(/wp-content/themes/firefly/i/gif2.gif)"></span>
				<span class="name">Каталог<br>световозвращающей продукции</span>
			</a>
		</div>
	</div>

</section> 
 -->



<section id="products">
	<div class="container">
		<h2 class="center"><?= get_field('prod-title',$uid); ?></h2>
		<div class="at-mar">
			<div class="owl-carousel owl-products">			
			<? $bens = get_field('products', $uid); ?>
			<? foreach($bens as $k => $ben) { ?>			
				<div class="prod prod-<?= $ben; ?> <?= ($k == 0)? 'active' : ''; ?>">
					<span>&nbsp;</span>
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
		<div class="at-bars">
		<? $bens = get_field('products', $uid); ?>
		<? foreach($bens as $k => $ben) { ?>	
			<div class="at-bar at-bar-<?= $ben; ?> <?= ($k == 0)? 'at-vis' : ''; ?>">
				<div class="left-60 center">
					<? $video = get_field('video', $ben); ?>
					<? if($video) { ?>
					<div class="iframe-wrapper main-img">
						<iframe style="width: 100%"; src="https://www.youtube.com/embed/<?= $video; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<br>
					<? } else { ?>
					<img class="main-img mx-auto img-responsive" src="<?= get_field('main-img', $ben); ?>" />
					<? } ?>
					<div class="img-line">
						<div class="row">
							<div class="col-3"><img class="img-responsive" src="<?= get_field('img1', $ben); ?>" /></div>
							<div class="col-3"><img class="img-responsive" src="<?= get_field('img2', $ben); ?>" /></div>
							<div class="col-3"><img class="img-responsive" src="<?= get_field('img3', $ben); ?>" /></div>
							<div class="col-3"><img class="img-responsive" src="<?= get_field('img4', $ben); ?>" /></div>
						</div>
					</div>
				</div>
				<div class="right-40">
					<div class="left-line"><h2><?= get_field('title', $ben); ?></h2></div>
					<div class="text"><?= get_field('text', $ben); ?></div>
					<br/>
					<div class="y-div"><a href="#" onclick="$(`#zvonok [name='reason']`).val('Прайс для <?= get_field('name', $ben); ?>'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but get-price">Получить прайс</a></div>
					<div class="at-line">
						<div class="at3">
							<img src="<?= get_field('at1-icon', $ben); ?>">
							<div class="at-desc"><?= get_field('at1-text', $ben); ?></div>
						</div>
						<div class="at3">
							<img src="<?= get_field('at2-icon', $ben); ?>">
							<div class="at-desc"><?= get_field('at2-text', $ben); ?></div>
						</div>
						<div class="at3">
							<img src="<?= get_field('at3-icon', $ben); ?>">
							<div class="at-desc"><?= get_field('at3-text', $ben); ?></div>
						</div>
					</div>
					
				</div>
			</div>
			<script>
				$(document).ready(function(){
					$(".prod-<?= $ben; ?>").click(function(){
						$(".at-bar").removeClass("at-vis");
						$(".at-bar-<?= $ben; ?>").addClass("at-vis");
						$(".prod").removeClass("active");
						$(".prod-<?= $ben; ?>").addClass("active");				
					});
				});
			</script>			
		<? } ?>	
		</div>
	</div>
	<div class="clearfix"></div>	
</section>

<section id="about">
	<div class="container">
		<div class="left-line"><h2><?= get_field('about-title', $uid); ?></h2></div>
		<div class="left-60">
			<div class="text"><?= get_field('about-text', $uid); ?></div>
			<div class="a-ats">
				<div class="a-at"><img src="<?= get_field('at-icon', $uid); ?>"><p><?= get_field('at-text', $uid); ?></p></div>
				<div class="a-at"><img src="<?= get_field('at2-icon', $uid); ?>"><p><?= get_field('at2-text', $uid); ?></p></div>
				<div class="a-at"><img src="<?= get_field('at3-icon', $uid); ?>"><p><?= get_field('at3-text', $uid); ?></p></div>
			</div>
			<div>
				<?php if(function_exists('acf_photo_gallery')): ?>
					<?php foreach(acf_photo_gallery('cerf', get_the_ID()) as $cerf) { ?>
						<a class="attachment_href" target="_blank" href="<?= $cerf['full_image_url']; ?>">
							<?php if(strstr($cerf['title'], '[:')):?>
								<?php preg_match('~\[:'.($is_en ? 'en' : wpm_get_language()).'\](.+?)\[~', $cerf['title'], $matches); echo !empty($matches[1]) ? $matches[1] : $cerf['title']; ?>
							<?php else: ?>
								<?= $cerf['title']?>
							<?php endif; ?>
						</a>
					<?php } ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if($is_en): //Локализация?>
			<div class="right-40">
				<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
				<div class="round-banner">
					<div class="round-banner-part1">
						<div class="round-banner-header">500+</div>
						<div class="round-banner-text">Product SKUs</div>
					</div>
					<div class="round-banner-part2">
						<div class="round-banner-header">2 Seconds</div>
						<div class="round-banner-text">That’s all it takes<br>to remember the name USA Firefly</div>
					</div>
					<div class="round-banner-part3">
						<div class="round-banner-header">№1</div>
						<div class="round-banner-text">In Customer Understanding</div>
					</div>
					<div class="round-banner-part4">
						<div class="round-banner-header">100%</div>
						<div class="round-banner-text">We genuinely stand behind<br>the products we manufacture</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="right-40">
				<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
				<div class="director-photo">
					<img src="<?php bloginfo('template_url')?>/imgs/dir_photo.jpg" alt="">
				</div>
				<div class="round-banner">
					<div class="round-banner-part1">
						<div class="round-banner-header">500+</div>
						<div class="round-banner-text"> <br>Наименований<br>продукции</div>
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
						<div class="round-banner-header"><img src="<?php bloginfo('template_url')?>/imgs/100.png" alt=""></div>
						<div class="round-banner-text">Нам самим нравится то,<br>что мы производим</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>	
</section>

<section id="otzivi">
	<div class="container">
		<div class="def-title center"><h2><?= get_field('otziv-title', $uid); ?></h2></div>
		<?php $bens = get_field('otzivs', $uid); ?>
		<div class="otzivs">
			<div class="owl-carousel owl-otzivs">
				<?php foreach($bens as $ben) { ?>
					<div class="otziv">
						<div>
							<div class="otziv-name"><?= get_field('otziv-name', $ben); ?></div>
							<div class="otziv-text text"><?= get_field('otziv-text', $ben); ?></div>
						</div>
						<div class="otziv-meta">

                            <div class="left">
                                <?php if(get_field('otziv-logo', $ben)) {?>
                                    <img src="<?= get_field('otziv-logo', $ben); ?>" data-nopreview="true" alt="отзывы о компании <?= get_field('otziv-name', $ben); ?>">
                                <?php } ?>
                                <div class="text"><?= get_field('otziv-city', $ben); ?></div>
                            </div>

							<div class="right">
								<?php if(get_field('otziv-phone', $ben)) {?>
									<p class="text text-right"><span>Phone:</span>  <?= get_field('otziv-phone', $ben); ?></p>
								<?php } ?>
								<p class="text text-right">  <?= get_field('otziv-spec', $ben); ?></p>
								<p class="text text-right">  <?= get_field('otziv-fio', $ben); ?></p>
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
		<div class="def-title center"><h2><?= get_field('shema-title', $uid); ?></h2></div>
		<div class="shema-line">
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema1-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema2-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema3-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema4-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
				<p><?= get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<?php bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema5-img', $uid); ?>" alt="Как получить заказ. Иконка 1">
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

<?php if($is_en): //Локализация?>
<section id="skid">
	<div class="bg" <?php if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<?php } ?>>
		<div class="container">
			<div class="left-line"><h2>Delivery to any place in the World</h2></div>
		</div>
	</div>
</section>
<?php else: ?>
<section id="skid">
	<div class="bg" <?php if(0) { ?>style="background-image:url(<?= get_field('skid-img',$uid); ?>);"<?php } ?>>
		<div class="container">
			<div class="left-line"><h2><?= get_field('skid-title', $uid); ?></h2></div>
			<div class="skid-content">
				<div class="skid-wrap">
					<div class="text"><?= get_field('skid-verh', $uid); ?></div>
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
					<div class="text"><?= get_field('skid-nix', $uid); ?></div>
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

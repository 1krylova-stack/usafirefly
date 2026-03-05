<?php $uid = get_the_ID(); ?>

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
				<? foreach(acf_photo_gallery('cerf', get_the_ID()) as $cerf) { ?>
				<a class="attachment_href" target="_blank" href="<?= $cerf['full_image_url']; ?>"><?= $cerf['title']; ?></a>
				<? } ?>
			</div>	
		</div>
		<div class="right-40">
			<!--div class="info-img center"><img src="<?= get_field('info-img', $uid); ?>" ></div-->
			<div class="round-banner">
				<div class="round-banner-part1">
					<div class="round-banner-header">100+</div>
					<div class="round-banner-text">Видов<br>продукции</div>
				</div>
				<div class="round-banner-part2">
					<div class="round-banner-header">24 ч</div>
					<div class="round-banner-text">Максимальный срок<br>отправки партии</div>
				</div>
				<div class="round-banner-part3">
					<div class="round-banner-header">№1</div>
					<div class="round-banner-text">В России и СНГ<br>по ассортименту</div>
				</div>
				<div class="round-banner-part4">
					<div class="round-banner-header">5%</div>
					<div class="round-banner-text">Скидка при заказе<br>партии от 50 000р.</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="clearfix"></div>	
</section>

<section id="action">
	<div class="bg" style="background-image:url(<?= get_field('action-img',$uid); ?>);">
		<div class="container center">
			<div class="ac-wrap">
				<div class="left-line"><h2><?= get_field('action-title', $uid); ?></h2></div>
				<div class="text"><?= get_field('action-text', $uid); ?></div>
				<div class="action-line">
					<div class="left"><div class="gift-text"><img src="/wp-content/themes/firefly/imgs/gift.png"/><p><?= get_field('action-gift', $uid); ?></p></div></div>
					<div class="right">	<div class="y-div"><a href="#" onclick="return false;" data-toggle="modal" data-target="#konsult" class="y-but action-but"><?= get_field('action-button', $uid); ?></a></div></div>
					<div class="clearfix"></div>	
				</div>
				<div class="clearfix"></div>	
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
				<img src="<?= get_field('shema1-img', $uid); ?>">
				<p><?= get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img src="<?= get_field('shema2-img', $uid); ?>">
				<p><?= get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img src="<?= get_field('shema3-img', $uid); ?>">
				<p><?= get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img src="<?= get_field('shema4-img', $uid); ?>">
				<p><?= get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img src="<?= get_field('shema5-img', $uid); ?>">
				<p><?= get_field('shema5-text', $uid); ?></p>
			</div>
		</div>
	</div>
</section>

<? if(!get_field('remove_next_text', $uid)) { ?>
<section id="next">
	<div class="container">
		<div class="left-40 center">
			<img class="img-responsive" src="<?= get_field('next-img', $uid); ?>">
			<div class="clearfix"></div>	
		</div>
		<div class="right-60">
			<div class="next-wrap">
				<h2><?= get_field('next-title', $uid); ?></h2>
				<div class="next-ats">
					<div class="next-at text"><div class="next-num">1</div><?= get_field('next-1', $uid); ?></div>
					<div class="next-at text"><div class="next-num">2</div><?= get_field('next-2', $uid); ?></div>
					<div class="next-at text"><div class="next-num">3</div><?= get_field('next-3', $uid); ?></div>
				</div>
			</div>
			<div class="clearfix"></div>	
		</div>
		<div class="clearfix"></div>	
	</div>
</section>
<? } else { ?>
<section id="next">
	<div class="container">
		<img class="img-responsive" src="<?= get_field('next-img', $uid); ?>">
	</div>
</section>
<? } ?>

<section id="skid">
	<div class="bg" style="background-image:url(<?= get_field('skid-img',$uid); ?>);">
		<div class="container">
			<div class="left-line"><h2><?= get_field('skid-title', $uid); ?></h2></div>
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
			<div class="y-div"><a href="#" onclick="$(`#zvonok [name='reason']`).val('Получить прайс лист (блок скидки и доставка)'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but action-but">Получить прайс-лист</a></div>
		</div>
	</div>
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
					<div>
						<div class="left">
							<img src="<?= get_field('otziv-logo', $ben); ?>">
							<div class="text"><?= get_field('otziv-city', $ben); ?></div>
						</div>
						<div class="right">
							<p class="text text-right"><span>Тел:</span>  <?= get_field('otziv-phone', $ben); ?></p>
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

<section id="contacts">
	<div class="map">
	<?= get_field('map', $uid); ?>
		<div class="conts-wrap">
			<div class="container">
				<div class="ccs">
					<div class="left-60">
						<div class="contact-form">
							<form method="POST" action="/mail.php" with-ajax>
								<input type="hidden" name="form_type" value="question">
								<input type="hidden" name="reason" value="Задать вопрос (форма в подвале)">
								<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
								<div class="ssf"><div class="left"><label>ИМЯ:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>ТЕЛЕФОН:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>ВОПРОС:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
								<div class="left">	<label class="galka"> <input type="checkbox" required="" /> Согласен на обработку<br/>персональных данных</label></div>
								<div class="right">	<button type="submit" class="y-but y-but-invert ">Задать вопрос</button></div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="right-40">
						<div class="cont-c">
							<div class="cont-t"> Телефон </div>
							<div class="cont-d text"> <?= get_field('footer-phone', $uid); ?> </div>
							<div class="cont-t"> E-mail </div>
							<div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
							<div class="cont-t"> Адрес </div>
							<div class="cont-d text"> <?= get_field('footer-adress', $uid); ?> </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>


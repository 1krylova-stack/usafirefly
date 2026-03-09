')):?>
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
			<?if(0): //force founder-photo variant?>
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
			<?else:?>
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
				<?php if (is_array($bens) || $bens instanceof Traversable) { foreach($bens as $ben) { ?>
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
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema1-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema1-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema2-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema2-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema3-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema3-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema4-img', $uid); ?>" alt="How to receive the order. Icon 1">
				<p><?= get_field('shema4-text', $uid); ?></p>
			</div>
			<div class="shema-block">
				<img class="lazy_loading" src="<? bloginfo('template_url')?>/imgs/lazy-holder.png" data-src="<?= get_field('shema5-img', $uid); ?>" alt="How to receive the order. Icon 1">
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

<?if(0): //keep full discount+gif block?>
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
					<a href="#" onclick="$(`#zvonok [name='reason']`).val('Получить прайс лист (блок скидки и доставка)'); return false;" data-toggle="modal" data-target="#zvonok" class="y-but action-but">Request a Price List</a>
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

								<div class="ssf"><div class="left"><label><?if($ff_is_en): //Локализация?>NAME<?else:?>NAME<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?if($ff_is_en): //Локализация?>PHONE NUMBER<?else:?>PHONE NUMBER<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
								<div class="ssf"><div class="left"><label><?if($ff_is_en): //Локализация?>QUESTION<?else:?>QUESTION<?endif;?>:</label></div><div class="right"><textarea name="question">

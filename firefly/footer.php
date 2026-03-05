<?php
/**
 * footer.php
 * Anti-spam signed token for /mail.php
 */
$ff_secret = 'Sv3tly4ch0k_2026_SpamShield_f9A7KpQm2R8XwZ';
$ff_ts = time();
$ff_ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ff_token = hash_hmac('sha256', $ff_ts . '|' . $ff_ua, $ff_secret);
?>

<?php if(false) {?>
<footer>
	<?php if(stristr($_SERVER['REQUEST_URI'], '/thanks/')){
	}else{ 
		echo '<div class="center">Разработано веб-студией <a href="https://oscarlab.ru/">« OscarLab »</a></div>';
	}?>
	<br>
</footer>
<?php } ?>
<? if(0) {?>
<style>
	.footer-line {
		background-color: #FFE819;
		height: 56px;
		position: fixed;
		left: 0;
		right: 0;
		bottom: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #0A0A0A;
		z-index: 99;
		font-size: 18px;
		transition: ease 200ms;
	}

	.footer-line > .container {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
 
	.footer-line > .container > span > svg {
		margin-right: 18px;
		display: inline-block;
	}

	.footer-line a {
		color: #0A0A0A;
		text-decoration: underline;
		font-weight: bold;
	}

	.footer-line .close {
		border: none;
		background: none;
		padding: 0;
		cursor: pointer;
	}

	.footer-line.collapsed {
		bottom: -56px;
	}

	.footer-line-button {
		position: fixed;
		right: -268px;
		bottom: 88px;
		height: 56px;
		width: 268px;
		paddingpadding-left: 24px;
		border: none;
		background-color: #FFE819;
		border-top-left-radius: 10px;
		border-bottom-left-radius: 10px;
		display: flex;
		align-items: center;
		color: #0A0A0A;
		z-index: 99;
		font-size: 18px;
		box-sizing: border-box;
		cursor: pointer;
		transition: ease 200ms;
	}

	.footer-line-button:hover {
		background-color: #f2dc16;
	}

	.footer-line-button.collapsed {
		right: 0px;
	}

	.footer-line-button > svg {
		margin-right: 14px;
	}
</style>
<? } ?>
<?php if(!is_category(7) && !in_category(7)) {?>
<button type="button" class="footer-line-button">
	<svg xmlns="http://www.w3.org/2000/svg" width="20.108" height="20.109" viewBox="0 0 20.108 20.109"><g transform="translate(-0.01)"><g transform="translate(0.01)"><path d="M565.817,676.02a2.514,2.514,0,1,0,2.514,2.514A2.514,2.514,0,0,0,565.817,676.02Z" transform="translate(-550.736 -660.938)" fill="#c5ac09"/><path d="M284.143,676.02a2.514,2.514,0,1,0,2.514,2.514A2.514,2.514,0,0,0,284.143,676.02Z" transform="translate(-275.346 -660.938)" fill="#c5ac09"/><path d="M19.883,4.292a1.263,1.263,0,0,0-1.022-.522H5.942L4.971.859A1.255,1.255,0,0,0,3.779,0H1.267a1.257,1.257,0,0,0,0,2.514H2.873L6.357,12.966a1.258,1.258,0,0,0,1.193.859h8.8a1.256,1.256,0,0,0,1.193-.859l2.514-7.541A1.262,1.262,0,0,0,19.883,4.292Z" transform="translate(-0.01)" fill="#c5ac09"/></g></g></svg>
	Купить в розницу
</button>
<?php } ?>

<div class="modal-backdrop fade">
	<div id="zvonok" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="center modal-title-one"><?if(wpm_get_language() == 'en'): //Локализация?>GET A PRICE-LIST<?else:?>Получить прайс<?endif;?></div>
        <div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send your contact details<?else:?>Отправьте свои контакты и вы получите прайс-лист на почту<?endif;?></div>
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="question">
						<input type="hidden" name="reason" value="Запрос прайс-листа">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>ADDITIONAL INFORMATION<?else:?>ДОП. ИНФО<?endif;?>:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="callback" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="center modal-title-one"><?if(wpm_get_language() == 'en'): //Локализация?>REQUEST A PHONE CALL<?else:?>Заказать звонок<?endif;?></div>
        <div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send us your details and we will call you back<?else:?>Отправьте свои контакты и мы Вам перезвоним<?endif;?></div>
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="callback">
						<input type="hidden" name="reason" value="Запрос звонка">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="order-popup" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="center modal-title-one"><?if(wpm_get_language() == 'en'): //Локализация?>REQUEST A PHONE CALL<?else:?>Оставить заявку<?endif;?></div>
				<div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send us your details and we will call you back<?else:?>Отправьте свои контакты и мы Вам перезвоним<?endif;?></div>
				<br>
				<div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="callback">
						<input type="hidden" name="reason" value="Оставить заявку">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="calculate-order" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="center modal-title-one">
			<?php if(1769 == $post->ID) {?>
				<?if(wpm_get_language() == 'en'): //Локализация?>REQUEST CATALOG<?else:?>ЗАПРОСИТЬ КАТАЛОГ<?endif;?>
			<? } else { ?>
				<?if(wpm_get_language() == 'en'): //Локализация?>CALCULATE ORDER<?else:?>РАССЧИТАТЬ ЗАКАЗ<?endif;?>
			<? } ?>
		</div>
        <div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send your contacts and you will receive a calculation of your order by mail<?else:?>Отправьте свои контакты <br>и вы получите расчёт вашего заказа  на почту<?endif;?></div>
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="question">
						<input type="hidden" name="reason" value="Запрос прайс-листа">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>ADDITIONAL INFORMATION<?else:?>ДОП. ИНФО<?endif;?>:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="konsult" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="center modal-title-one"><?if(wpm_get_language() == 'en'): //Локализация?>REQUEST A PHONE CALL<?else:?>Заказать звонок<?endif;?></div>
        <div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send us your details and we will call you back<?else:?>Отправьте свои контакты и мы Вам перезвоним<?endif;?></div>
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="callback">
						<input type="hidden" name="reason" value="Получение консультации">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="get_it" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="center modal-title-one"><?if(wpm_get_language() == 'en'): //Локализация?>GET A PRICE-LIST<?else:?>Получить прайс<?endif;?></div>
        <div class="center modal-title"><?if(wpm_get_language() == 'en'): //Локализация?>Send your contact details<?else:?>Отправьте свои контакты<?endif;?></div>
        <br>
        <div class="contact-form">
					<form method="POST" action="/mail.php" data-with-ajax="">
						<input type="hidden" name="form_type" value="get_it">
						<input type="hidden" name="reason" value="Запрос прайс-листа">
						<input type="hidden" name="referrer" value="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

						<!-- Signed anti-spam token -->
						<input type="hidden" name="ff_ts" value="<?= $ff_ts ?>">
						<input type="hidden" name="ff_token" value="<?= $ff_token ?>">

						<!-- Honeypot anti-spam field -->
						<input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
						<div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>ADDITIONAL INFORMATION<?else:?>ДОП. ИНФО<?endif;?>:</label></div><div class="right"><textarea name="info"></textarea></div><div class="clearfix"></div></div>
						<div class="pp">	<label class="galka"> <input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
						<div class="send">	<button  type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
						<div class="clearfix"></div>
					</form>
				</div>
	    </div>
	  </div>
	</div>
</div>

<div class="modal-backdrop fade">
	<div id="thxModal" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="center modal-title"> <?if(wpm_get_language() == 'en'): //Локализация?>Thanks for the appeal!<?else:?>Спасибо за обращение!<?endif;?></div>
        <br>
        <p class="center"><?if(wpm_get_language() == 'en'): //Локализация?>Your application has been successfully submitted!<?else:?>Ваша заявка успешно отправлена!<?endif;?></p>
	    </div>
	  </div>
	</div>
</div>

<script defer src="/wp-content/themes/firefly/js/jquery-3.2.1.min.js"></script>
<script defer src="/wp-content/themes/firefly/js/modal.js"></script>
<script defer src="/dist/jquery.fancybox.js"></script>
<script defer src="/wp-content/themes/firefly/js/common.js"></script>
<script defer src="/wp-content/themes/firefly/js/lazyload.min.js"></script>
<script defer src="/wp-content/themes/firefly/js/owl.carousel.min.js"></script>

<?php wp_footer(); ?>

<?php if(0) {?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132365436-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-132365436-5');
	</script>
<?php } ?>
<?php if(0) {?>
<div id="clickfrog_counter_container" style="width:0px;height:0px;overflow:hidden;"></div><script type="text/javascript">(function(d, w) {var clickfrog = function() {if(!d.getElementById('clickfrog_js_container')) {var sc = document.createElement('script');sc.type = 'text/javascript';sc.async = true;sc.src = "//stat.clickfrog.ru/c.js?r="+Math.random();sc.id = 'clickfrog_js_container';var c = document.getElementById('clickfrog_counter_container');c.parentNode.insertBefore(sc, c);}};if(w.opera == "[object Opera]"){d.addEventListener("DOMContentLoaded",clickfrog,false);}else {clickfrog();}})(document, window);</script><noscript><div style="width:0px;height:0px;overflow:hidden;"><img src="//stat.clickfrog.ru/no_script.php?img" style="width:0px; height:0px;" alt=""/></div></noscript><script type="text/javascript">var clickfrogru_uidh='a2aea73c449d1093c5effce2770ad8a3';</script>
<?php } ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56190298, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/56190298" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <script>
        //Youtube lazyload
            window.lazyLoadOptions = {
                // Your custom settings go here
            };

            window.addEventListener("LazyLoad::Initialized", function (event) {
                window.lazyLoadInstance = event.detail.instance;
            }, false);


        //Yandex maps lazyload
            document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(initYandexMap, 10000);
            });

            document.addEventListener('scroll', initYandexMapOnEvent);
            document.addEventListener('mousemove', initYandexMapOnEvent);
            document.addEventListener('touchstart', initYandexMapOnEvent);

            function initYandexMapOnEvent (e) {
                initYandexMap();
                e.currentTarget.removeEventListener(e.type, initYandexMapOnEvent);
            }

            function initYandexMap () {
                if (window.yandexMapDidInit) {
                    return false;
                }
                window.yandexMapDidInit = true;

                const script = document.createElement('script');
                script.type = 'text/javascript';
                script.async = true;

                script.src = 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A66389cd1730e977d061cfad2288cee0787e9d22ca5e303fbf367ff29e70b5868&width=100%25&height=620&lang=ru_RU&scroll=false';

                var element =  document.getElementById('mapHolder');
                if (typeof(element) != 'undefined' && element != null)
                {
                    document.getElementById("mapHolder").appendChild(script);
                }

                const script_mobile = document.createElement('script');
                script_mobile.type = 'text/javascript';
                script_mobile.async = true;

                script_mobile.src = 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4f967e6c1f547972f95c56692f07147df1f013e3d8ae7a5674b4db6f17c98777&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false';

                var element_mobile =  document.getElementById('mapHolderMobile');
                if (typeof(element_mobile) != 'undefined' && element_mobile != null)
                {
                    document.getElementById("mapHolderMobile").appendChild(script_mobile);
                }
            }
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HZRTE41T1N"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-HZRTE41T1N');
    </script>

</body>
</html>

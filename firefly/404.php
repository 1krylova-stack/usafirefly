<?php
get_header();

$uid = get_the_ID();
if (!$uid) {
    $uid = 7;
}
?>

    <main>
        <div class="container">
            <div class="typography-enabled">
                <h1>Ouch!</h1>
                <h2>It looks like we can't find the page you're looking for.</a></h2>
                <h6>Error code: 404</h6>
                <p>Useful links:</p>
                <ul>
                    <li><a href="/">Main page</a></li>
                    <li><a href="/#link_block">Product</a></li>
                    <li><a href="/#quality">Quality</a></li>
                    <li><a href="/#shema">How to receive your order</a></li>
                    <li><a href="/#contacts">Contact details</a></li>
                </ul>
            </div>
        </div>
    </main>
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
                                <div class="cont-t">Phone number </div>
                                <div class="cont-d text"> <?= get_field('footer-phone', $uid); ?> </div>
                                <div class="cont-t"> E-mail </div>
                                <div class="cont-d text"> <?= get_field('footer-email', $uid); ?> </div>
                                <div class="cont-t"> Adress </div>
                                <div class="cont-d text"> <?= get_field('footer-adress', $uid); ?> </div>
                                <div class="cont-t"> We are on Whatsapp and Telegram </div>
                                <div class="cont-d text messengers">
                                    <a href="https://wa.me/17279890035"><img src="<? bloginfo('template_url')?>/imgs/wa-icon.svg" alt=""></a>
                                    <a href="https://t.me/17279890035"><img src="<? bloginfo('template_url')?>/imgs/tg-icon.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

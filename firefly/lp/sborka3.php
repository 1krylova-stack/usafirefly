<?php $uid = 7; ?>
<?php $uid_page = get_the_ID(); ?>

<?php
// Anti-spam signed token (must match footer.php + lp/sborka.php + mail.php)
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

<section id="products">
    <div class="container">
        <h2 class="center"><?php single_cat_title(); ?></h2>
        <div class="at-mar">
            <div class="prod_tabl">
                <?php
                $args = [
                    'post_type' => 'post',
                    'post__in' => [919,940,916,922,2259,925,928,913,931,1889]
                ];
                $the_query = new WP_Query( $args );
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <a href="<?php the_permalink() ?>">
                            <div class="prod prod-<?= $post->ID; ?>">
                                <div class="himg">
                                <?
                                $image = get_field('slide-img');
                                $size = 'img_slider';
                                if( $image ) { /*echo wp_get_attachment_image( $image, $size );*/?>
                                    <img class="img-responsive" src="<?=wp_get_attachment_url($image)?>" alt="">
                                <? } ?>
                                </div>
                                <h3 class="center hh3"><?= get_field('name'); ?></h3>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <h2 class="center">Фурнитура без светоотражения</h2>
        <div class="at-mar">
            <div class="prod_tabl">
                <?php
                $args = [
                    'post_type' => 'post',
                    'post__in' => [937,949,1793,1912,1753,1769,1875]
                ];
                $the_query = new WP_Query( $args );
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <a href="<?php the_permalink() ?>"><div class="prod prod-<?= $post->ID; ?>">
                                <div class="himg"><?
                                    $image = get_field('slide-img');
                                    $size = 'img_slider';
                                    if( $image ) {
                                        echo wp_get_attachment_image( $image, $size );
                                    }?></div>
                                <h3 class="center hh3"><?= get_field('name'); ?></h3>
                            </div></a>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--форма обратной связи-->
    <?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/' ||
        $_SERVER['REQUEST_URI'] == '/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/'):?>
        <div class="callback-form">
            <?if($_SERVER['REQUEST_URI'] == '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
                <div class="center modal-title-one" style="line-height:3;">БРЕНДИРУЕМ, ДЕЛАЕМ ПОД ВАШИ ПОТРЕБНОСТИ, ИДЕМ НАВСТРЕЧУ</div>
            <?elseif($_SERVER['REQUEST_URI'] == '/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/'):?>
                <div class="center modal-title-one" style="line-height:3;">БРЕНДИРУЕМ, ДЕЛАЕМ ПОД ВАС И ИДЕМ НАВСТРЕЧУ</div>
            <?endif;?>
            <div class="modal-dialog" role="document" style="margin:auto">
                <div class="modal-content">
                    <div class="center modal-title-one">Получить оптовый прайс</div>
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
                            <input type="text" name="website" value="" autocomplete="off" tabindex="-1"
                                   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>ADDITIONAL INFORMATION<?else:?>ДОП. ИНФО<?endif;?>:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
                            <div class="pp"><label class="galka"><input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
                            <div class="send"><button type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
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
        $_SERVER['REQUEST_URI'] == '/en/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/'):?>
        <div class="callback-form">
            <?if($_SERVER['REQUEST_URI'] == '/en/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/'):?>
                <div class="center modal-title-one" style="line-height:3;">WE BRAND, WE ACT ACCORDING TO YOUR REQUIREMENTS, AND MEET YOUR NEEDS</div>
            <?elseif($_SERVER['REQUEST_URI'] == '/en/category/produkciya/katalog-svetovozvrashhayushhej-produkcii/'):?>
                <div class="center modal-title-one" style="line-height:3;">WE BRAND, WE ACT ACCORDING TO YOUR REQUIREMENTS, AND MEET YOUR NEEDS</div>
            <?endif;?>
            <div class="modal-dialog" role="document" style="margin:auto">
                <div class="modal-content">
                    <div class="center modal-title-one">Get wholesale price</div>
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
                            <input type="text" name="website" value="" autocomplete="off" tabindex="-1"
                                   style="position:absolute;left:-9999px;height:0;width:0;opacity:0;">

                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>NAME<?else:?>ИМЯ<?endif;?>:</label></div><div class="right"><input type="text" name="name" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label>EMAIL:</label></div><div class="right"><input type="email" name="email" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>PHONE NUMBER<?else:?>ТЕЛЕФОН<?endif;?>:</label></div><div class="right"><input type="text" name="phone" required /></div><div class="clearfix"></div></div>
                            <div class="ssf"><div class="left"><label><?if(wpm_get_language() == 'en'): //Локализация?>ADDITIONAL INFORMATION<?else:?>ДОП. ИНФО<?endif;?>:</label></div><div class="right"><textarea name="question"></textarea></div><div class="clearfix"></div></div>
                            <div class="pp"><label class="galka"><input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process my personal data.<?else:?>Согласен на обработку персональных данных<?endif;?></label></div>
                            <div class="send"><button type="submit" class="y-but 1y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>Send<?else:?>Отправить<?endif;?></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <?endif;?>
    <!--КОНЕЦ форма обратной связи ENG-->

</section>

<section id="contacts">
    <div class="map">
        <?= get_field('map', $uid); ?>
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
                                <div class="left"><label class="galka"><input type="checkbox" required="" /> <?if(wpm_get_language() == 'en'): //Локализация?>I give you permission to process<br>my personal data.<?else:?>Согласен на обработку<br/>персональных данных<?endif;?></label></div>
                                <div class="right"><button type="submit" class="y-but y-but-invert "><?if(wpm_get_language() == 'en'): //Локализация?>ASK A QUESTION<?else:?>Задать вопрос<?endif;?></button></div>
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

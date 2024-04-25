<!doctype html>
<html lang="en">
<?php get_header(); ?>
<div class="main-container container">
    <?php
    $front_page_id = get_option('page_on_front');
    $head_bg_img = get_field('header_bg_img', $front_page_id);
    $head_style = $head_bg_img ? '<header id="totop" class="header container" style="background: url('. $head_bg_img . ') no-repeat">' : '<header id="totop" class="header container"';
    echo $head_style;
    ?>
        <div class="header-nav container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="navigation">
                        <?php
                        if( $menu_items = wp_get_nav_menu_items('primary-menu') ) {
                                    $menu_list = '';
                                    foreach ( $menu_items as $key => $menu_item ) {
                                        $title = $menu_item->title;
                                        $url = $menu_item->url;
                                        $menu_list .= '<a class="nav-item nav-link scroll-link-to" href="' . $url . '">' . $title . '</a>';
                                    }
                                    echo $menu_list;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a href="<?php echo get_site_url();?>"><img class="logo" src="/wp-content/themes/amuse/img/logo.svg"></a>
                </div>
                <div class="col-lg-4">
                    <div class="navigation">
                        <?php if (function_exists('pll_the_languages')) : ?>
                        <ul id="language-switcher">
                            <?php pll_the_languages(array('show_flags' => 1, 'show_names' => 1, 'dropdown' => 1)); ?>
                        </ul>
                        <?php endif; ?>
                        <?php
                        if( $menu_items = wp_get_nav_menu_items('secondary-menu') ) {
                            $menu_list = '';
                            foreach ( $menu_items as $key => $menu_item ) {
                                $title = $menu_item->title;
                                $url = $menu_item->url;
                                $menu_list .= '<a class="nav-item nav-link scroll-link-to" href="' . $url . '">' . $title . '</a>';
                            }
                            echo $menu_list;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if( have_rows('amuse_dialog') ): ?>
            <div class="header-content container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="chat-block">
            <?php while( have_rows('amuse_dialog') ) : the_row();
                $phrase = get_sub_field('amuse_phrase');
                $msg_color = get_sub_field('message_color');
                if ($msg_color == "pink" ){ ?>
                    <div class="chat-row">
                        <img class="chat-icon" src="/wp-content/themes/amuse/img/ic_chat_amuse.svg" alt="icon chat">
                        <div class="<?php echo $msg_color; ?>-massage"><?php echo $phrase; ?></div>
                    </div>
                <?php }else{?>
                        <div class="chat-row">
                            <div class="<?php echo $msg_color; ?>-massage"><?php echo $phrase; ?></div>
                            <img class="chat-icon" src="/wp-content/themes/amuse/img/ic_chat_girl.svg" alt="icon chat">
                        </div>
                        <?php }?>
            <?php
            endwhile;?>
             </div>
                </div>
            </div>
        </div>
       <?php else :?>
        <div class="header-content container" style="height: 414px">
        </div>
        <?php endif;?>
    </header>
    <section id="about" class="section-portfolio container">
        <?php $about = get_field('amuse_about'); ?>
        <div class="between-section access"><?php echo $about['about_title'];?></div>
        <div class="row">
            <div class="about container">
                <div class="row">
                    <div class="wrap-about-text">
                        <div class="col-lg-2 icon-block">
                            <img src="/wp-content/themes/amuse/img/img_micr.svg" alt="icon microphone">
                        </div>
                        <div class="col-lg-9 about-text">
                            <?php echo $about['about_text']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-slider container">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="container text-center my-3">
                                            <div class="row mx-auto my-auto">
                <div class="slider-container">
                    <div class="slider">
                        <?php $group_values = get_field('amuse_about');
                        if ($group_values) {
                        $first_item = true;
                        foreach ($group_values['about_images'] as $repeater_item) {
                        $field_value = $repeater_item['amuse_image']; ?>
                        <div class="slide">
                            <div class="img-container">
                            <img src="<?php echo $field_value[0]; ?>" >
                            </div>
                        </div>
                        <?php
                                            }
                                        }?>
                    </div>
                    <div class="controls">
                        <button class="prev-btn" onclick="prevSlide()">❮</button>
                        <button class="next-btn" onclick="nextSlide()">❯</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
                </div>
            </div>
                <div class="about-massage container">
                <div class="row justify-content-center">
                        <div class="col-lg-8">
                        <div class="chat-row justify-content-center">
                            <div class="img-shadow">
                                <img class="chat-icon" src="/wp-content/themes/amuse/img/ic_chat_amuse.svg" alt="icon chat">
                            </div>
                            <div class="pink-massage-big"><?php echo $about['mic_text']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="trial" class="section-instruments container">
        <div class="between-section teach"><?php the_field('instruments_title');?></div>
        <!--первый блок (строка) дисциплин-->
        <div class="row justify-content-center">
            <div class="cards container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-deck">
                            <?php
                            if( have_rows('instruments') ):
                                while( have_rows('instruments') ) : the_row();?>
                                    <div class="card s_informationTrigger" data-id="<?php the_sub_field('amuse_block_id');?>" data-group="discipline">
                                        <div class="wrap-row">
                                            <div class="wrap-card-image">
                                                <div class="card-image">
                                                    <img src="<?php the_sub_field('image');?>">
                                                </div>
                                            </div>
                                            <div class="card-btn"><a></a></div>
                                        </div>
                                        <div class="card-title">
                                            <?php the_sub_field('name');?>
                                        </div>
                                        <?php if(wp_is_mobile()){?>
                                        <div data-id="<?php the_sub_field('amuse_block_id');?>" data-group="discipline" class="s_informationBlock description container">
                                            <div class="row">
                                                <div class="description-block container">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-12">
                                                            <div class="description-title">
                                                                <p><?php the_sub_field('name');?></p>
                                                            </div>
                                                            <div class="description-text">
                                                                <?php the_sub_field('description');?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>

                                <?php endwhile;
                            else :
                            endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--блоки которые показываются при нажатии на дисциплины из 1-го блока(строке) дисциплин-->
        <?php if(!wp_is_mobile()){?>
        <div class="row justify-content-center">
            <?php
            if( have_rows('instruments') ):
            while( have_rows('instruments') ) : the_row();?>
            <div data-id="<?php the_sub_field('amuse_block_id');?>" data-group="discipline" class="s_informationBlock description container">
                <div class="row">
                    <div class="description-block container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="description-title">
                                    <p><?php the_sub_field('name');?></p>
                                </div>
                                <div class="description-text">
                                    <?php the_sub_field('description');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
            else :
            endif;?>
        </div>
        <?php }?>
        <div class="container btn-mg">
        </div>
</div>
</div>
</div>
</section>
<section id="teacher" class="section-teacher container">
    <div class="between-section teacher"><?php the_field('teachers_title');?></div>
    <div class="row">
        <div class="about-teacher container">
            <div class="row">
                <div class="wrap-about-text">
                    <div class="col-lg-2 icon-block">
                        <img src="/wp-content/themes/amuse/img/img_smile.svg" alt="icon smile">
                    </div>
                    <div class="col-lg-9 about-text">
                        <?php the_field('teachers_descriptions');?>
                    </div>
                </div>
            </div>
            <div class="container btn-mg">
                <div class="row  justify-content-center">
                    <div class="col-lg-4">
                        <a href="<?php the_field('teachers_button_link');?>" style="text-decoration: none;"><div class="trial-btn"><?php the_field('teachers_button_text');?></div></a>
                    </div>
                </div>
        </div>
            <div class="container btn-mg">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="popup-btn">
                            <button class="trial-btn" id="showPopup"><?php the_field('our_price_btn_text');?></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</section>
<section id="price" class="section-price container">
<!--    <div class="between-section price">--><?php //echo "Наші ціни";?><!--</div>-->
    <div class="row">
        <div class="about-price container">
            <div class="row">
                <div class="wrap-about-text" id="calculator">
                    <label for="lessons"><?php the_field('lessons_text');?></label>
                    <select id="lessons">
                        <?php if(get_locale()== 'uk'){
                        for($i = 1; $i <= get_field('max_lessons'); $i++ ){
                            switch ($i) {
                                case 1:
                                case 2:
                                case 3:
                                case 4:
                                    echo '<option value="'. $i .'">'. $i .' заняття</option>';
                                    break;
                                default:
                                    echo '<option value="'. $i .'">'. $i .' занять</option>';
                                    break;
                            }
                        }
                        }else {
                            for ($i = 1; $i <= get_field('max_lessons'); $i++) {
                                switch ($i) {
                                    case 1:
                                        echo '<option value="' . $i . '">' . $i . ' урок</option>';
                                        break;
                                    case 2:
                                    case 3:
                                    case 4:
                                        echo '<option value="' . $i . '">' . $i . ' урокa</option>';
                                        break;
                                    default:
                                        echo '<option value="' . $i . '">' . $i . ' уроков</option>';
                                        break;
                                }
                            }
                        }?>
                    </select>

                    <label for="duration"><?php the_field('minute_text');?></label>
                    <select id="duration">
                        <?php
                        $amuse_time_word = get_locale()=='uk'? 'хвилин' : 'минут';
                        if( have_rows('time_and_price') ):
                            while( have_rows('time_and_price') ) : the_row();
                               echo  '<option value="'. get_sub_field('amuse_time') .'" data-price="'. get_sub_field('amuse_price') .'" data-discount="'. get_sub_field('amuse_discount') .'">'. get_sub_field('amuse_time') .' '.$amuse_time_word.'</option>';
                            endwhile;
                        else :
                        endif;
                        ?>

                    </select>
                    <div>
                    <button id="calculate"><?php the_field('price_button_text');?></button>
                    </div>
                    <div id="result">
                        <!-- Здесь будет выведена таблица с ценами -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contacts" class="section-contact container">
    <div class="between-section teacher"><?php the_field('contacts_title');?></div>
    <div class="row">
        <div class="contacts container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card-column cont">
                        <div class="card">
                            <div class="card-image-contact">
                                <img src="/wp-content/themes/amuse/img/ic_phone.svg">
                            </div>
                            <div class="card-title">
                                <a class="phone-number" href="tel:<?php the_field('tel_1');?>"><?php the_field('tel_1');?></a>
                                <img src="/wp-content/themes/amuse/img/phone-2-xxl.png" alt="phone-img" class="additional-image">
                                <br>
                                <a class="phone-number" href="tel:<?php the_field('tel_2');?>"><?php the_field('tel_2');?></a>
                                <a href="https://t.me/+38<?php the_field('tel_2');?>">
                                    <img src="/wp-content/themes/amuse/img/telegram-xxl.png" alt="Telegram-img" class="additional-image">
                                </a>
                                <a href="viber://chat?number=+38<?php the_field('tel_2');?>">
                                    <img src="/wp-content/themes/amuse/img/viber-4-xxl.png" alt="Viber-img" class="additional-image">
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-image-contact">
                                <img src="/wp-content/themes/amuse/img/ic_home.svg">
                            </div>
                            <div class="card-title">
                                <?php the_field('contacts_address');?>
                            </div>
                            <div class="card-text">
                                <?php the_field('contacts_address_description');?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-image-contact">
                                <a href="mailto:<?php the_field('contacts_e-mail');?>"><img src="/wp-content/themes/amuse/img/ic_mail.svg"></a>
                            </div>
                            <div class="card-title">
                                <?php the_field('contacts_e-mail');?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-image-contact">
                                <div class="wrap-icon">
                                    <a href="<?php the_field('social_link');?>"><img src="/wp-content/themes/amuse/img/ic_fb.svg" alt="иконка фейсбук"></a>
                                    <a href="<?php the_field('social_link_2');?>"><img src="/wp-content/themes/amuse/img/ic_insta.svg" alt="иконка instagram"></a>
                                    <a href="<?php the_field('social_link_3');?>"><img src="/wp-content/themes/amuse/img/ic_youtube.svg" alt="иконка youtube"></a>
                                </div>
                            </div>
                            <div class="card-title">
                                a.muse.liko
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="map">
                        <div class="z-depth-1-half map-container-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.392263224788!2d30.463437105411202!3d50.390036534212285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x38985c6c426d1854!2z0JzRg9C30YvQutCw0LvRjNC90LDRjyDRiNC60L7Qu9CwICJBLU11c2Ui!5e0!3m2!1suk!2sua!4v1575647574415!5m2!1suk!2sua"
                                    width="100%" height="480" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-youtube container">
    <div class="row">
        <div class="youtube-block container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <a href="<?php the_field('social_link_3');?>" style="text-decoration: none;"><img class="youtube-banner" src="/wp-content/themes/amuse/img/img_youtube_banner.svg" alt="иконка youtube"></a>
                    <a href="<?php the_field('social_link_3');?>" style="text-decoration: none;"><div class="subscribe-text">Подпишись на наш Youtube-канал</div></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-form  container">
    <?php get_footer(); ?>
</section>
<div class="to-up-block container">
    <div class="to-up-arrow"><a class="scroll-link-to" href="#totop">  </a></div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!--<script src="/wp-content/themes/amuse/js/script.js"></script>-->
</body>
</html>

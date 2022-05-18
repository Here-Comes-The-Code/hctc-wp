<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 */

get_header(); ?>


<?php
/* Template Name: iHealth */
?>

<div class='c_lpi__container'>
    <section class='c_lpi__hero-banner'>
        <div class='c_lpi__hero-banner-text'>
           
            <div class='c_lpi__hero-banner-title'>
                <h2>
                    Konkurs
                </h2>

                <span>
                    Wygraj ciśnieniomierz <strong>iHealth</strong> i zadbaj o swoich najbliższych
                </span>
            </div>
            <div class='c_lpi__hero-banner-logos'>
                <img src="https://smartme.pl/wp-content/uploads/2021/04/ihealth-logo.jpg" alt="">
                <img src="https://smartme.pl/wp-content/uploads/2021/04/logo_smartme.png" alt="">
            </div>

        </div>
        <div class='c_lpi__hero-banner-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/04/smartmeihealth1-scaled.jpg" alt="">
        </div>
    </section>
    <section class='c_lpi__half'>

        <div class='c_lpi__description '>
            <h3>opis konkursu</h3>
            <p>
                W czasach koronawirusa szczególnie ciężko znaleźć nam czas, a przede wszystkim możliwości spotkania z naszymi ukochanymi dziadkami i babciami.
            </p>
            <p>
                Dodatkowo, przez panującą pandemię i związane z nią zamieszanie, często inne choroby schodzą na dalszy plan - choć potrafią one być równie groźne dla zdrowia naszych najbliższych.
            </p>
            <p class='c_lpi__description--bold'>
                Dlatego wspólnie z firmą <strong> iHealth </strong> organizujemy konkurs, którego celem jest zwrócenie uwagi na zdrowie - nasze, ale również naszych babć i dziadków.
            </p>
            <p>
                Konkurs jest bardzo prosty - będziemy prosili Was o wypełnienie krótkiego formularza w którym opiszecie dlaczego to właśnie Wy powinniście otrzymać urządzenie.
            </p>
            <p>
                Następnie, przy współpracy z firmą <strong> iHealth </strong>, do wybranych przez Jury osób przesłane zostaną profesjonalne ciśnieniomierze, za pomocą których będziecie mogli dbać i wykonywać pomiary ciśnienia swoich rodziców, codziennie - przez okres trzech tygodni.
            </p>
            <p>
                Po upływie każdego pełnego tygodnia  przesyłacie do nas zrzut ekranu na którym widać wyniki pomiarów - jest to warunek, abyście urządzenia mogli otrzymać na zawsze.
            </p>
            <p>
                Gorąco zapraszamy do udziału - <strong>dbajmy o zdrowie najbliższych. </strong>
            </p>
        </div>
        <div class='c_lpi__description-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/04/ihealth-track.jpg" alt="">
        </div>
    </section>
    <section class='c_lpi__full c_lpi__faq'>
        <div class='c_lpi__faq-bg'>
            <video autoplay loop>
                <source src="https://smartme.pl/wp-content/uploads/2021/04/bg.mp4" type="video/mp4">
                Twoja przegladarka nie obsluguje tagu video.
            </video>

        </div>
        <div class='c_lpi__faq-title'>
            <h3>Jak to działa? </h3>
        </div>
        <div class='c_lpi__faq-steps'>
            <div class='c_lpi__faq-step'>
                <span>1</span>
                <i class="fas fa-pen"></i>
                <p>Wypełniasz poniższy formularz - masz czas do 23.05</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>2</span>
                <i class="fas fa-question"></i>
                <p>Opisujesz w nim dlaczego to właśnie Tobie oraz Twoim najbliższym powinniśmy wręczyć ciśnieniomierz iHealth. </p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>3</span>
                <i class="fas fa-users"></i>
                <p>W dniu 29.05 Jury wybierze osoby, które otrzymają profesjonalne ciśnieniomierze iHealth.</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>4</span>
                <i class="fas fa-business-time"></i>
                <p>Przez okres trwania projektu (tj. 07.06 do 30.07) dbaj o to, aby Twój dziadek lub babcia wykonywali codziennie pomiary ciśnienia.</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>5</span>
                <i class="fas fa-trophy"></i>
                <p>Po upływie każdego pełnego tygodnia przesyłaj nam screen z wykonanymi pomiarami - po przesłaniu pełnej puli wyników będziesz mógł zatrzymać urządzenie na zawsze!</p>
            </div>
        </div>
    </section>
    <section class='c_lpi__half'>
        <div class='c_lpi__form'>
            <div class='c_lpi__form-title'>
                <h3>Formularz</h3>
            </div>
            <div class='c_lpi__form-content'>
                <?php echo do_shortcode( '[ninja_form id="1"]' ); ?>
            </div>
           
        </div>
        <div class='c_lpi__description-img c_lpi__form-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/04/ihealth3-scaled.jpg" alt="">
        </div>
        <div class='c_lpi__form-notification'>
                <p>Wysłanie wypełnionego formularza jest równoznaczne z zaakceptowaniem <a href="/regulamin-ihealth" target="_blank"> regulaminu  konkursu.  </a>
                </p>
                <p>Administratorem Państwa danych osobowych jest smartme.pl</p>
            </div>
    </section>
</div>



</div>

<?php get_footer(); ?>
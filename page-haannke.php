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
/* Template Name: Home Automation & Annke */
?>

<div class='c_lpi__container'>
    <section class='c_lpi__hero-banner'>
        <div class='c_lpi__hero-banner-text'>
           
            <div class='c_lpi__hero-banner-title'>
                <h2>
                    Konkurs
                </h2>
            </div>
            <div class='c_lpi__hero-banner-logos'>
                <img src="https://smartme.pl/wp-content/uploads/2021/11/logo-annke.jpg" alt="">
                <img src="https://smartme.pl/wp-content/uploads/2021/11/logo-ha.jpg" alt="">
                <img src="https://smartme.pl/wp-content/uploads/2021/04/logo_smartme.png" alt="">
            </div>

        </div>
        <div class='c_lpi__hero-banner-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/11/stephan-bechert-yFV39g6AZ5o-unsplash-scaled.jpg" alt="">
        </div>
    </section>
    <section class='c_lpi__half'>

        <div class='c_lpi__description '>
            <h3>opis konkursu</h3>
            <p>
                Automatyka domowa w obecnych czasach odgrywa często kluczowe znaczenie w naszym domowym zaciszu.
            </p>
            <p>
                Termostaty, kamery, dzwonki, kamery, oświetlenie - co raz więcej przedmiotów pozwala nam na rozwiązanie codziennych problemów w zupełnie nowy - inteligentny sposób.
            </p>
            <p class='c_lpi__description--bold'>
                I tu wkraczamy my! Wspólnie z firmą <strong> Annke </strong>  organizujemy konkurs, którego celem jest przedstawienie Waszych najciekawszych automatyzacji w <strong> Home Assistant!</strong>.
            </p>
            <p>
                Konkurs jest prosty - poprosimy Was o przygotowanie krótkiego opisu oraz filmu prezentującego automatyzacje wykonane przy pomocy <strong> Home Assistant!</strong> w waszym domu!.
            </p>
            <p>
                Film powinien być nakręcony horyzontalnie(poziomo) i może zostać zamieszczony np. w serwisie YouTube.
            </p>
            <p>
                Adres URL do filmu wraz z opisem oraz informacjami kontaktowymi należy przesyłać poprzez załączony poniżej formularz. 
            </p>
            <p>
                Następnie, wśrod zebranych zgłoszeń, przy współpracy z firmą <strong> Annke </strong> wybierzemy zwycięzce, który otrzyma kamerę firmy Annke - model C500.
            </p>
            <p>
                Gorąco zapraszamy do udziału - <strong>zaprezentujcie Wasz smart Home Assistant! </strong>
            </p>
        </div>
        <div class='c_lpi__description-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/11/hannkec500.jpg" alt="">
        </div>
    </section>
    <section class='c_lpi__full c_lpi__faq'>
        <div class='c_lpi__faq-bg'>
          <img src="https://smartme.pl/wp-content/uploads/2021/11/bg-hannke-1-scaled.jpg" alt="">

        </div>
        <div class='c_lpi__faq-title'>
            <h3>Jak to działa? </h3>
        </div>
        <div class='c_lpi__faq-steps'>
            <div class='c_lpi__faq-step'>
                <span>1</span>
                <i class="fas fa-video"></i>
                <p>Przygotowujesz krótki film przedstawiający automatyzacje Home Assistant, które zainstalowałeś u siebie.</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>2</span>
                <i class="fas fa-quote-right"></i>
                <p>Do filmu dołączasz krótki opis przedstawionych rozwiązań.</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>3</span>
                <i class="fas fa-pen"></i>
                <p>Wypełniasz poniższy formularz - masz czas do 14.12.2021</p>
            </div>
            <div class='c_lpi__faq-step'>
                <span>4</span>
                <i class="fas fa-trophy"></i>
                <p>W dniu 21.12.2021 Jury wybierze Zwyciezcę - osobę, która otrzyma kamerę firmy Annke - model C500.</p>
            </div>
        </div>
    </section>
    <section class='c_lpi__half'>
        <div class='c_lpi__form'>
            <div class='c_lpi__form-title'>
                <h3>Formularz</h3>
            </div>
            <div class='c_lpi__form-content'>
                <?php echo do_shortcode( '[ninja_form id="3"]' ); ?>
            </div>
           
        </div>
        <div class='c_lpi__description-img c_lpi__form-img'>
            <img src="https://smartme.pl/wp-content/uploads/2021/11/smarthome.jpg" alt="">
        </div>
        <div class='c_lpi__form-notification'>
                <p>Wysłanie wypełnionego formularza jest równoznaczne z zaakceptowaniem <a href="/regulamin-konkursu-home-automation-annke/" target="_blank"> regulaminu  konkursu.  </a>
                </p>
                <p>Administratorem Państwa danych osobowych jest smartme.pl</p>
            </div>
    </section>
</div>



</div>

<?php get_footer(); ?>
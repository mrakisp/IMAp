<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

$handler = new Handler();
$handler->getJavascriptAntiBot();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="description"
              content="AJAX Live Search is a PHP search form that similar to Google Autocomplete feature displays the result as you type">
        <meta name="keywords"
              content="Ajax Live Search, Autocomplete, Auto Suggest, PHP, HTML, CSS, jQuery, JavaScript, search form, MySQL, web component, responsive">
        <meta name="author" content="Ehsan Abbasi">

        <title>AJAX Live Search</title>

        <!-- Live Search Styles -->
        <link rel="stylesheet" href="./css/fontello.css">
        <link rel="stylesheet" href="./css/animation.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/ajaxlivesearch.min.css">
        <link rel="stylesheet" type="text/css" href="./dist/css/style.min.css">
        
        <!--[if IE 7]>
        <link rel="stylesheet" href="css/fontello-ie7.css">
        <![endif]-->
        
    </head>
    <body id="homepage">

        <header>
            <div class="top-area">
                <div class="top-area__logo">
                    <h1 class="logo">
                        <a href="/">
                            <img src="https://s.prth.gr/assets/Media/logo-main.svg" alt="logo">
                        </a>
                    </h1>
                </div>
                <nav>
                    <ul class="main-menu">
                        <li><a href="default.asp">Home</a></li>
                        <li><a href="news.asp">News</a></li>
                        <li><a href="contact.asp">Contact</a></li>
                        <li><a href="about.asp">About</a></li>
                      </ul>
                </nav>
            </div>
            <!-- Search Form Demo -->
            <div class="search">
                <input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
            </div>
        </div>
        <!-- /Search Form Demo -->
    </div>
</header>
<main>
    <section class="col-md-9 most-related">
        <article>
            <a href="" class=""></a>
            <figure data-image-mode="article">
                <a href="" class="">
                    <picture>
                        <img class="lazyloaded" src="https://i1.prth.gr/images/595x335/files/2018-10-22/keravnos.jpg" alt="keravnos">
                    </picture>
                </a>
            </figure>
            <div class="article-desc">
                <div class="article-desc__heading">
                    <h3>
                        <a href="https://www.protothema.gr/greece/article/831943/kairos-pano-apo-20000-keraunoi-mehri-to-mesimeri-guro-apo-ton-oresti/">Καιρός: Πάνω από 20.000 κεραυνοί μέχρι το μεσημέρι γύρω από τον «Ορέστη»</a>
                    </h3>
                </div>
                <div class="article-desc__sum">
                    <p>
                        Το σύστημα ανίχνευσης κεραυνών «ΖΕΥΣ» του Εθνικού Αστεροσκοπείου Αθηνών κατέγραψε πάνω από 20.000 κεραυνούς – Ποιες περιοχές θα επηρεάσει
                    </p>
                </div>
                <div class="article-desc__time">
                    <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title="22/10/2018, 18:11">22/10/2018, 18:11</time>   
                </div>
            </div>
        </article>
         <article>
            <a href="" class=""></a>
            <figure data-image-mode="article">
                <a href="" class="">
                    <picture>
                        <img class="lazyloaded" src="https://i1.prth.gr/images/595x335/files/2018-10-22/keravnos.jpg" alt="keravnos">
                    </picture>
                </a>
            </figure>
            <div class="article-desc">
                <div class="article-desc__heading">
                    <h3>
                        <a href="https://www.protothema.gr/greece/article/831943/kairos-pano-apo-20000-keraunoi-mehri-to-mesimeri-guro-apo-ton-oresti/">Καιρός: Πάνω από 20.000 κεραυνοί μέχρι το μεσημέρι γύρω από τον «Ορέστη»</a>
                    </h3>
                </div>
                <div class="article-desc__sum">
                    <p>
                        Το σύστημα ανίχνευσης κεραυνών «ΖΕΥΣ» του Εθνικού Αστεροσκοπείου Αθηνών κατέγραψε πάνω από 20.000 κεραυνούς – Ποιες περιοχές θα επηρεάσει
                    </p>
                </div>
                <div class="article-desc__time">
                    <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title="22/10/2018, 18:11">22/10/2018, 18:11</time>   
                </div>
            </div>
        </article>
         <article>
            <a href="" class=""></a>
            <figure data-image-mode="article">
                <a href="" class="">
                    <picture>
                        <img class="lazyloaded" src="https://i1.prth.gr/images/595x335/files/2018-10-22/keravnos.jpg" alt="keravnos">
                    </picture>
                </a>
            </figure>
            <div class="article-desc">
                <div class="article-desc__heading">
                    <h3>
                        <a href="https://www.protothema.gr/greece/article/831943/kairos-pano-apo-20000-keraunoi-mehri-to-mesimeri-guro-apo-ton-oresti/">Καιρός: Πάνω από 20.000 κεραυνοί μέχρι το μεσημέρι γύρω από τον «Ορέστη»</a>
                    </h3>
                </div>
                <div class="article-desc__sum">
                    <p>
                        Το σύστημα ανίχνευσης κεραυνών «ΖΕΥΣ» του Εθνικού Αστεροσκοπείου Αθηνών κατέγραψε πάνω από 20.000 κεραυνούς – Ποιες περιοχές θα επηρεάσει
                    </p>
                </div>
                <div class="article-desc__time">
                    <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title="22/10/2018, 18:11">22/10/2018, 18:11</time>   
                </div>
            </div>
        </article>
    </section>
    <aside class="col-md-3">
        test aside content
    </aside>
</main>    


<!-- Placed at the end of the document so the pages load faster -->
<script src="./src/js/jquery-1.11.1.min.js"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="./src/js/ajaxlivesearch.js"></script>

<script>
    jQuery(document).ready(function () {
        jQuery(".mySearch").ajaxlivesearch({
            loaded_at: <?php echo time(); ?>,
            token: <?php echo "'" . $handler->getToken() . "'"; ?>,
            max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
            onResultClick: function (e, data) {
                // get the index 0 (first column) value
                var selectedOne = jQuery(data.selected).find('td').eq('0').text();

                // set the input value
                jQuery('#ls_query').val(selectedOne);

                // hide the result
                jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
            },
            onResultEnter: function (e, data) {
                // do whatever you want
                jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
            },
            onAjaxComplete: function (e, data) {

            }
        });
    })
</script>

</body>
</html>


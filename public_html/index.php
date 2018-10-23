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
                    <h1>
                        <a href="/">
                            <img src="https://via.placeholder.com/140x100" alt="logo">
                        </a>
                    </h1>
                </div>
                <nav class="top-area__main-menu">
                    <ul class="top-area__main-menu__ul">
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
    <section class="col-md-10 most-related">
        <h2 class="text-left text-uppercase">Contact Me</h2>
        
        <div class="most-related__articles">
            
        <article>
            <div class = "article_container">
                <div class="article_container__article-desc">
                    <div class="article_container__article-desc__heading">
                        <h3>
                            <a href="https://www.protothema.gr/greece/article/831943/kairos-pano-apo-20000-keraunoi-mehri-to-mesimeri-guro-apo-ton-oresti/">Καιρός: Πάνω από 20.000 κεραυνοί μέχρι το μεσημέρι γύρω από τον «Ορέστη»</a>
                        </h3>
                    </div>
                    <div class="article_container__article-desc__time">
                        <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title="22/10/2018, 18:11">22/10/2018, 18:11</time>   
                    </div>
                    <div class="article_container__article-desc__sum">
                        <p>
                            Το σύστημα ανίχνευσης κεραυνών «ΖΕΥΣ» του Εθνικού Αστεροσκοπείου Αθηνών κατέγραψε πάνω από 20.000 κεραυνούς – Ποιες περιοχές θα επηρεάσει
                        </p>
                    </div>
                    
                </div>
            </div>
            <div class = "article_image">
                <figure data-image-mode="article">
                    <a href="" class="">
                        <picture>
                        <img class="lazyloaded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a060a7d9%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a060a7d9%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="keravnos">
                        </picture>
                    </a>
                </figure>
            </div>
        </article>
        <article>
            <div class = "article_container">
                <div class="article_container__article-desc">
                    <div class="article_container__article-desc__heading">
                        <h3>
                            <a href="https://www.protothema.gr/greece/article/831943/kairos-pano-apo-20000-keraunoi-mehri-to-mesimeri-guro-apo-ton-oresti/">Καιρός: Πάνω από 20.000 κεραυνοί μέχρι το μεσημέρι γύρω από τον «Ορέστη»</a>
                        </h3>
                    </div>
                    <div class="article_container__article-desc__time">
                        <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title="22/10/2018, 18:11">22/10/2018, 18:11</time>   
                    </div>
                    <div class="article_container__article-desc__sum">
                        <p>
                            Το σύστημα ανίχνευσης κεραυνών «ΖΕΥΣ» του Εθνικού Αστεροσκοπείου Αθηνών κατέγραψε πάνω από 20.000 κεραυνούς – Ποιες περιοχές θα επηρεάσει
                        </p>
                    </div>
                    
                </div>
            </div>
            <div class = "article_image">
                <figure data-image-mode="article">
                    <a href="" class="">
                        <picture>
                        <img class="lazyloaded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a060a7d9%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a060a7d9%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="keravnos">
                        </picture>
                    </a>
                </figure>
            </div>
        </article>
    </div>
    </section>
    <aside class="col-md-2 aside-right">
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


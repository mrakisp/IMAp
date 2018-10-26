<!DOCTYPE html>

<?php
$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'dbq.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

$handler = new Handler();
$handler->getJavascriptAntiBot();
?>
<html lang="en">
    <head>
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="description"
              content="">
        <meta name="keywords"
              content="">
        <meta name="author" content="MrAkisp">

        <title>mmm</title>

        <!-- Live Search Styles -->
        <link rel="stylesheet" href="./css/fontello.css">
        <link rel="stylesheet" href="./css/animation.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/ajaxlivesearch.min.css">
        <link rel="stylesheet" type="text/css" href="./dist/css/style.min.css">
        <link rel="stylesheet" href="./css/owl.carousel.min.css" />

    </head>
    
    <body id="homepage">

        <header>
            <?php include './general/header.php'; ?>
            <?php include './general/functions.php'; ?>
            <!-- Search Form -->
            <div class="search">
                <input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
            </div>
            <!-- /Search Form -->
        </header>
        
        <main>
            <section class="col-md-12 most-related">
                <h2 class="text-left text-uppercase">Contact Me</h2>

                <div class="most-related__articles">

                    <?php
                    
                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released, m_plot FROM movies LIMIT 4";
                    $row_movies = $conn->query($sql);
                    while ($rs_movies = $row_movies->fetch_assoc()) {
                        ?>
                        <article>
                            <div class = "article_container">
                                <div class="article_container__article-desc">
                                    <div class="article_container__article-desc__heading">
                                        <h3>
                                            <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/"><?php echo $rs_movies["m_name"]; ?></a>
                                        </h3>
                                    </div>
                                    <div class="article_container__article-desc__time">
                                        <time datetime="2018-10-22T15:11:00Z" title=""><?php echo $rs_movies["m_released"]; ?></time>   
                                    </div>
                                    <div class="article_container__article-desc__sum">
                                        <p>
                                            <?php echo trim_text($rs_movies["m_plot"], 80); ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class = "article_image">
                                <figure>
                                    <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/">
                                        <picture>
                                            <img class="lazyloaded" src="<?php echo $rs_movies["m_poster"]; ?>" alt="<?php echo $rs_movies["m_name"]; ?>">
                                        </picture>
                                    </a>
                                </figure>
                            </div>
                            <div class="article_infobox" style="opacity:0;">teastaetst</div>
                        </article>
                        <?php
                    }
                    ?>   
                    </div>
           
            </section>
            
            <section class="col-md-10">
            <div class="most-related__articles">
                <div class="owl-carousel owl-theme">
                    <?php
                    
                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released, m_plot FROM movies LIMIT 4";
                    $row_movies = $conn->query($sql);
                    while ($rs_movies = $row_movies->fetch_assoc()) {
                        ?>
                        <article>
                            <div class = "article_container">
                                <div class="article_container__article-desc">
                                    <div class="article_container__article-desc__heading">
                                        <h3>
                                            <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/"><?php echo $rs_movies["m_name"]; ?></a>
                                        </h3>
                                    </div>
                                    <div class="article_container__article-desc__time">
                                        <time datetime="2018-10-22T15:11:00Z" title=""><?php echo $rs_movies["m_released"]; ?></time>   
                                    </div>
                                    <div class="article_container__article-desc__sum">
                                        <p>
                                            <?php echo trim_text($rs_movies["m_plot"], 80); ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class = "article_image">
                                <figure>
                                    <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/">
                                        <picture>
                                            <img class="lazyloaded" src="<?php echo $rs_movies["m_poster"]; ?>" alt="<?php echo $rs_movies["m_name"]; ?>">
                                        </picture>
                                    </a>
                                </figure>
                            </div>
                            <div class="article_infobox" style="opacity:0;"></div>
                        </article>
                        <?php
                    }
                    ?>   
                    </div>
                </div>
            </section>
            <aside class="col-md-2 aside-right">
                test aside content
            </aside>
            
        </main>    
        <footer>
        
        </footer>            

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./src/js/jquery-1.11.1.min.js"></script>
        <script src="./src/js/owl.carousel.min.js"></script>            
        <!-- Live Search Script -->
        <script type="text/javascript" src="./src/js/ajaxlivesearch.js"></script>

        <script>

            jQuery(document).ready(function () {

                jQuery('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:3
                        }
                    }
                });

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
<style>
.owl-carousel .owl-item {
    display: flex;
    flex-direction: column;
}

.article_infobox {
    width: 100%;
    max-width: 398px;
    background: #2c3e50;
    color: #fff;
    position: absolute;
    height: 200px;
    z-index: 99;
    margin-top: 255px;

}
article:hover .article_infobox {
    opacity: 1!important;
    /* transition-property: all; */
    /* transition-duration: .5s; */
    /* transition: all .5s ease-in-out; */
    /* transition-timing-function: cubic-bezier(0, 1, 0.5, 1); */
    -moz-transition: opacity 0.4s ease-in-out;
    -o-transition: opacity 0.4s ease-in-out;
    -webkit-transition: opacity 0.4s ease-in-out;
    transition: opacity 0.4s ease-in-out;
    /* transition: all .5s ease-in-out; */
}

body {
    background: #0c0b21;
}

.most-related__articles>article {
    border: 2px solid rgba(198, 198, 198, 0.9);
    box-shadow: 0px 0px 34px 0px #ededed;
}
.most-related__articles .article_container {
    background: #fff;
}

</style>
    </body>
</html>


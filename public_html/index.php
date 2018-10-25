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

    </head>
    
    <body id="homepage">

        <header>
            <?php include './general/header.php'; ?>
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
                    
                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released, m_plot FROM movies LIMIT 8";
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
                                        <time data-plugin-timeago="" datetime="2018-10-22T15:11:00Z" title=""><?php echo $rs_movies["m_released"]; ?></time>   
                                    </div>
                                    <div class="article_container__article-desc__sum">
                                        <p>
                                            <?php echo $rs_movies["m_plot"]; ?>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class = "article_image">
                                <figure data-image-mode="article">
                                    <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/">
                                        <picture>
                                            <img class="lazyloaded" src="<?php echo $rs_movies["m_poster"]; ?>" alt="<?php echo $rs_movies["m_name"]; ?>">
                                        </picture>
                                    </a>
                                </figure>
                            </div>
                        </article>
                        <?php
                    }
                    ?>   

                </div>
            </section>
            
            <section class="col-md-10">
                
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


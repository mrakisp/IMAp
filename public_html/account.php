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
        <?php include './general/head.php'; ?>
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
            <section id="most-related">

                <div class="most-related__articles">

                    <div class="tabs-wrapper">
                        <h2>Most Related</h2>
                        <h6>subtitle</h6>
                        <nav class="tabs">
                            <div class="selector"></div>
                            <a href="/#tab1" class="active"><i class="fas fa-burn"></i>Ταινίες</a>
                            <a href="/#tab2"><i class="fas fa-bomb"></i>Σειρές</a>
                            <!-- <a href="/#tab3"><i class="fas fa-bolt"></i>Thor</a>
                            <a href="/#tab4"><i class="fab fa-superpowers"></i>Black Panther</a> -->
                        </nav>
                    </div>
                    <div id="tab1" class="tab-container active-tab">
                        <?php
                        $sql = "SELECT m_name, m_poster, m_imdbId, m_released,m_runtime,m_genre, m_plot,m_ratingMetacritic,m_ratingImdb,m_ratingTomato, m_imdbVotes FROM movies LIMIT 8";
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
                                                <?php echo trim_text($rs_movies["m_plot"], 50); ?>
                                            </p>
                                        </div>
                                        <div class="article_container__article-desc__time">
                                            <i class="far fa-clock"></i> <?php echo $rs_movies["m_runtime"]; ?>
                                        </div>
                                        <div class="article_container__article-desc__genre">
                                            <?php echo $rs_movies["m_genre"]; ?>
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
                                <div class="article_infobox">
                                    <div class="article_infobox__ratings">
                                        <?php if ($rs_movies["m_ratingImdb"]) { ?>
                                            <div class="article_infobox__ratings__title title--imdb"></div>
                                            <div class="article_infobox__ratings__value value--imdb"><?php echo $rs_movies["m_ratingImdb"]; ?><span> /10</span></div>
                                        <?php } ?>
                                        <?php if ($rs_movies["m_ratingTomato"]) { ?>
                                            <div class="article_infobox__ratings__title title--rotten"></div>
                                            <div class="article_infobox__ratings__value value--rotten"><?php echo $rs_movies["m_ratingTomato"]; ?></div>
                                        <?php } else { ?>
                                            <div class="article_infobox__ratings__title title--imdb title--votes"></div>
                                            <div class="article_infobox__ratings__value value--imdb"><span><?php echo $rs_movies["m_imdbVotes"]; ?></span></div>
                                        <?php } ?>
                                        <?php if ($rs_movies["m_ratingMetacritic"]) { ?>
                                            <div class="article_infobox__ratings__title title--metrics"></div>
                                            <div class="article_infobox__ratings__value value--metrics"><?php echo $rs_movies["m_ratingMetacritic"]; ?><span> /100</span></div>
                                        <?php } ?>
                                    </div>
                                    <div class="article_infobox__links">
                                        <div class="article_infobox__links__imap">
                                            <a href="">Περισσότερα</a>
                                        </div>
                                        <div class="article_infobox__links__imdb">
                                            <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/">Στο Imdb</a>
                                        </div>
                                    </div>
                                    <div class="article_infobox__item">
                                        <div class="article_infobox__item__seen"><i class="far fa-eye"></i></div>
                                        <div class="article_infobox__item__fav"><i class="far fa-heart"></i></div>
                                        <div class="article_infobox__item__com"><i class="far fa-comments"></i></div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>   
                    </div>
                    <div id="tab2" class="tab-container">
                        <?php
                        $sql = "SELECT m_name, m_poster, m_imdbId, m_released,m_runtime,m_genre, m_plot,m_ratingMetacritic,m_ratingImdb,m_ratingTomato, m_imdbVotes FROM series LIMIT 4";
                        $row_series = $conn->query($sql);
                        while ($rs_series = $row_series->fetch_assoc()) {
                            ?>
                            <article>
                                <div class = "article_container">
                                    <div class="article_container__article-desc">
                                        <div class="article_container__article-desc__heading">
                                            <h3>
                                                <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_series["m_imdbId"]; ?>/"><?php echo $rs_series["m_name"]; ?></a>
                                            </h3>
                                        </div>
                                        <div class="article_container__article-desc__time">
                                            <time datetime="2018-10-22T15:11:00Z" title=""><?php echo $rs_series["m_released"]; ?></time>   
                                        </div>
                                        <div class="article_container__article-desc__sum">
                                            <p>
                                                <?php echo trim_text($rs_series["m_plot"], 50); ?>
                                            </p>
                                        </div>
                                        <div class="article_container__article-desc__time">
                                            <i class="far fa-clock"></i> <?php echo $rs_series["m_runtime"]; ?>
                                        </div>
                                        <div class="article_container__article-desc__genre">
                                            <?php echo $rs_series["m_genre"]; ?>
                                        </div>

                                    </div>
                                </div>
                                <div class = "article_image">
                                    <figure>
                                        <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_series["m_imdbId"]; ?>/">
                                            <picture>
                                                <img class="lazyloaded" src="<?php echo $rs_series["m_poster"]; ?>" alt="<?php echo $rs_series["m_name"]; ?>">
                                            </picture>
                                        </a>
                                    </figure>
                                </div>
                                <div class="article_infobox">
                                    <div class="article_infobox__ratings">
                                        <?php if ($rs_series["m_ratingImdb"]) { ?>
                                            <div class="article_infobox__ratings__title title--imdb"></div>
                                            <div class="article_infobox__ratings__value value--imdb"><?php echo $rs_series["m_ratingImdb"]; ?><span> /10</span></div>
                                        <?php } ?>
                                        <?php if ($rs_series["m_ratingTomato"]) { ?>
                                            <div class="article_infobox__ratings__title title--rotten"></div>
                                            <div class="article_infobox__ratings__value value--rotten"><?php echo $rs_series["m_ratingTomato"]; ?></div>
                                        <?php } else { ?>
                                            <div class="article_infobox__ratings__title title--imdb title--votes"></div>
                                            <div class="article_infobox__ratings__value value--imdb"><span><?php echo $rs_series["m_imdbVotes"]; ?></span></div>
                                        <?php } ?>
                                        <?php if ($rs_series["m_ratingMetacritic"]) { ?>
                                            <div class="article_infobox__ratings__title title--metrics"></div>
                                            <div class="article_infobox__ratings__value value--metrics"><?php echo $rs_series["m_ratingMetacritic"]; ?><span> /100</span></div>
                                        <?php } ?>
                                    </div>
                                    <div class="article_infobox__links">
                                        <div class="article_infobox__links__imap">
                                            <a href="">Περισσότερα</a>
                                        </div>
                                        <div class="article_infobox__links__imdb">
                                            <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_series["m_imdbId"]; ?>/">Στο Imdb</a>
                                        </div>
                                    </div>
                                    <div class="article_infobox__item">
                                        <div class="article_infobox__item__seen"><i class="far fa-eye"></i></div>
                                        <div class="article_infobox__item__fav"><i class="far fa-heart"></i></div>
                                        <div class="article_infobox__item__com"><i class="far fa-comments"></i></div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>   
                    </div>
                </div>

            </section>

            <section id="top-rated">
                <h2>Top Rated</h2>
                <h6>subtitle</h6> 
                <div class="owl-carousel owl-theme">
                    <?php
                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released, m_runtime, m_genre, m_plot, m_ratingMetacritic, m_ratingImdb, m_ratingTomato, m_imdbVotes FROM movies";
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
                                            <?php echo trim_text($rs_movies["m_plot"], 50); ?>
                                        </p>
                                    </div>
                                    <div class="article_container__article-desc__time">
                                        <i class="far fa-clock"></i> <?php echo $rs_movies["m_runtime"]; ?>
                                    </div>
                                    <div class="article_container__article-desc__genre">
                                        <?php echo $rs_movies["m_genre"]; ?>
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
                            <div class="article_infobox">
                                <div class="article_infobox__ratings">
                                    <?php if ($rs_movies["m_ratingImdb"]) { ?>
                                        <div class="article_infobox__ratings__title title--imdb"></div>
                                        <div class="article_infobox__ratings__value value--imdb"><?php echo $rs_movies["m_ratingImdb"]; ?><span> /10</span></div>
                                    <?php } ?>
                                    <?php if ($rs_movies["m_ratingTomato"]) { ?>
                                        <div class="article_infobox__ratings__title title--rotten"></div>
                                        <div class="article_infobox__ratings__value value--rotten"><?php echo $rs_movies["m_ratingTomato"]; ?></div>
                                    <?php } else { ?>
                                        <div class="article_infobox__ratings__title title--imdb title--votes"></div>
                                        <div class="article_infobox__ratings__value value--imdb"><span><?php echo $rs_movies["m_imdbVotes"]; ?></span></div>
                                    <?php } ?>
                                    <?php if ($rs_movies["m_ratingMetacritic"]) { ?>
                                        <div class="article_infobox__ratings__title title--metrics"></div>
                                        <div class="article_infobox__ratings__value value--metrics"><?php echo $rs_movies["m_ratingMetacritic"]; ?><span> /100</span></div>
                                    <?php } ?>
                                </div>
                                <div class="article_infobox__links">
                                    <div class="article_infobox__links__imap">
                                        <a href="">Περισσότερα</a>
                                    </div>
                                    <div class="article_infobox__links__imdb">
                                        <a target="_blank" href="https://www.imdb.com/title/<?php echo $rs_movies["m_imdbId"]; ?>/">Στο Imdb</a>
                                    </div>
                                </div>
                                <div class="article_infobox__item">
                                    <div class="article_infobox__item__seen"><i class="far fa-eye"></i></div>
                                    <div class="article_infobox__item__fav"><i class="far fa-heart"></i></div>
                                    <div class="article_infobox__item__com"><i class="far fa-comments"></i></div>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>   
                </div>

            </section>
            <section class="aside">
                <div class="wrapper">
                    <header>
                        <h1>Tab switch</h1>
                    </header>
                    <nav>
                        <ul>
                            <li class="gnav1">Tab1</li>
                            <li class="gnav2">Tab2</li>
                            <li class="gnav3">Tab3</li>
                            <li class="gnav4">Tab4</li>
                        </ul>
                    </nav>
                    <div class="contents" id="contents">
                        <div class="container">
                            <article id="page1" class="show top">
                                <section>
                                    <h1>Tab1 Title</h1>
                                    <p>This is tab one.</p>
                                </section>
                            </article>
                            <article id="page2">
                                <section>
                                    <h1>Tab2 Title</h1>
                                    <p>This is tab two.</p>
                                </section>
                            </article>
                            <article id="page3">
                                <section>
                                    <h1>Tab3 Title</h1>
                                    <p>This is tab three.</p>
                                </section>
                            </article>
                            <article id="page4">
                                <section>
                                    <h1>Tab4 Title</h1>
                                    <p>This is tab four.</p>
                                </section>
                            </article>
                            <article id="page5">
                                <section>
                                    <h1>Tab5 Title</h1>
                                    <p>This is tab five</p>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

        </main>    
        <footer>
            <?php include './general/footer.php'; ?>
        </footer>            

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./src/js/jquery-1.11.1.min.js"></script>
        <script src="./src/js/owl.carousel.min.js"></script>            
        <!-- Live Search Script -->
        <script type="text/javascript" src="./src/js/ajaxlivesearch.js"></script>
        <script type="text/javascript" src="./dist/js/scripts.min.js"></script>            
        <script>

            jQuery(document).ready(function () {

                jQuery(".mySearch").ajaxlivesearch({
                    loaded_at: <?php echo time(); ?>,
                    token: <?php echo "'" . $handler->getToken() . "'"; ?>,
                    max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
                    onResultClick: function (e, data) {
                        // get the index 0 (first column) value
                        var selectedOne = jQuery(data.selected).find('td').eq('0').text();
                        console.log()
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
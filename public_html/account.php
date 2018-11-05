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

    <body id="account">

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
            <section id="">
                <div class="container">

                    <div class="leftbox">
                        <nav>
                            <a id="profile" class="active"><i class="fa fa-user"></i> Personal Info</a>
                            <a id="payment"><i class="fa fa-credit-card"></i> Movies Seen</a>
                            <a id="subscription"><i class="fa fa-tv"></i> Series Seen</a>
                            <a id="privacy"><i class="fa fa-tasks"></i> Interests</a>
                            <a id="settings"><i class="fa fa-cog"></i></a>
                        </nav>
                    </div>
                    <div class="rightbox">
                        <div class="profile">
                            <h1>Personal Info</h1>
                            <h2>Full Name</h2>
                            <p>Julie Park <button class="btn">update</button></p>
                            <h2>Birthday</h2>
                            <p>July 21</p>
                            <h2>Gender</h2>
                            <p>Female</p>
                            <h2>Email</h2>
                            <p>example@example.com <button class="btn">update</button></p>
                            <h2>Password </h2>
                            <p>••••••• <button class="btn">Change</button></p>
                        </div>

                        <div class="payment noshow">
                            <div class="general__articles">
                                    <?php
                                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released,m_runtime,m_genre, m_plot,m_ratingMetacritic,m_ratingImdb,m_ratingTomato, m_imdbVotes FROM movies WHERE m_type='movie' LIMIT 8";
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
                        </div>

                        <div class="subscription noshow">
                            <div class="general__articles">
                                    <?php
                                    $sql = "SELECT m_name, m_poster, m_imdbId, m_released,m_runtime,m_genre, m_plot,m_ratingMetacritic,m_ratingImdb,m_ratingTomato, m_imdbVotes FROM movies WHERE m_type='series' LIMIT 8";
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
                        </div>

                        <div class="privacy noshow">
                            <h1>Privacy Settings</h1>
                            <h2>Manage Email Notifications<button class="btn">manage</button></h2>
                            <p></p>
                            <h2>Manage Privacy Settings<button class="btn">manage</button></h2>
                            <p></p>
                            <h2>View Terms of Use <button class="btn">view</button></h2>
                            <p></p>
                            <h2>Personalize Ad Experience <button class="btn">update</button></h2>
                            <p></p>
                            <h2>Protect Your Account <button class="btn">protect</button></h2>
                            <p></p>
                        </div>
                        <div class="settings noshow">
                            <h1>Account Settings</h1>
                            <h2>Sync Watchlist to My Stuff<button class="btn">sync</button></h2>
                            <p></p>
                            <h2>Hold Your Subscription<button class="btn">hold</button></h2>
                            <p></p>
                            <h2>Cancel Your Subscription <button class="btn">cancel</button></h2>
                            <p></p>
                            <h2>Your Devices <button class="btn">Manage Devices</button></h2>
                            <p></p>
                            <h2>Referrals <button class="btn">get $10</button></h2>
                            <p></p>
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
            /*active button class onclick*/
            jQuery('section nav a').click(function (e) {
                e.preventDefault();
                jQuery('section nav a').removeClass('active');
                jQuery(this).addClass('active');
                if (this.id === !'payment') {
                    jQuery('.payment').addClass('noshow');
                } else if (this.id === 'payment') {
                    jQuery('.payment').removeClass('noshow');
                    jQuery('.rightbox').children().not('.payment').addClass('noshow');
                } else if (this.id === 'profile') {
                    jQuery('.profile').removeClass('noshow');
                    jQuery('.rightbox').children().not('.profile').addClass('noshow');
                } else if (this.id === 'subscription') {
                    jQuery('.subscription').removeClass('noshow');
                    jQuery('.rightbox').children().not('.subscription').addClass('noshow');
                } else if (this.id === 'privacy') {
                    jQuery('.privacy').removeClass('noshow');
                    jQuery('.rightbox').children().not('.privacy').addClass('noshow');
                } else if (this.id === 'settings') {
                    jQuery('.settings').removeClass('noshow');
                    jQuery('.rightbox').children().not('.settings').addClass('noshow');
                }
            });
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
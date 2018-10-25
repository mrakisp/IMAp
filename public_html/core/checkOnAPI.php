<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "g13g31g31g_movies";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$sql = $conn->prepare("SELECT m_name FROM movies WHERE m_name LIKE '%".$_GET["ls_query"]."%'");
//$conn->exec($sql);
$counts = $sql->fetch();

if ($counts) {
    echo 'exxw';
} else {
   echo 'not';
} 

if ($sql->columnCount() !== 0) {

    $search_val = str_replace(' ', '+', $_GET["ls_query"]);
    
    $api_key = "apikey=401c0211";
    $search_term = $search_val . '&' . $api_key;
    $url = 'http://www.omdbapi.com/?t=' . $search_term . ''; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $characters = json_decode($data); // decode the JSON feed
    
    if (isset($characters->Title)) {

        $Title = mysql_real_escape_string($characters->Title);
        $Poster = mysql_real_escape_string($characters->Poster);
        $Released = mysql_real_escape_string($characters->Released);
        $Runtime = mysql_real_escape_string($characters->Runtime);
        $Genre = mysql_real_escape_string($characters->Genre);
        $Director = mysql_real_escape_string($characters->Director);
        $Writer = mysql_real_escape_string($characters->Writer);
        $Actors = mysql_real_escape_string($characters->Actors);
        $Plot = mysql_real_escape_string($characters->Plot);
        $Language = mysql_real_escape_string($characters->Language);
        $Country = mysql_real_escape_string($characters->Country);
        $Awards = mysql_real_escape_string($characters->Awards);
        $Metascore = mysql_real_escape_string($characters->Metascore);
        $imdbRating = mysql_real_escape_string($characters->imdbRating);
        $imdbVotes = mysql_real_escape_string($characters->imdbVotes);
        $imdbID = mysql_real_escape_string($characters->imdbID);
        $Type = mysql_real_escape_string($characters->Type);
        $Year = mysql_real_escape_string($characters->Year);



//        $sql = "INSERT INTO movies (m_name, m_poster, m_year, m_released, m_runtime, m_genre, m_director, m_writer, m_actors, m_plot,"
//                . " m_language, m_country, m_awards, m_ratingMetacritic, m_ratingImdb, m_imdbVotes, m_imdbId, m_type) SELECT * FROM (SELECT "
//                . "'" . $Title . "', '" . $Poster . "', '" . $characters->Year . "', '" . $Released . "', '" . $Runtime . "', '" . $Genre . "',"
//                . " '" . $Director . "', '" . $Writer . "', '" . $Actors . "', '" . $Plot . "', '" . $Language . "', '" . $Country . "', '" . $Awards . "' ,"
//                . " '" . $Metascore . "', '" . $imdbRating . "', '" . $imdbVotes . "', '" . $imdbID . "','" . $Type . "')"
//                . " AS tmp WHERE NOT EXISTS ( SELECT m_name FROM movies WHERE m_name = '" . $Title . "') LIMIT 1";
        $sql = "INSERT INTO movies (m_name, m_poster, m_year, m_released, m_runtime, m_genre, m_director, m_writer, m_actors, m_plot,"
                . " m_language, m_country, m_awards, m_ratingMetacritic, m_ratingImdb, m_imdbVotes, m_imdbId, m_type) VALUES ( "
                . "'" . $Title . "', '" . $Poster . "', '" . $characters->Year . "', '" . $Released . "', '" . $Runtime . "', '" . $Genre . "',"
                . " '" . $Director . "', '" . $Writer . "', '" . $Actors . "', '" . $Plot . "', '" . $Language . "', '" . $Country . "', '" . $Awards . "' ,"
                . " '" . $Metascore . "', '" . $imdbRating . "', '" . $imdbVotes . "', '" . $imdbID . "','" . $Type . "')";
// use exec() because no results are returned
        $conn->exec($sql);

        echo "New record created successfully";
    }
}
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

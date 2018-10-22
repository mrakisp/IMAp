<?php

$search_val = str_replace(' ', '+', $_GET["ls_query"]);
$api_key = "apikey=401c0211";
$search_term = $search_val . '&' . $api_key;
$url = 'http://www.omdbapi.com/?t=' . $search_term . ''; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed


if (isset($characters->Title)) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "g13g31g31g_movies";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO movies (name) SELECT * FROM (SELECT '$characters->Title') AS tmp WHERE NOT EXISTS ( SELECT name FROM movies WHERE name = '$characters->Title') LIMIT 1"; 
        // use exec() because no results are returned
        $conn->exec($sql);
        
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;


    
}

?>

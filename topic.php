<?php
function getSqlInfo($sql)
{ //connect to database
    include('config/db_connect.php');
    //write query for all pizzas
    // $sql = 'SELECT * FROM categories ORDER BY categories_id';
    // make query & get result
    $result = mysqli_query($conn, $sql);
    //fetch the resulting rows as an array
    $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

    return $infos;
    // print_r($categories);
    // explode(',', $pizzas[0]['ingredients']);
}

$qtype = $_REQUEST["q"];
$topics = getSqlInfo("SELECT * FROM topics WHERE categories_id='$qtype'");

echo json_encode($topics, JSON_FORCE_OBJECT);

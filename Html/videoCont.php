<?php
global $limit;
global $start;
$start = isset($_GET['start']) ? $_GET['start'] : 1;

// Calculate the offset based on the current page and number of items per page
$limit = 10;
$offset = ($start - 1) * $limit;
include "dbsql.php";/*
if (!isset($limit)) {
    $limit = 10;
    echo 'pass 1<br>';
} else {
    $limit += 10;
} 
if (!isset($start)) {
    echo 'pass 3<br>';
    $start = 0;

}  else{
    $start += $limit + 1;
}*/
/*
echo "Start : " . $start;
echo "--";
echo "Limit : " . $limit;
echo "--";
echo "Offset : " . $offset;
*/
Timesort($offset, $limit);
 
?>
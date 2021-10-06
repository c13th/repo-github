<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("prist.mysql", "prist_mysql", "o_Hh3dyq", "prist_db");
$conn->query("SET NAMES utf8");
$result = $conn->query("SELECT Text FROM office_news WHERE Actuality = 1 ORDER BY Id ASC;");


$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Text":"'  . $rs["Text"] . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>
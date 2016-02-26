<?php
header("Content-type: application/json");
require_once './model.php';

    $a = $myDB->getTitlesAsArray();

    $q = $_REQUEST["q"];

    $jarray=array();

    $index = 0;

if ($q !== "") {
    //Returns the array encoded as JSON.
    foreach($a as $title) {

        if (strpos($title['title'],$q)===0) {
                $jarray[$index] = $title['title'];
                $index++;
    }
    }
}
if($index>0)
echo json_encode($jarray);
else
    echo json_encode("");
?>
<?php

function listLelang(){
    $link = doConnect();
    $query = 'SELECT * FROM lelang ';
    $result_set = $link->query($query);
    return $result_set;
}
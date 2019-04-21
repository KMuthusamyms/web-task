<?php
function jsonappend($userinfo,$userauth){
    //userinfo
    $inp = file_get_contents('../json/userinfo.json');
    $tempArray = json_decode($inp);
    array_push($tempArray, $userinfo);
    $jsonData = json_encode($tempArray);
    file_put_contents('../json/userinfo.json', $jsonData);
    //userauth
    $inp = file_get_contents('../json/userauth.json');
    $tempArray = json_decode($inp);
    array_push($tempArray, $userauth);
    $jsonData = json_encode($tempArray);
    file_put_contents('../json/userauth.json', $jsonData);
}
?>
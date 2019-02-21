<?php 

function generatePassword(){
    $length = 8;
    $smallleter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3);
    $capitalletter = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,2);
    $number = substr(str_shuffle("0123456789"),0,2);
    $specialchar = substr(str_shuffle("!@~"),0,1);
    $finalstring = $smallleter.$capitalletter.$number.$specialchar;
    $randomletter = substr(str_shuffle($finalstring),0,$length);


    return $randomletter;
}
<?php

function dateFormat($date){
    $fdate = Datetime::createFromFormat('Y-m-d',  $date)->format('d/m/Y');
    // $fdate = $date->format('d-m-Y H:i:s');
    return $fdate;
}

function dateFormatH($date){
    $fdate = Datetime::createFromFormat('Y-m-d H:i:s',  $date)->format('d/m/Y H:i:s');
    // $fdate = $date->format('d-m-Y H:i:s');
    return $fdate;
}
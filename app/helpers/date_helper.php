<?php

function dateFormat($date){
    if($date == null){
        return $date;
    } else {
    $fdate = Datetime::createFromFormat('Y-m-d',  $date)->format('d/m/Y');
    return $fdate;
    }
}

function dateFormatH($date){
    if($date == null){
        return $date;
    } else {
    $fdate = Datetime::createFromFormat('Y-m-d H:i:s',  $date)->format('d/m/Y H:i:s');
    return $fdate;
    }
}
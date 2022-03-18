<?php

function validString($string)
{
    return !empty($string);
}

function validState($state) {
    $states = array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL",
        "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA",
        "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC",
        "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT",
        "VA", "WA", "WV", "WI", "WY");
    return in_array($state, $states);
}

function validPhone($phone) {
    $phoneOnlyNums = preg_replace("/[^0-9]/", '', $phone);
    if (strlen($phoneOnlyNums) == 11 || strlen($phoneOnlyNums) == 10) return true;
    return false;
}

function validScans($scan) {
    $scanOptions = array("Mammogram", "PATH", "DEXA", "MRI", "X-Ray", "CT", "Ultrasound");
    for($i = 0; i < $scan.length; $i++) {
        if(!in_array($scan[i], $scanOptions)) return false;
    }
    return true;
}

function validPush($push) {
    $pushOptions = array("Push", "Push Only to Swedish", "Not Push");
    if(in_array($push, $pushOptions)) return true;
    return false;
}
function check_login($user = "", $pass = ""){
    $notvalid = false;

    if($user != "admin"){
        $notvalid = true;
    }

    if($pass != "@dm1n"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_user($user = ""){
    $notvalid = false;

    if($user != "admin"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_pass($pass = ""){
    $notvalid = false;

    if($pass != "@dm1n"){
        $notvalid = true;
    }

    return !$notvalid;
}

function check_sess($user = ""){
    $notvalid = false;

    if($user != 'admin'){
        $notvalid = true;
    }

    return !$notvalid;
}
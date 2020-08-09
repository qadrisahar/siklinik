<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function selopt($value,$x)
{
    if($value==$x){
        $s='selected';
    }else{
        $s='';
    }
    return $s;
}



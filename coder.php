<?php
function coder($tmp) 
{
    $values = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
    while($tmp != 0) {
        $roll = $tmp % 62;
        $result = $values[$roll].$result;
        $tmp = floor($tmp / 62);
    }
	
	return $result;
}

<?php

// Check if slice size is acceptable by rules
// bool
function check_size($c_min, $r_min, $c_max, $r_max) {
    global $min_i;
    global $max_i;
    $area = area($c_min, $r_min, $c_max, $r_max);
    return ($area <= $max_i && $area >= ($min_i * 2));
}

// Total slice area
// int
function area($c_min, $r_min, $c_max, $r_max) {
    return (($c_max - $c_min + 1) * ($r_max - $r_min + 1));
}

// Check if slice has at least L tomatos and L mashrooms
// bool
function has_all_ingr($c_min, $r_min, $c_max, $r_max) {
    global $pizza;
    global $min_i;
    $t = 0;
    $m = 0;
    for ($i = $c_min; $i <= $c_max; $i++) {
        for ($j = $r_min; $j <= $r_max; $j++) {
            if ($pizza[$i][$j] == 'T')
                $t++;
            else
                $m++;
        }
    }
    return ($t >= $min_i && $m >= $min_i);
}

?>
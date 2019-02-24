<?php

    require_once("global.php");
    require_once("read_inp.php");
    require_once("func.php");

    function add_slice(int $c_min, int $r_min, int $c_max, int $r_max) {
        global $pizza;
        global $out_coord;
        global $slice_count;
        global $min_i;
        global $max_i;
        
        $area = area($c_min, $r_min, $c_max, $r_max);
        if (check_size($area)) {
            if (has_all_ingr($c_min, $r_min, $c_max, $r_max)) {
                $slice_count++;
                $out_coord[] = array($r_min, $c_min, $r_max, $c_max);
                for ($i = $r_min; $i <= $r_max; $i++) {
                    for ($j = $c_min; $j <= $c_max; $j++) {
                        $pizza[$i][$j] = ' ';
                    }
                }
            }
        } else if ($area > $min_i * 2) {
            if ($r_max - $r_min > $c_max - $c_min) {
                $dr = intdiv(($r_max - $r_min), 2);
                $r_mid = $r_min + $dr;
                add_slice($c_min, $r_min, $c_max, $r_mid);
                add_slice($c_min, $r_mid + 1, $c_max, $r_max);
            } else {
                $dc = intdiv(($c_max - $c_min), 2);
                $c_mid = $c_min + $dc;
                add_slice($c_min, $r_min, $c_mid, $r_max);
                add_slice($c_mid + 1, $r_min, $c_max, $r_max);
            }
        }
    }

    function check(){
        global $pizza;
        global $out_coord;
        global $slice_count;
        global $min_i;
        global $max_i;
        global $max_row;
        global $max_col;

        for ($i = 0; $i < $max_row; $i++) {
            for ($j = 0; $j < $max_col; $j++) {
                if ($pizza[$i][$j] != ' ') {
                    $mi = $i;
                    $mj = $j;
                    while ($pizza[$mi][$j] != ' ' && $mi < $max_row)
                        $mi++;
                    while ($pizza[$i][$mj] != ' ' && $mj < $max_col)
                        $mj++;
                    add_slice($j, $i, $mj - 1, $mi - 1);
                }
            }
        }
    }

    read_inp($argv[1]);
    add_slice(0, 0, $max_col - 1, $max_row - 1);
    check();
    
    require_once("output.php");
?>
<?php

    require_once("global.php");
    require_once("read_inp.php");
    require_once("func.php");

    function add_slice(int $c_min, int $r_min, int $c_max, int $r_max) {
        global $out_coord;
        global $slice_count;
        
        if (check_size($c_min, $r_min, $c_max, $r_max)) {
            if (has_all_ingr($c_min, $r_min, $c_max, $r_max)) {
                $slice_count++;
                $out_coord[] = array($r_min, $c_min, $r_max, $c_max);
            }
        } else {            
            if ($r_max - $r_min > $c_max - $c_min) {
                $dr = intdiv(($r_max - $r_min + 1), 2);
                $r_mid = $r_min + $dr;
                add_slice($c_min, $r_min, $c_max, $r_mid);
                add_slice($c_min, $r_mid + 1, $c_max, $r_max);
            } else {
                $dc = intdiv(($c_max - $c_min + 1), 2);
                $c_mid = $c_min + $dc;
                add_slice($c_min, $r_min, $c_mid, $r_max);
                add_slice($c_mid + 1, $r_min, $c_max, $r_max);
            }
        }
    }

    read_inp($argv[1]);
    add_slice(0, 0, $max_col - 1, $max_row - 1);

    require_once("output.php");
?>
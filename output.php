<?php
    echo $slice_count . PHP_EOL;
    foreach($out_coord as $s){
        printf("%d %d %d %d\n", $s[0], $s[1], $s[2], $s[3]);
    }
?>
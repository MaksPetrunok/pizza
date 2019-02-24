<?php

    require_once("global.php");
    require_once("read_inp.php");
    require_once("func.php");

    read_inp($argv[1]);


    echo "-----------------------------------";
    var_dump($pizza);

    var_dump(has_all_ingr(0,0,2,1));
    var_dump(area(0,0,$max_col - 1,$max_row - 1));
    var_dump(area(0,0,0,0));


    require_once("output.php");
?>
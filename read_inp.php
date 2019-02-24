<?php
    require_once("global.php");

    function read_inp($input)
    {
        global $max_row;
        global $max_col;
        global $min_i;
        global $max_i;
        global $pizza;

        if ($input == NULL) {
            echo "Usage: read_inp(argv[1]);\n";
            exit(1) ;
        }

        $file = file($input);
        $first_line = $file[0];
        array_shift($file);

        $first_line = explode(" ", $first_line);

        $max_row = $first_line[0];
        $max_col = $first_line[1];
        $min_i = $first_line[2];
        $max_i = $first_line[3];

        foreach ($file  as $key => $value) {
            trim($value, "\n");
            $pizza[$key] = str_split(trim($value, "\n"));

        }
    }
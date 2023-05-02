<?php
// Script to run the class loader

require_once(__DIR__ . "/models/ClassLoader.php");

if(isset($argc) && $argc == 2) {
    $term = $argv[1];
    echo "Loading...\n";
    $res = ClassLoader::load($term);
    if($res == 1) {
        // Table already exists, prompt to overwrite or not
        echo "Table already exists. Overwrite it? (y/n)\n";
        $handle = fopen("php://stdin", "r");
        $line = strtolower(trim(fgets($handle)));
        if($line == "yes" || $line == "y") {
            echo "Overwriting the table...\n";
            ClassLoader::load($term, true);
            exit;
        }
        else {
            echo "Exiting without doing anything.\n";
            exit;
        }
    }
    else {
        echo $res;
    }
}
else {
    echo "Error: term not passed in. Term must be the first and only argument. Example: 'load-classes.php spring_2023'\n";
}
<?php
// Script to run the class loader

require_once(__DIR__ . "/models/ClassLoader.php");

if(isset($argc) && $argc == 2) {
    $term = $argv[1];
    echo "Loading...\n";
    ClassLoader::load($term);
}
else {
    echo "Error: term not passed in. Term must be the first and only argument. Example: 'load-classes.php spring_2023'\n";
}
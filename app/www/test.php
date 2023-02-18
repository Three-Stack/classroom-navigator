<?php

require_once(__DIR__ . "/../models/DBConnection.php");

$db = DBConnection::db();
$query = $db->query('SHOW VARIABLES like "version"');
$row = $query->fetch();
echo 'MySQL version:' . $row['Value'];
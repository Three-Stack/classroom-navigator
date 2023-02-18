<?php
/**
 * Manages the database connection
 */

class DBConnection {
    public static function db() {
        // Using temporary user & password for now
        return new PDO('mysql:dbname=db;host=mysql', 'default', 'pass123', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
<?php

// Function to create a database connection
function getDbConnection($dbPath) {
     try {
         // Try to connect to SQLite database
         $db = new PDO("sqlite:$dbPath");
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $db;
     } catch (PDOException $e) {
         // If connection fails, return null
         return null;
     }
 }
 
 // Path to the SQLite database
 $dbPath = __DIR__ . '/../database.sqlite';
 
 // Check if the database file exists
if (!file_exists($dbPath)) {
    $db = getDbConnection($dbPath);
    if ($db) {
        executeSQLFile($db, __DIR__ . '/hotel.sql');
    } else {
        die("Failed to create the database.");
    }
} else {
    $db = getDbConnection($dbPath);
}
 
 // Function to execute the SQL file
 function executeSQLFile($db, $filePath) {
     // Get the SQL queries from the file
     $sql = file_get_contents($filePath);
 
     // Execute SQL queries
     try {
         $db->exec($sql);
     } catch (PDOException $e) {
         die("Failed to execute SQL file: " . $e->getMessage());
     }
 }
 
// Export db for use in other files
function db() {
    global $db;
    return $db;
}
// Email settings
define('HOTEL_EMAIL', 'reservations@pensiuneastan.com');

// Theme colors
define('THEME_PRIMARY', '#facc15'); // Tailwind yellow-400
define('THEME_DARK', '#78350f');    // Tailwind yellow-950
?>

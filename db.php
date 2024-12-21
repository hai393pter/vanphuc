<?php
$servername = "capstone-sp25.mysql.database.azure.com"; // MySQL server address (Azure)
$username = "capstoneadmin"; // Your MySQL username
$password = "R00t@dmin"; // Your MySQL password
$dbname = "vanphucdb"; // The database you want to connect to

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // If connection is successful, display this message
    echo "Connected successfully";

} catch (mysqli_sql_exception $e) {
    // In case of an error, display the error message
    die("Connection failed: " . $e->getMessage());
}
?>

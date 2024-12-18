<?php
require 'vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    echo "Dotenv loaded successfully\n";
} catch (Exception $e) {
    die("Failed to load .env: " . $e->getMessage() . "\n");
}

$server = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

if (!$server || !$username || !$dbname) {
    die("Missing environment variables. Check your .env file.");
}

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Database Connected Successfully!!";
}

?>

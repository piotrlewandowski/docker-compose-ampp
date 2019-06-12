<?php

defined('DS') ?: define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') ?: define('ROOT', dirname(__DIR__) . DS);

require ROOT . '/vendor/autoload.php';

if (file_exists(ROOT . '/.env')) {
    $env = Dotenv\Dotenv::create(ROOT);
    $env->load();
}

$conn = getenv('MYSQL_CONNECTION');
$db = getenv('MYSQL_DATABASE');
$host = getenv('MYSQL_HOST');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

$dsn = "$conn:dbname=$db;host=$conn";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "<p>Success: A proper connection to MySQL was made! The docker database is great.</p>";
    echo "<p>Host information: " . $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS) . ".</p>";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

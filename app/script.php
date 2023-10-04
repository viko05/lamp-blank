<?php
$dbHost = 'mysql-playground';
$dbName = 'playground';
$dbUser = 'vitek';
$pw = 'abcdefg';

$pdo = new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUser, $pw);
$stmtItems = $pdo->query("SELECT * FROM `items`");

foreach ($stmtItems as $item) {
    var_dump($item);
}

echo "I'm here";
echo "\n\r";

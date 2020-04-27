<?php
$host = 'localhost';
$user = 'scott';
$pw = 'tiger';
$dbName = 'DB_SIM_TRK';
$mysqli = new mysqli($host, $user, $pw, $dbName);

if ($mysqli) {
    echo "MySQL 접속 성공";
} else {
    echo "MySQL 접속 실패";
}

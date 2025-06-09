
<?php
$host = 'localhost';
$dbname = 'kosmetika';
$username = 'root';
$password = ''; // по умолчанию в XAMPP

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>

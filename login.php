
<?php
session_start();
require_once "db.php";

$login = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if (!$user) {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Пользователь не найден</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Пользователь не найден</h2>
            <p>Хотите зарегистрироваться?</p>
            <a href='register.html'><button>Зарегистрироваться</button></a>
        </main>
    </body>
    </html>";
    exit;
}

if ($password === $user['password']) {
    $_SESSION['user'] = $login;
    header("Location: order.html");
    exit;
} else {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Неверный пароль</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Неверный пароль</h2>
            <a href='login.html'><button>Попробовать снова</button></a>
        </main>
    </body>
    </html>";
}
?>

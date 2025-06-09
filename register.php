
<?php
require_once "db.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Ошибка регистрации</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Ошибка</h2>
            <p>Пожалуйста, заполните все поля.</p>
            <a href='register.html'><button>Назад к регистрации</button></a>
        </main>
    </body>
    </html>";
    exit;
}

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Пользователь существует</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Такой логин уже используется</h2>
            <p>Пожалуйста, выберите другой логин.</p>
            <a href='register.html'><button>Назад к регистрации</button></a>
        </main>
    </body>
    </html>";
    exit;
}

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Регистрация успешна</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Регистрация прошла успешно!</h2>
            <p>Теперь вы можете войти.</p>
            <a href='login.html'><button>Перейти к входу</button></a>
        </main>
    </body>
    </html>";
} else {
    echo "<!DOCTYPE html>
    <html lang='ru'>
    <head>
        <meta charset='UTF-8'>
        <title>Ошибка</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <main style='max-width:600px;margin:40px auto;text-align:center'>
            <h2>Ошибка при регистрации</h2>
            <p>Повторите попытку позже.</p>
            <a href='register.html'><button>Назад к регистрации</button></a>
        </main>
    </body>
    </html>";
}
?>

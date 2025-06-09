
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

// Очистка корзины
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Заказ подтверждён</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Спасибо за заказ!</h1>
</header>

<main style="text-align:center; margin-top: 50px;">
  <p>Ваш заказ был успешно оформлен. Мы свяжемся с вами в ближайшее время.</p>
  <a href="index.html"><button>Вернуться на главную</button></a>
</main>

<footer>
  <p>© 2025 Natural Beauty</p>
</footer>

</body>
</html>

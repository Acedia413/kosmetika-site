
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Корзина — Natural Beauty</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Корзина</h1>
  <nav>
    <a href="index.html">Главная</a> |
    <a href="catalog.html">Каталог</a> |
    <a href="logout.php">Выйти</a>
  </nav>
</header>

<main style="max-width: 800px; margin: auto;">
  <?php if (empty($cart)): ?>
    <p>Ваша корзина пуста.</p>
    <a href="catalog.html"><button>Вернуться в каталог</button></a>
  <?php else: ?>
    <table style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr>
          <th>Товар</th>
          <th>Изображение</th>
          <th>Количество</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $product => $data): ?>
        <tr>
          <td><?= htmlspecialchars($product) ?></td>
          <td><img src="<?= htmlspecialchars($data['image']) ?>" alt="" style="height: 80px;"></td>
          <td><?= $data['quantity'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <form action="confirm_order.php" method="post">
      <button type="submit">Подтвердить заказ</button>
    </form>
  <?php endif; ?>
</main>

<footer>
  <p>© 2025 Natural Beauty</p>
</footer>

</body>
</html>

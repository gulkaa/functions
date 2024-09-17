<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $errors = array();

  if (empty($name)) {
    $errors[] = "Поле не должно быть пустое";
  } elseif (strlen($name) < 3 || strlen($name) > 20) {
    $errors[] = "Имя должно содержать от 3 до 20 символов";
  }

  if (empty($email)) {
    $errors[] = "Поле не должно быть пустое";
  } elseif (strlen($email) < 8 || strlen($email) > 35) {
    $errors[] = "Поле должно содержать от 8 до 35 символов";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Неверный формат почты";
  }

  if (empty($phone)) {
    $errors[] = "Поле не должно быть пустое";
  } elseif (strlen($phone) != 11) {
    $errors[] = "Поле должно содержать 11 символов";
  }

  if (!empty($errors)) { ?>
    <form method="post">
      <label for="name">Имя</label>
      <input type="text" id="name" name="name"><br><br>

      <label for="email">Почта</label>
      <input type="email" id="email" name="email"><br><br>

      <label for="phone">Телефон</label>
      <input type="tel" id="phone" name="phone"><br><br>

      <input type="submit" value="Submit">
    </form>
    <? foreach ($errors as $error) { ?>
      <p><?= $error ?></p>
  <? }
    exit;
  }
} else { ?>
  <form method="post" class="forma">
    <label for="name">Имя</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Почта</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="phone">Телефон</label>
    <input type="tel" id="phone" name="phone"><br><br>

    <input type="submit" value="Подтвердить" class="btn">
  </form>
<? }
?>

</body>

</html>
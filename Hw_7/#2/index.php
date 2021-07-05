<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if (!isset($_COOKIE['loggined'])) {
  ?>
    <form action="personal.php" method="post">
      <input type="text" name="login" placeholder="login"><br>
      <input type="password" name="pass" placeholder="password"><br>
      <input type="submit" value="login">
    </form>

  <?php } else {
    echo $_GET['login'] . ', ' . 'Вход в личный кабинет выполнен успешно!';
    echo '<form method="post" action="personal.php"><input type="submit" name="logout" value="loguot"></form>';
  }

  ?>

</body>

</html>
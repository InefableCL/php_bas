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
  if (isset($_GET)) {
    $link = mysqli_connect("my.loc", "root", "root", "shop");
    if (!$link) echo mysqli_error($link) . mysqli_errno($link);
    $result = mysqli_query($link, "SELECT `id`, `name`, `description`, `price`, `path` FROM products");
    if (!$result)
      echo mysqli_error($link) . mysqli_errno($link);
    while ($rows = mysqli_fetch_assoc($result)) {
      echo 'Артикул: ' . $rows['id'] . '<br>' . $rows['name'] . '<br>'  . 'Цена: ' . $rows['price'] .
        '<br>' . '<a href="fullsize.php/?id=' . $rows['id'] . '"' . '><img src=' . $rows['path'] . '" style="width: 200px"' . '></a>' . '<br>';
    }
  }
  ?>
</body>

</html>
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
  session_start();
  $link = mysqli_connect("my.loc", "root", "root", "shop");
  if (!$link) echo mysqli_error($link) . mysqli_errno($link);
  $result = mysqli_query($link, "SELECT `id`, `name`, `description`, `price`, `path` FROM products");
  if (!$result)
    echo mysqli_error($link) . mysqli_errno($link);
  while ($rows = mysqli_fetch_assoc($result)) {

    echo '<form method="post" action="add_to_cart.php">' . 'Артикул: ' . $rows['id'] . '<br>' . $rows['name'] . '<br>'  . 'Цена: ' . $rows['price'] .
      '<br>' . '<a href="fullsize.php/?id=' . $rows['id'] . '"' . '><img src="' . $rows['path'] . '" style="width: 200px"' . '></a>' . '<br>'
      . '<input type="hidden" name="prod_id" value="' . $rows['id'] . '"' . 'style="width: 200px"><br>' .
      '<input type="hidden" name="prod_name" value="' . $rows['name'] . '"' . '>' .
      '<input type="hidden" name="prod_price" value="' . $rows['price'] . '"' . '>' .
      '<input type="hidden" name="path" value="' . $rows['path'] . '"' . '>' .
      '<input type="hidden" name="quantity" value=1' . '>' .
      '<input type="submit" value="Buy" style="width: 200px"><br>' . '</form>';
  }


  if (isset($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $key) {
      echo '<form method="post" action="del_from_cart.php">' . 'В корзине: ' . '<br>' . 'Артикул: ' . $key['prod_id'] . '<br>' . $key['prod_name'] . '<br>'  . 'Цена: ' . $key['prod_price'] .
        '<br>' . '<a href="fullsize.php/?id=' . $key['prod_id'] . '"' . '><img src="' . $key['path'] . '" style="width: 200px"' . '></a>' .
        '<br>' . 'Количество: ' . $key['quantity'] . '<br>' . '<input type="hidden" name="prod_id" value="' . $key['prod_id'] . '"' .
        '>' . '<input type="submit" name="del" value="Delete">' . '</form>';
    }
  } else echo 'Корзина пуста';





  ?>
</body>

</html>
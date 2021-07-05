<?php
session_start();
if (isset($_POST['del'])) {
  foreach ($_SESSION['cart'] as $k => $element) {
    foreach ($element as $kk => $values) {
      if ($values == $_POST['prod_id']) {
        unset($_SESSION['cart'][$k]);
      }
    }
  }
}
header('location: /index.php');

<?php
if (isset($_POST['login']) && isset($_POST['pass']) && $_POST['pass'] != NULL) {
  setcookie('loggined', $_POST['login'], time() + 3600, '/');
  header('location: index.php?login=' . $_POST['login']);
}
if (isset($_POST['logout'])) {
  setcookie('loggined', '', time() - 10000, '/');
  header('location: index.php');
}

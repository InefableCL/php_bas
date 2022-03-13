<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$_SESSION['cart'][] = $_POST;

header('location: /index.php?id=' . $_POST['prod_id']);

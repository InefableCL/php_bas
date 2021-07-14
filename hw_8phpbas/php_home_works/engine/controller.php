<?php

function prepareVariables($page, $action = "")
{
    $params = [];
    $params['name'] = get_user();
    $params['auth'] = isAuth();
    $params['count'] = 1;

    switch ($page) {

        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (auth($login, $pass)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
                    $result = mysqli_query(getDb(), $sql);
                    setcookie("hash", $hash, time() + 3600, "/");
                }
                header("Location: /");
                die();
            } else {
                die("Не верный логин пароль");
            }
            break;

        case 'logout':
            setcookie("hash", "", time()-1, "/");
            session_regenerate_id();
            session_destroy();
            header("Location: /");
            die();
            break;

        case 'index':
            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;

        case 'cart':
            $sql= "SELECT * FROM cart;";
            $result = mysqli_query(getDb(), $sql);
            var_dump($result);
            break;

        case 'buy':
            
            if($_GET['prod_id']){
                $id=(int)$_GET['prod_id'];
                $session=session_id();
                $sql= "INSERT INTO `cart` (`session_id`, `product_id`) VALUES ('{$session}', {$id})";
                $result = mysqli_query(getDb(), $sql);
                header("Location: /catalog");
            }


    }
    return $params;
}
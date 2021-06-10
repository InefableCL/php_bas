<?php
# Задание 3
$a = 2;
$b = 3;

if ($a >= 0 && $b >= 0) {
   echo 'Разность чисел равна: ' . ($a - $b);
} elseif ($a < 0 && $b < 0) {
   echo 'Произведение чисел равно: ' . ($a * $b);
} elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
   echo 'Сумма чисел равна: ' . ($a + $b);
};

# Задание 2

$a = 5;
switch ($a) {
   case 1:
      echo "1";
   case 2:
      echo "2";
   case 3:
      echo "3";
   case 4:
      echo "4";
   case 5:
      echo "5";
   case 6:
      echo "6";
   case 7:
      echo "7";
   case 8:
      echo "8";
      break;
}

# Задание 3 

function sum($arg1, $arg2)
{
   return $arg1 + $arg2;
}

function ss($arg1, $arg2)
{
   return $arg1 - $arg2;
}

function nul($arg1, $arg2)
{
   return $arg1 * $arg2;
}

function def($arg1, $arg2)
{
   return ($arg2 === 0) ? "invalid arg2 value (=0)" : $arg1 / $arg2;
}

# Задание 4

function mathOperation($arg1, $arg2, $operation)
{
   switch ($operation) {
      case "sum":
         return $arg1 + $arg2;
      case "subtraction":
         return $arg1 - $arg2;
      case "multiply":
         return $arg1 * $arg2;
      case "divide":
         if ($arg2 === 0) {
            echo "invalid arg2 value (=0)";
            break;
         }
         return $arg1 / $arg2;
   }
}
echo mathOperation(10, 0, divide);

?>

<?
# Задание 5
?>

<!DOCTYPE html>
<html lang "en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   Body
   <hr>
   <footer>
      <? echo (date("Y")) ?>
   </footer>
</body>

</html>
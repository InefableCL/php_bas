<?php

/*
1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
*/
$number = 1;
while ($number < 100) {
   if ($number % 3 == 0) {
      echo $number++ . ' ';
   }
   $number++;
}


/* 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – это ноль.
     1 – нечетное число.
      2 – четное число.
       3 – нечетное число.
        … 10 – четное число. */

$number = 0;
do {
   if ($number == 0) {
      echo $number . ' – это ноль.' . '<br>';
      $number++;
   } elseif ($number % 2 != 0) {
      echo $number . ' – нечетное число.' . '<br>';
      $number++;
   } else {
      echo $number . ' – четное число.' . '<br>';
      $number++;
   }
} while ($number < 11);


/* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. 
Вывести в цикле значения массива, чтобы результат был таким: 
Московская область: Москва, Зеленоград, 
Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
Рязанская область … (названия городов можно найти на maps.yandex.ru) */

$areaArr = [
   'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
   'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
   'Волгоградская область:' => ['Волгоград', 'Волжский', 'Камышин', 'Урюпинск', 'Иловля']
];

function displayCity($arr)
{
   if (!is_array($arr)) {
      return print "incorrect argument '{$arr}'";
   }
   foreach ($arr as $key => $value) {
      echo $key . '<br>';
      for ($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
         if ($i == $arrLength - 1) {
            echo $arr[$key][$i] . '.' . '<br>';
         } else {
            echo $arr[$key][$i] . ', ';
         }
      }
   }
}
displayCity($areaArr);


// 4.  Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
// Написать функцию транслитерации строк.

function translit($string)
{
   if (!is_string($string)) {
      return 'incorrect argument';
   }

   $ruChars = 'А Б В Г Д Е Ё Ж З И Й К Л М Н О П Р С Т У Ф Х Ц Ч Ш Щ Ъ Ы Ь Э Ю Я';
   $enChars = 'A B V G D E E ZH Z I Y K L M N O P R S T U F KH TS CH SH SCH ’ Y ’ E YU YA';

   $tranArr = array_combine(explode(' ', mb_strtolower($ruChars)), explode(' ', strtolower($enChars)));
   $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

   $requestedArr = [];

   for ($i = 0; $i < count($stringArr); $i++) {
      foreach ($tranArr as $key => $value) {
         if ($stringArr[$i] == $key) {
            array_push($requestedArr, $value);
            break;
         } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
            array_push($requestedArr, $stringArr[$i]);
            break;
         }
      }
   }

   return implode($requestedArr);
}

echo translit('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');


//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function replaceSpace($string)
{
   if (!is_string($string)) {
      return "incorrect argument {$string}";
   }

   return preg_replace('/\s/', '_', $string);
}

echo replaceSpace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');


//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. 
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.


$menuArr = [
   'Item 1',
   'Item 2' => ['Subitem 1', 'Subitem 2', 'Subitem 3'],
   'Item 3' => ['Subitem 4' => ['One level deeper 1', 'One level deeper 2']]
];

function menuRender($arr)
{

   if (!is_array($arr)) {
      return 'incorrect argument';
   }

   $renderArr[] = '<ul>';
   foreach ($arr as $key => $value) {
      if (is_array($value)) {
         $renderArr[] = '<li>' . $key . menuRender($value) . '</li>';
      } else {
         $renderArr[] = '<li>' . $value . '</li>';
      }
   }
   $renderArr[] = '</ul>';

   return implode($renderArr);
}

echo menuRender($menuArr);

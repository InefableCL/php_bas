<?php
if (isset($_GET['img_id']) && is_numeric($_GET['img_id']) && $_GET['img_id'] > 0) {
   $img_id = $_GET['img_id'];
   $link = mysqli_connect("my.loc", "root", "root", "gallery");
   if (!$link)
      echo mysqli_error($link) . mysqli_errno($link);
   $result = mysqli_query($link, "SELECT * FROM img_props WHERE img_id = $img_id");
   if (!$result)
      echo mysqli_error($link) . mysqli_errno($link);
   while ($rows = mysqli_fetch_assoc($result)) {
      $dir = '/images/';
      echo '<img src=' . $dir . $rows["img_name"] . '>';
      echo '<h3>Число просмотров: ' . $rows["views"] . '</h3>';
   }
   $result2 = mysqli_query($link, "UPDATE img_props SET views=views+1 WHERE img_id=$img_id");
   if (!$result2) echo mysqli_error($link) . mysqli_errno($link);
}

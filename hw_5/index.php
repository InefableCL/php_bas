<html>

<head>
  <title>Gallery</title>
</head>

<body>
  <h1>Gallery</h1>
</body>

</html>
<?php
$link = mysqli_connect("my.loc", "root", "root", "gallery");
$result = mysqli_query($link, "SELECT * FROM img_props ORDER BY views desc");
while ($rows = mysqli_fetch_assoc($result)) {
  $dir = '/images/';
  echo '<a href="/fullsizeimg.php/?img_id=' . $rows["img_id"] . '"><img src=' . $dir . $rows["img_name"] . ' style="width: 200px;"></a>';
}

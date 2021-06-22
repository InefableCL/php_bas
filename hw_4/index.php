<html>

<head>
  <title>Галерея</title>
</head>

<body>
  <h1>Галерея</h1>
  <form method="post" action="index.php" enctype="multipart/form-data">
    <label for="inputfile"></label>
    <input type="file" id="inputfile" name="inputfile"></br>
    <input type="submit" value="Загрузить">
  </form>
</body>

</html>
<?php
if (isset($_FILES) && $_FILES['inputfile']['error'] == 0) {
  $destiation_dir = 'images' . '/' . $_FILES['inputfile']['name'];
  move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir);
  echo 'Файл успешно загружен </br>';
} else {
  echo 'Не удалось загрузить файл </br>';
}

$dir = 'images/';
$images = scandir($dir);
for ($i = 0; $i < count($images); $i++) {
  if ($images[$i] != '.' && $images[$i] != '..') {
    echo '<a href="' . $dir . $images[$i] . '" target="_blank"><img src=' . $dir . $images[$i] . ' style="width: 200px;"></a>';
  }
}

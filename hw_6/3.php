<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="first_name" id="" placeholder="name">
    <br>
    <input name="feedback" type="text" placeholder="your feedback" style="width: 200px; height: 100px;">
    <br>
    <input type="submit" style="width: 200px;">
  </form>
  <hr>
  <h1 style="text-align: center;"> FEEDBACKS </h1>
  <br>
  <?php
  if (isset($_POST)) {
    $user_name = htmlspecialchars(strip_tags($_POST['first_name']));
    $user_feedbck = htmlspecialchars(strip_tags($_POST['feedback']));
    $link = mysqli_connect("my.loc", "root", "rott", "feedbacks");
    if (!$link) echo mysqli_error($link) . mysqli_errno($link);
    $add_result = mysqli_query($link, "INSERT INTO reviews (`user_name`, `review_body`) VALUES ('$user_name', '$user_feedbck')");
    if (!$add_result)
      echo mysqli_error($link) . mysqli_errno($link);
    $get_result = mysqli_query($link, "SELECT * FROM reviews;");
    while ($rows = mysqli_fetch_assoc($get_result)) {
      echo '<h3>User:' . $rows['user_name'] . '</h3>';
      echo '<p>' . $rows['review_body'] . '<p>';
      echo '<hr>';
    }
  }
  ?>
</body>

</html>
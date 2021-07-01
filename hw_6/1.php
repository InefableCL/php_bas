<form action="" method="post">
  <input name="arg1" type="number">
  <input name="arg2" type="number">
  <select name="operation">
    <option value="sum">sum
    <option>
    <option value="sub">sub
    <option>
    <option value="mult">mult
    <option>
    <option value="div">div
    <option>
      <select>
        <input type="submit">
        <form>
          <?php
          if (isset($_POST)) {
            switch ($_POST['operation']) {
              case 'sum':
                echo "<br> result: " . ($_POST['arg1'] + $_POST['arg2']);
                break;
              case 'sub':
                echo "<br> result: " . ($_POST['arg1'] - $_POST['arg2']);
                break;
              case 'mult':
                echo "<br> result: " . ($_POST['arg1'] * $_POST['arg2']);
                break;
              case 'div':
                if ($_POST['arg2'] == 0) {
                  echo "not is 0";
                  break;
                } else {
                  echo "<br> result: " . ($_POST['arg1'] / $_POST['arg2']);
                }
            }
          }

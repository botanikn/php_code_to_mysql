<?php

$connection = mysqli_connect('localhost', 'a3', '1', 'Museum_register') or die ('Ты мёртв');

echo "<form action=\"insert_artifact.php\" method = \"post\">
     Номер этажа: <input type=\"text\" name=\"Number\"> <br> <br>
     Количество секций: <input type=\"text\" name=\"Section\"> <br> <br>
     Интересные возможности: <input type=\"text\" name=\"Int\" > <br> <br>
     <input type= \"submit\" value = \"Внести\" name = \"send\">
     </form>";

echo '<br>';
echo '<br>';
echo '<br>';

if(isset($_POST['send'])) {

$N = $_POST['Number'];
$S = $_POST['Section'];
$I = $_POST['Int'];

$mysql = mysqli_query($connection, "INSERT INTO `этажи` 
 (`Номер этажа`,
  `Количество секций`,
  `Интересные возможности`) 
  VALUES 
  ('$N',
   '$S',
   '$I'")
   or die (mysqli_error($connection));

if ($mysql == true) {

    print('Новый этаж добавлен в базу');

}

}
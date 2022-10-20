<?php

$connection = mysqli_connect('localhost', 'a3', '1', 'Museum_register') or die ('Ты мёртв');

echo "<form action=\"insert_sec.php\" method = \"post\">
     Название секции: <input type=\"text\" name=\"Name\"> <br> <br>
     Число артефактов: <input type=\"text\" name=\"Number\" > <br> <br>
     Номер этажа: <input type=\"text\" name=\"F_N\"> <br> <br>
     Дата основания: <input type=\"text\" name=\"F_D\"> <br> <br>     
     Короткое описание: <input type=\"text\" name=\"Short_description\"> <br> <br>
     <input type= \"submit\" value = \"Внести\" name = \"send\">
     </form>";

echo '<br>';
echo '<br>';
echo '<br>';

if(isset($_POST['send'])) {

$Name = $_POST['Name'];
$Number = $_POST['Number'];
$F_N = $_POST['F_N'];
$F_D = $_POST['F_D'];
$Desc = $_POST['Short_description'];

$mysql = mysqli_query($connection, "INSERT INTO `секции` 
 (`Название секции`,
  `Число артефактов`,
  `Номер этажа`,
  `Дата основания`,
  `Короткое описание`) 
  VALUES 
  ('$Name',
   '$Number',
   '$F_N',
   '$F_D',
   '$Desc')")
   or die (mysqli_error($connection));

if ($mysql == true) {

    print('Новая секция добавлена в базу');

}


//$query = mysqli_query($connection, 'SELECT `ID артефакта` FROM `артефакты` ORDER BY `ID артефакта` DESC LIMIT 1');
//$row = mysqli_fetch_array($query);
//$id = $row['ID артефакта'];

//echo "Новый артефакт добавлен в базу, ID артефакта - $id";

}
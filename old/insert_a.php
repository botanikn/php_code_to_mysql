<?php

$connection = mysqli_connect('localhost', '1', '1', 'музейный регистр') or die ('Ты мёртв');

echo "<form action=\"insert_a.php\" method = \"post\">
     Название артефакта: <input type=\"text\" name=\"Name\"> <br> <br>
     Примерный год создания: <input type=\"text\" name=\"Approximate_year_of_creation\"> <br> <br>
     Год нахождения: <input type=\"text\" name=\"Year_of_location\" > <br> <br>
     ID секции: <input type=\"text\" name=\"ID-section\"> <br> <br>
     Короткое описание: <input type=\"text\" name=\"Short_description\"> <br> <br>
     <input type= \"submit\" value = \"Внести\" name = \"send\">
     </form>";

echo '<br>';
echo '<br>';
echo '<br>';

if(isset($_POST['send'])) {

$Name = $_POST['Name'];
$FYear = $_POST['Approximate_year_of_creation'];
$EYear = $_POST['Year_of_location'];
$Section = $_POST['ID-section'];
$Desc = $_POST['Short_description'];

$mysql = mysqli_query($connection, "INSERT INTO `артефакты` 
 (`Название артефакта`,
  `Примерный год создания`,
  `Год нахождения`,
  `ID секции`,
  `Короткое описание`) 
  VALUES 
  ('$Name',
   '$FYear',
   '$EYear',
   '$Section',
   '$Desc')")
   or die (mysqli_error($connection));

if ($mysql == true) {

    print('Новый артефакт добавлен в базу');

}

echo "<br> <br> <br>";


$query = mysqli_query($connection, 'SELECT `ID артефакта` FROM `артефакты` ORDER BY `ID артефакта` DESC LIMIT 1');
$row = mysqli_fetch_array($query);
$id = $row['ID артефакта'];

echo "ID артефакта - $id";

}
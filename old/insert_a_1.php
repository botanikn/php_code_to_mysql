<?php

$connection = mysqli_connect('localhost', 'a3', '1', 'Museum_register') or die ('Ты мёртв');


echo '<head>
      <link rel="stylesheet" href="insert_a.css">
      </head>
';


echo "<center>
      <table>
      <thead>
      <tr>
      <th>Название артефакта</th>
      <th>Примерный год создания</th>
      <th>Год нахождения</th>
      <th>ID секции</th>
      <th>Короткое описание</th>
      </tr>
      </thead>";


echo "
      <tbody>
      <tr>
      <form action=\"insert_a.php\" method = \"post\">
      <td><input type=\"text\" name=\"Name\"></th>
      <td><input type=\"text\" name=\"Approximate_year_of_creation\"></td>
      <td><input type=\"text\" name=\"Year_of_location\" ></td>
      <td><input type=\"text\" name=\"ID-section\"></td>
      <td><input type=\"text\" name=\"Short_description\"></td>
      </tr>
      </tbody>
      </table>
      <input type= \"submit\" value = \"Внести\" name = \"send\" class=\"btn\">
      </form>

";


echo '<br>';
echo '<br>';
echo '<br>';

if(isset($_POST['send'])) {

$Name = $_POST['Name'];
$FYear = $_POST['Approximate_year_of_creation'];
$EYear = $_POST['Year_of_location'];
$Section = $_POST['ID-section'];
$Desc = $_POST['Short_description'];

$mysql = mysqli_query($connection, "INSERT INTO `Artifacts`
 (`Artifact name`,
  `Approximate year of creation`,
  `Year of location`,
  `ID-section`,
  `Short description`) 
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


$query = mysqli_query($connection, 'SELECT `ID-artifact` FROM `Artifacts` ORDER BY `ID-artifact` DESC LIMIT 1');
$row = mysqli_fetch_array($query);
$id = $row['ID-artifact'];

echo "ID артефакта - $id";

}
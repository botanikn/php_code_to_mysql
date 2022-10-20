<?php

$connection = mysqli_connect('netb_db_1', 'root', '1', 'Museum_register') or die ('Ты мёртв');

error_reporting(0);

echo '<head>
      <link rel="stylesheet" href="insert_a.css">
      </head>
';


echo "<center>
      <table>
      <thead>
      <tr>
      <th>Название секции</th>
      <th>Список номеров этажей</th>
      <th>Номер этажа (Выберете из списка номеров этажей)</th>
      <th>Дата основания</th>
      <th>Короткое описание</th>
      </tr>
      </thead>";

$select = mysqli_query($connection, "SELECT `Floor number` FROM `Floors`");




echo "
      <tbody>
      <tr>
      <form action=\"insert_s_1.php\" method = \"post\">
      <td><input type=\"text\" name=\"Name\"></td>
      <td>";

      while ($row = mysqli_fetch_row($select)) {

      for ($j = 0; $j < 1; $j++) {

          echo "$row[$j]";

}

}

echo "</td>
      <td><input type=\"text\" name=\"Number\"></td>
      <td><input type=\"text\"  name=\"Found\"></td>
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
$Number = $_POST['Number'];
$Found = $_POST['Found'];
$Desc = $_POST['Short_description'];

$mysql = mysqli_query($connection, "INSERT INTO `Sections`
 (`Section name`,
  `Floor number`,
  `Foundation date`,
  `Short description`)
  VALUES
  ('$Name',
   '$Number',
   '$Found',
   '$Desc')")
   or die (mysqli_error($connection));

if ($mysql == true) {

    print('Новая секция добавлена в базу');

}

echo "<br> <br> <br>";


$query = mysqli_query($connection, 'SELECT `ID-section` FROM `Sections` ORDER BY `ID-section` DESC LIMIT 1');
$row = mysqli_fetch_array($query);
$id = $row['ID-section'];

echo "ID секции - $id";

}
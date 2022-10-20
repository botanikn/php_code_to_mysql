<?php

$connection = mysqli_connect('netb_db_1', 'root', '1', 'Museum_register') or die ('Does not work');
#$connection->query( 'SET CHARSET utf8' );
error_reporting(0);

if ($connection == false) {

    echo '<center><h1>Соединение с базой данных не установлено</h1>';

}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

/*Основная таблица*/

$query = mysqli_query($connection, 'SELECT * FROM `Sections`');

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


echo "<center><h4>Секции</h4>";

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>ID секций</strong></th>
      <th>Название секций</th>
      <th>Номер этажа</th>
      <th>Дата основания</th>
      <th>Краткое описание</th>
      </tr>
      </thead>';

while ($row = mysqli_fetch_row($query)) {

    echo '<tbody>';
    echo '<tr>';

    for ($j = 0; $j < 5; ++$j) { echo "<td>$row[$j]</td>";}

}

echo '</tr>';
echo '</tbody>';
echo '</table>';


echo '<br> <br> <br> <br>';


/*Поиск артефакта*/

function two() {

echo '<center><h4>Формуляр для изменения записей</h4>';


$select = mysqli_query($connection, "SELECT `Floor number` FROM `Floors`");

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>ID секций</strong></th>
      <th>Название секций</th>
      <th>Номер этажа</th>
      <th>Дата основания</th>
      <th>Краткое описание</th>
      </tr>
      </thead>';


echo "
      <tbody>
      <tr>
      <form action=\"update_s.php\" method = \"post\">
      <td><input type=\"text\" name=\"ID1\" size=\"10\"></td>
      <td><input type=\"text\" name=\"Name1\" size=\"10\"></td>
      <td>";

      while ($row2 = mysqli_fetch_row($select)) {

      for ($l = 0; $l < 1; $l++) {

          echo "$row2[$l]";

}

}

echo "
      </td>
      <td><input type=\"text\"  name=\"Number1\" size=\"10\"></td>
      <td><input type=\"text\"  name=\"Found1\" size=\"10\"></td>
      <td><input type=\"text\" name=\"Short_description1\" size=\"10\"></td>
      </tr>
      </tbody>
      </table>
      <input type= \"submit\" value = \"Внести\" name = \"send1\" class=\"btn\">
      </form>

";



if(isset($_POST['send1'])) {

$ID1 = $_POST['ID1'];
$Name1 = $_POST['Name1'];
$Number1 = $_POST['Number1'];
$Found1 = $_POST['Found1'];
$Desc1 = $_POST['Short_description1'];

$update = mysqli_query($connection, "UPDATE `Sections` SET 
         `ID-section` = '$ID1',
         `Section name` = '$Name1',
         `Floor number` = '$Number1',
         `Foundation date` = '$Found1',
         `Short description` = '$Desc1' WHERE `ID-section` = '$ID1'") or die (mysqli_error($connection));

}

if ($update == true) {

echo "Артефакт под номером $ID1 был модифицирован";


}

}



function one() {

echo '<center><h4>Найденный артефакт</h4>';

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>ID секции</strong></th>
      <th>Название секции</th>
      <th>Номер этажа</th>
      <th>Дата основания</th>
      <th>Краткое описание</th>
      </tr>
      </thead>';

while ($row1 = mysqli_fetch_row($find)) {

    echo '<tbody>';
    echo '<tr>';

    for($k = 0; $k < 5; ++$k) { echo "<td>$row1[$k]</td>";}

}



echo '</tr>';
echo '</tbody>';
echo '</table>';

echo '<br><br><br><br>';

}

echo "<center>Введите id артефакта, который хотите изменить";

echo "<br><br><br><br>";

echo "<form action=\"update_s.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <input type=\"submit\" value=\"Найти\" name=\"send\">
      </form>";


$ID = $_POST['id'];

if (isset($_POST['send'])) {

$ID = $_POST['id'];

$find = mysqli_query($connection, "SELECT * FROM `Sections` WHERE `ID-section` = '$ID'");

one();

two();

}

echo '<br> <br> <br> <br>';
















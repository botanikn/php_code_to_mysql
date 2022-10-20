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

$query = mysqli_query($connection, 'SELECT * FROM `Artifacts`');

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


echo "<center><h4>Артефакты</h4>";

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>ID артефактов</strong></th>
      <th>Название артефактов</th>
      <th>Примерный год создания</th>
      <th>Год нахождения</th>
      <th>ID секции</th>
      <th>Краткое описание</th>
      </tr>
      </thead>';

while ($row = mysqli_fetch_row($query)) {

    echo '<tbody>';
    echo '<tr>';

    for ($j = 0; $j < 6; ++$j) { echo "<td>$row[$j]</td>";}

}

echo '</tr>';
echo '</tbody>';
echo '</table>';


echo '<br> <br> <br> <br>';


/*Поиск артефакта*/

function two() {

echo '<center><h4>Формуляр для изменения записей</h4>';

echo '<center>
      <table>
      <thead>
      <tr>
      <th>ID артефакта</th>
      <th>Название артефакта</th>
      <th>Примерный год создания</th>
      <th>Год нахождения</th>
      <th>Список номеров секций и их название</th>
      <th>ID секции (Выберете из списка номеров секций)</th>
      <th>Короткое описание</th>
      </tr>
      </thead>';

$select = mysqli_query($connection, "SELECT `ID-section`, `Section name` FROM `Sections`");

echo "
      <tbody>
      <tr>
      <form action=\"update_a.php\" method = \"post\">
      <td><input type=\"text\" name=\"ID1\" size=\"10\"></td>
      <td><input type=\"text\" name=\"Name1\" size=\"10\"></td>
      <td><input type=\"text\" name=\"Approximate_year_of_creation1\" size=\"10\"></td>
      <td><input type=\"text\" name=\"Year_of_location1\" size=\"10\"></td>
      <td>";

      while ($row2 = mysqli_fetch_row($select)) {

      for ($l = 0; $l < 1; $l++) {

          echo "$row2[$l]";
          echo " - ";

          for ($m = 1; $m < 2; $m++) {

              echo "$row2[$m]";
              echo "<br>";

}

}

}

echo "
      </td>
      <td><input type=\"text\"  name=\"ID-section1\" size=\"10\"></td>
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
$FYear1 = $_POST['Approximate_year_of_creation1'];
$EYear1 = $_POST['Year_of_location1'];
$Section1 = $_POST['ID-section1'];
$Desc1 = $_POST['Short_description1'];

$update = mysqli_query($connection, "UPDATE `Artifacts` SET 
         `ID-artifact` = '$ID1',
         `Artifact name` = '$Name1',
         `Approximate year of creation` = '$FYear1',
         `Year of location` = '$EYear1',
         `ID-section` = '$Section1',
         `Short description` = '$Desc1' WHERE `ID-artifact` = '$ID1'") or die (mysqli_error($connection));

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
      <th><strong>ID артефактов</strong></th>
      <th>Название артефактов</th>
      <th>Примерный год создания</th>
      <th>Год нахождения</th>
      <th>ID секции</th>
      <th>Краткое описание</th>
      </tr>
      </thead>';


while ($row1 = mysqli_fetch_row($find)) {

    echo '<tbody>';
    echo '<tr>';

    for($k = 0; $k < 6; ++$k) { echo "<td>$row1[$k]</td>";}

}



echo '</tr>';
echo '</tbody>';
echo '</table>';

echo '<br><br><br><br>';

}

echo "<center>Введите id артефакта, который хотите изменить";

echo "<br><br><br><br>";

echo "<form action=\"update_a.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <input type=\"submit\" value=\"Найти\" name=\"send\">
      </form>";


$ID = $_POST['id'];

if (isset($_POST['send'])) {

$ID = $_POST['id'];

$find = mysqli_query($connection, "SELECT * FROM `Artifacts` WHERE `ID-artifact` = '$ID'");

one();

two();

}

echo '<br> <br> <br> <br>';
















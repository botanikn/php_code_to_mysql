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

$query = mysqli_query($connection, 'SELECT * FROM `Floors`');

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


echo "<center><h4>Этажи</h4>";

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>Номер этажа</strong></th>
      <th>Несекции</th>
      </tr>
      </thead>';

while ($row = mysqli_fetch_row($query)) {

    echo '<tbody>';
    echo '<tr>';

    for ($j = 0; $j < 2; ++$j) { echo "<td>$row[$j]</td>";}

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
      <th><strong>Номер этажа</strong></th>
      <th>Несекции</th>
      </tr>
      </thead>';


echo "
      <tbody>
      <tr>
      <form action=\"update_f.php\" method = \"post\">
      <td><input type=\"text\" name=\"Floor\" size=\"10\"></td>
      <td><input type=\"text\" name=\"NS\" size=\"10\"></td>
      </tr>
      </tbody>
      </table>
      <input type= \"submit\" value = \"Внести\" name = \"send1\" class=\"btn\">
      </form>

";



if(isset($_POST['send1'])) {

$Floor = $_POST['Floor'];
$NS = $_POST['NS'];

$update = mysqli_query($connection, "UPDATE `Floors` SET 
         `Floor number` = '$Floor',
         `Interesting features` = '$NS' WHERE `Floor number` = '$Floor'") or die (mysqli_error($connection));

}

if ($update == true) {

echo "Этаж под номером $Floor был модифицирован";


}

}



function one() {

echo '<center><h4>Найденный Этаж</h4>';

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>Номер этажа</strong></th>
      <th>Несекции</th>
      </tr>
      </thead>';

while ($row1 = mysqli_fetch_row($find)) {

    echo '<tbody>';
    echo '<tr>';

    for($k = 0; $k < 2; ++$k) { echo "<td>$row1[$k]</td>";}

}



echo '</tr>';
echo '</tbody>';
echo '</table>';

echo '<br><br><br><br>';

}

echo "<center>Введите номер этажа, который хотите изменить";

echo "<br><br><br><br>";

echo "<form action=\"update_f.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <input type=\"submit\" value=\"Найти\" name=\"send\">
      </form>";


$ID = $_POST['id'];

if (isset($_POST['send'])) {

$ID = $_POST['id'];

$find = mysqli_query($connection, "SELECT * FROM `Floors` WHERE `Floor number` = '$ID'");

one();

two();

}

echo '<br> <br> <br> <br>';
















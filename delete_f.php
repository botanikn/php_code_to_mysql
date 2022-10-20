<?php

$connection = mysqli_connect('netb_db_1', 'root', '1', 'Museum_register') or die ('You are dead');

$query = mysqli_query($connection, 'SELECT * FROM `Floors`');

error_reporting(0);

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


echo "<center><h1>Этажи</h1>";


echo '<br>';
echo '<br>';

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


echo "<center>Какую запись вы бы хотели удалить? Напишите номер этажа";

echo '<br> <br> <br> <br>';


echo "<form action=\"delete_f.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <br> <br> <br> <br>
      <input type=\"submit\" value=\"Удалить\" name=\"send\" class=\"btn\">
      </form>";

echo '<br> <br> <br> <br>';


if (isset($_POST['send'])) {


$ID = $_POST['id'];

$sql = mysqli_query($connection, "DELETE FROM `Floors` WHERE `Floor number` = '$ID'");


}

if ($sql == true) {

echo "Этаж под номером '$ID' был удалён";

}


































<?php

$connection = mysqli_connect('localhost', 'a3', '1', 'Museum_register') or die ('You are dead');

$query = mysqli_query($connection, 'SELECT * FROM `Artifacts`');


echo '<head>
      <link rel="stylesheet" href="select_a.css">
      </head>
';


echo "<center><h1>Artifacts</h1>";


echo '<br>';
echo '<br>';

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


echo "<center>Какую запись вы бы хотели удалить? Напишите id артефакта";

echo '<br> <br> <br> <br>';


echo "<form action=\"delete_a.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <br> <br> <br> <br>
      <input type=\"submit\" value=\"Удалить\" name=\"send\" class=\"btn\">
      </form>";

echo '<br> <br> <br> <br>';


if (isset($_POST['send'])) {


$ID = $_POST['id'];

$sql = mysqli_query($connection, "DELETE FROM `Artifacts` WHERE `ID-artifact` = '$ID'");


}

if ($sql == true) {

echo "Артефакт под номером '$ID' был удалён";

}


































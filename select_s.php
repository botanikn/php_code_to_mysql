<?php

$connection = mysqli_connect('netb_db_1', 'root', '1', 'Museum_register') or die ('Does not work');
$connection->query( 'SET CHARSET utf8' );

error_reporting(0);


if ($connection == false) {

    echo '<center><h1>Соединение с базой данных не установлено</h1>';

}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

$query = mysqli_query($connection, 'SELECT * FROM `Sections`');

#if ($query == true) {

#    echo '<center><h1>Соединение с таблицей установлено</h1>';

#}

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';



echo "<center><h1>Секции</h1>";


echo '<br>';
echo '<br>';

$row = mysqli_num_rows($query);

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>ID секции</strong></th>
      <th>Название секции</th>
      <th>Номер этажа</th>
      <th>Дата основания</th>
      <th>Короткое описание</th>
      </tr>
      </thead>';

while ($row = mysqli_fetch_row($query)) {

    echo '<tbody>';
    echo '<tr>';

    for ($j = 0; $j < 5; ++$j) echo "<td>$row[$j]</td>";

}

echo '</tr>';
echo '</tbody>';
echo '</table>';


echo '<br>
      <br>
      <a href="delete_s.php" class="btn">Удалить запись</a> <a href="update_s_1.php" class="btn">Изменить запись</a> <a href="insert_s_1.php" class="btn">Добавить новую секцию</a>
';

















#$sql = "SELECT ID-artifact FROM Artifacts";

#if ($result = $connection->query($sql)) {

#    while ($row = $result->fetch_array()) {

#	$arid = $row["ID-artifact"];
#	print_r($arid);

#}

#}


#$select = mysqli_query($connection. "SELECT ID-artifact FROM Artifacts");

#while ($row = mysqli_fetch_array($select)) {

#    print ("ID-artifact: " . $row['ID-artifact'] . "<br>");

#}

#else {

#    print ("Connection is successful");

#}
<?php

$connection = mysqli_connect('localhost', 'a3', '1', 'Museum_register') or die ('Does not work');
$connection->query( 'SET CHARSET utf8' );


if ($connection == false) {

    echo '<center><h1>Соединение с базой данных не установлено</h1>';

}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';


$query = mysqli_query($connection, 'SELECT * FROM `Artifacts`');



#if ($query == true) {

#    echo '<center><h1>Соединение с таблицей установлено</h1>';

#}

echo '<head>
      <link rel="stylesheet" href="select_a.css">
      </head>
';


echo "<center><h1>Артефакты</h1>";


echo '<br>';
echo '<br>';

$row = mysqli_num_rows($query);

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

    for ($j = 0; $j < 6; ++$j) echo "<td>$row[$j]</td>";
    echo "<td class=\"change\">Изменить</td>";
    echo "<td class=\"delete\">Удалить</td>";
}

#echo '</tr>';
echo '</tbody>';
echo '</table>';

echo '<br>
      <br>
      <a href="insert_a.php" class="btn">Добавить новый артефакт</a>
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
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


$query = mysqli_query($connection, 'SELECT * FROM `Artifacts`');



#if ($query == true) {

#    echo '<center><h1>Соединение с таблицей установлено</h1>';

#}

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


echo "<center><h1>Артефакты</h1>";


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


echo '<br>
      <br>
      <a href="delete_a.php" class="btn">Удалить запись</a> <a href="update_a_1.php" class="btn">Изменить запись</a> <a href="insert_a_1.php" class="btn">Добавить новый артефакт</a>
';


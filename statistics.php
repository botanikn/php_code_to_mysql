<?php

$connection = mysqli_connect('netb_db_1', 'root', '1', 'Museum_register') or die ('Нет подключения');


error_reporting(0);

echo '<head>
      <link rel="stylesheet" href="select_s.css">
      </head>
';


$count_all_art = mysqli_query($connection, "SELECT COUNT(*) FROM Artifacts");

echo '<center>
      <table>
      <thead>
      <tr>
      <th>Всего артефактов в музее</th>
      </tr>
      </thead>';

while($row = mysqli_fetch_row($count_all_art)) {

    echo '<tbody>';
    echo '<tr>';

    for ($i = 0; $i < 1; ++$i) {

        echo "<td>$row[$i]</td>";

}


echo '</tr>';
echo '</tbody>';
echo '</table>';



}

echo '<br><br>';

$count_all_sec = mysqli_query($connection, "SELECT COUNT(*) FROM Sections");

echo '<center>
      <table>
      <thead>
      <tr>
      <th>Всего секций в музее</th>
      </tr>
      </thead>';

while($row = mysqli_fetch_row($count_all_sec)) {

    echo '<tbody>';
    echo '<tr>';

    for ($i = 0; $i < 1; ++$i) {

        echo "<td>$row[$i]</td>";

}

echo '</tr>';
echo '</tbody>';
echo '</table>';




}



echo '<br><br>';




$count_all_fl = mysqli_query($connection, "SELECT COUNT(*) FROM Floors");

echo '<center>
      <table>
      <thead>
      <tr>
      <th>Всего этажей в музее</th>
      </tr>
      </thead>';

while($row = mysqli_fetch_row($count_all_fl)) {

    echo '<tbody>';
    echo '<tr>';

    for ($i = 0; $i < 1; ++$i) {

        echo "<td>$row[$i]</td>";

}

echo '</tr>';
echo '</tbody>';
echo '</table>';

echo '<br> <br> <br> <br>';

}

$select = mysqli_query($connection, "SELECT `ID-section`, `Section name` FROM `Sections`");

echo "<table>
      <thead>
      <tr>
      <th>Список секций</th>
      </tr>
      </thead>
      ";

echo "
      <tbody>
      <tr>
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

echo '</tr>';
echo '</tbody>';
echo '</table>';

echo "<br><br><br><br>";

echo "<center>Введите id секции для того, чтобы увидеть количество артефатов в ней";

echo "<br><br><br><br>";

echo "<form action=\"statistics.php\" method=\"post\">
      <input type=\"text\" name=\"id\">
      <input type=\"submit\" value=\"Найти\" name=\"send\">
      </form>";


$ID = $_POST['id'];

if (isset($_POST['send'])) {

$find = mysqli_query($connection, "SELECT COUNT(*) FROM `Artifacts` WHERE `ID-section` = '$ID'");

}

echo '<br> <br> <br> <br>';

echo '<center>
      <table>
      <thead>
      <tr>
      <th><strong>Количество артефатов в выбранной секции</strong></th>
      </tr>
      </thead>';


while ($row = mysqli_fetch_row($find)) {

    echo '<tbody>';
    echo '<tr>';

    for($k = 0; $k < 1; ++$k) { echo "<td>$row[$k]</td>";}

}



echo '</tr>';
echo '</tbody>';
echo '</table>';


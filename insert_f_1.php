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
      <th>Номер этажа</th>
      <th>Интересные возможности</th>
      </tr>
      </thead>";

#$select = mysqli_query($connection, "SELECT `Floor number` FROM `Floors`");




echo "
      <tbody>
      <tr>
      <form action=\"insert_f_1.php\" method = \"post\">
      <td><input type=\"text\" name=\"Number\"></td>
      <td><input type=\"text\" name=\"Feat\"></td>
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

$Number = $_POST['Number'];
$Feat = $_POST['Feat'];

$mysql = mysqli_query($connection, "INSERT INTO `Floors`
 (`Floor number`,
  `Interesting features`)
  VALUES
  ('$Number',
   '$Feat')")
   or die (mysqli_error($connection));

if ($mysql == true) {

    print('Новый этаж добавлен в базу');

}

echo "<br> <br> <br>";


#$query = mysqli_query($connection, 'SELECT `Floor number` FROM `Floors` ORDER BY `Floor number` DESC LIMIT 1');
#$row = mysqli_fetch_array($query);
#$id = $row['Floor number'];

#echo "I - $id";

}
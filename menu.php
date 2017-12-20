<?php
//Подключение к базе выбор данных для меню
define('DB_SERVER', 'localhost');        
define('DB_USERNAME', 'root');         
define('DB_PASSWORD', 'a123'); 
define('DB_DATABASE', 'map'); 


require_once 'database.class.php';
DataBase::Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);





//Запрос к базе
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

//Разобрать результат
while ($row = @mysql_fetch_array($result)){

  echo '<h3>';
  echo $row['name'] . '</h3>'."  находится по адресу  " . $row['address'] . '<br>';
  echo ''.'<br>';
}
 
 ?>
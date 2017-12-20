<?php
//Подключение к базе и выбор данных для показа на карте
header("Content-type: text/xml");
define('DB_SERVER', 'localhost');       
define('DB_USERNAME', 'root');         
define('DB_PASSWORD', 'a123'); 
define('DB_DATABASE', 'map'); 


require_once 'database.class.php';
DataBase::Connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);




function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


echo '<markers>';


while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';

   $view = 'name="' . parseToXML($row['name']) . '" '.
  'address="' . parseToXML($row['address']) . '" '.
  'lat="' . $row['lat'] . '" '.
  'lng="' . $row['lng'] . '" '.
  'type="' . $row['type'] . '" ';
  echo $view;
  echo '/>';
}

echo '</markers>';
DataBase::Close();
?>
<?php
require("phpsqlajax_dbinfo.php");



// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}



// Start XML file, echo parent node


// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_array($result)){
  // Add to XML document node
  
  echo $row['name'] . "  находится по адресу  " . $row['address'] . '<br>';

}
 


?>
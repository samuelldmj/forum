<?php 

//host
define('HOST', 'localhost');

//pass
define('PASS', '');

//user
define('USER', 'root');

//dbname
define('DBNAME', 'forumdb');


//CONNECTION
$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER ,PASS);

//checking if the connection was succesful
if (!$conn) {
echo "Connection Failed";
}


?>
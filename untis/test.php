<?php
require_once(dirname(dirname(__FILE__)).'/function/ClassDataBase.php') ;
// define('DB_HOST', '127.0.0.1:8889');
// define('DB_USER', 'star');
// define('DB_PASSWORD', 'star');
// define('DB_NAME','elearning');
// $dal=new DAL();
// $marks=array('id','gradename','year');
// $sql='select id,gradename,year from grades';
// foreach ($marks as $make) {
// 	$results=$dal->my_query_grade($sql);
	
// }
// var_dump($results);
$sql='select id,gradename,year from grades';

$cdb=new ClassDataBase();
$results=$cdb->QuerySQL($sql);
var_dump($results);
echo '$sql';
?>
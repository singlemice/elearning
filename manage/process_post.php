<?php
require_once(dirname(dirname(__FILE__)).'/function/ClassDataBase.php') ;
$action=$_POST["action"];

if($action=="post_course_info"){
	$coure=$_POST['coure'];
	$class=$_POST['class'];
	$course_pro=$_POST['course_pro'];
	$course_num=$_POST['course_num'];
	$time=$_POST['time'];
	$teacher=$_POST['teacher'];
	$start_time=$_POST[];
	$end_time=$_POST[];

}
elseif ($action=="post_grades_info") {
	$gradename=$_POST["gradename"];
	$year=$_POST["year"];
}
?>
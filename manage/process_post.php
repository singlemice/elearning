<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" ><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<body>
<?php
require_once(dirname(dirname(__FILE__)).'/function/ClassDataBase.php') ;
$action=$_POST["action"];
echo $action;
if($action=="post_course_info"){
	$course=$_POST['course'];
	$class=$_POST['classname'];
	$course_pro=$_POST['course_pro'];
	$course_num=$_POST['course_num'];
	$time=$_POST['time'];
	$teacher=$_POST['teacher'];
	$start_time=$_POST['start_timeYear'].'-'.$_POST['start_timeMonth'].'-'.$_POST['start_timeDay'];
	$end_time=$_POST['end_timeYear'].'-'.$_POST['end_timeMonth'].'-'.$_POST['end_timeDay'];
	echo 'start_time'.$start_time."end_time".$end_time;
    echo "<br/>".strtotime($start_time)."<br/>";
	$sql="insert into course(coursename,classid,course_pro,course_num,time,teacher,start_time,end_time) values('";
		$sql=$sql.$course."',".$class.",'".$course_pro."','".$course_num."',".$time.",'".$teacher."','".$start_time."','".$end_time."')";

    $cdb=new ClassDataBase();
    $cdb->ExecuteSQL($sql);
}
elseif ($action=="post_grades_info") {
	$gradename=$_POST["gradename"];
	$year=$_POST["year"];
	$sql="insert into grade"
}
?>
</body>
</html>
<?php
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
$username=trim($_REQUEST['username']);
$passwd=md5(trim($_REQUEST['password']));
$role_flag=trim($_REQUEST['flag']); //角色标识   s=student  t=teacher  m=manager
$role_flag="m";
if ($role_flag=="s")
{
	$sql="select * from students where snum='".$username."' and spasswd='".$passwd."'";
}
else if($role_flag=="t")
{
	$sql="select * from teachers where tnum='".$username."' and tpasswd='".$passwd."'";
}
else if($role_flag=="m")
{
	$sql="select * from manager where uname='".$username."' and passwd='".$passwd."'";
}
else
{
	echo "<script>window.location =\"error.html\";</script>";
}
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name,$port) or die("Error connection to Mysql Server");
//echo "<br/>";
//echo $sql;
//echo "<br/>";
$result=mysqli_query($dbc,$sql) or die("Error select into Mysql DB");
//print_r($result);
$flag=mysqli_num_rows($result);
$aResultTotal = mysqli_fetch_array($result);
if($flag==1)
{
		if ($role_flag=="s")
	{
		$_SESSION["login_status"]=1;
		$_SESSION["snum"]=$aResultTotal["snum"];
		$_SESSION["name"]=$aResultTotal["name"];
		$_SESSION["realname"]=$realname;

		echo "<script>window.location =\"student/corses.php\";</script>";
	}
	else if($role_flag=="t")
	{
		$_SESSION["login_status"]=1;
		$_SESSION["tnum"]=$aResultTotal["tnum"];
		$_SESSION["name"]=$aResultTotal["name"];
		echo "<script>window.location =\"manage/tmain.php\";</script>";
	}
	else if($role_flag=="m")
	{
		$_SESSION["login_status"]=1;
		$_SESSION["name"]=$aResultTotal["uname"];
		echo "<script>window.location =\"manage/main.php\";</script>";
	}
	
	$_SESSION["username"]=$username;
	$_SESSION["realname"]=$realname;
	//$_SESSION["role"]=$role;
	$_SESSION["code"]=$code;
	$_SESSION["ID"]=$userflag;
	echo "<script>window.location =\"index.php\";</script>";
}
else
{
	echo "<script>window.location =\"login.html\";</script>";
}
mysqli_close($dbc);

?>
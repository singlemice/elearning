<?php
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
$username=trim($_REQUEST['username']);

$passwd=md5(trim($_REQUEST['password']));
$role_flag=trim($_REQUEST['flag']); //角色标识   s=student  t=teacher  m=manager

if ($role_flag=="s")
{
	echo "<script>window.location =\"student\corses.php\";</script>";
}
else if($role_flag=="t")
{
	echo "<script>window.location =\"manager\tmain.php\";</script>";
}
else if($role_flag=="m")
{
	echo "<script>window.location =\"manager\main.php\";</script>";
}
else
{
	echo "<script>window.location =\"error.html\";</script>";
}
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select * from users,role where username='".$username."' and passwd='".$passwd."' and users.role=role.id;";
//echo "<br/>";
//echo $sql;
//echo "<br/>";
$result=mysqli_query($dbc,$sql) or die("Error select into Mysql DB");
//print_r($result);
$flag=mysqli_num_rows($result);
$aResultTotal = mysqli_fetch_array($result);
$iTotal = $aResultTotal[0];
$id=$aResultTotal["ID"];
$username=$aResultTotal["username"];
$realname=$aResultTotal["realname"];
$role=$aResultTotal["role"];
$code=$aResultTotal["code"];
$userflag=$id.",".$role;
if($flag==1)
{
	$_SESSION["login_status"]=1;
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
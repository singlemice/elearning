<?php
require_once dirname(dirname(__FILE__)).'/config/config.php';
    //文件名：ClassDataBase.php
    //类名：数据库类 ClassDataBase

class ClassDataBase{
//属性
    private $host;          //数据库主机名
    private $user;          //用户名
    private $pwd;           //密码
    private $dbname;        //数据库名
    private $ConnId;        //数据库链接标识
    private $db_selected;   //数据库选择标识
    private $result;        //数据库查询返回结构集

    //构造函数，链接数据库
function __construct(){
    $this->host = DBInfo::$HOST;
    $this->user = DBInfo::$USER;
    $this->pwd = DBInfo::$PWD;
    $this->dbname = DBInfo::$DBNAME;//链接数据库
    $this->ConnId = mysql_connect($this->host,$this->user,$this->pwd);

    if(!$this->ConnId){
        die('Sorry,Connect database false! '.mysql_error());
    }
    else{
    //选择数据库
    $this->db_selected = mysql_select_db($this->dbname,$this->ConnId);
    if(!$this->db_selected){
        die('Cannot select the database:'.mysql_error());
    }//if;
    $this->result = mysql_query('set names utf8');
    }//if;
}//function __construct();


//析构函数，关闭数据库
function __destruct(){
    //关闭数据库链接

    @mysql_close($this->ConnId);

}//function __destruct();


//执行数据库的更新，插入和删除
function ExecuteSQL($sql){
    $this->result = mysql_query($sql);
    if(!$this->result){
    die('Cannot update the database: $sql'.mysql_error());
    }//if
}//function ExecuteSQL();


//执行数据库的查询，并返回查询结果
function QuerySQL($sql){
    $i = 0;
    $result_arr = array();
    $this->result = mysql_query($sql,$this->ConnId);
    if(!$this->result){
        die('Cannot view the database: '.mysql_error());
    }
    else
    {
        while($row = mysql_fetch_array($this->result)){
            $result_arr[$i++] = $row;
        }//while
        return $result_arr;
        //释放内存
        mysql_free_result($this->result);
    }//if
}//function QuerySQL();
}
?>

<?php
/**
* 
*/
class DAL 
{
	
	function __construct()
	{
		# code...
	}
	private function dbconnect()
	{
		$conn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)
			or die("<br> Could not connect to Mysql Server");
		mysql_select_db(DB_NAME,$conn) 
			or die("<br>Could not select the indicated database");
		return $conn;
	}
	private function query($sql){
		$this->dbconnect();
		$res=mysql_query($sql);
		if($res){
			if(strpos($sql, 'select')===false){
				return true;
			}
		}
		else{
			if（strpos($sql,'select')===false){
				return false;
			}	
			else{
				return null;
			}
		}

		$results = array();

		while ($row = mysql_fetch_array($res)) {
			$result=new DALQueryResult();
			foreach ($row as $key => $value) {
				$result->$key=$value;
			}
			$results[]=$result;
		}

		return $results;	
	}

	public function my_query_grade($sql){
		return this->query($sql);
	}
}

/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * */

/**
* 
*/
class DALQueryResult
{
	private $_result = array();

	function __construct(){
		# code...
	}

	public function __set($var,$val){
		$this->_result[$var]=$var;
	}

	public function __get($var){
		if(isset($this->_result[$var])){
			return $this->_result[$var];
		}
		else{
			return null;
		}

	}


}

?>
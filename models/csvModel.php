<?php
require_once './libraries/DBconnect.php';
class csvModel extends DBConnection
{

	public function select($table,$coloumn,$condition)
	{
		
		$data['columns']	= $coloumn;
		$data['tables']		= $table;
		$data['conditions']=array(array($condition[0] .'="'. $condition[1].'"'),true);
		$temp = $this->_db->select($data);
		
		$myResult=array();
		while($row = $temp->fetch(PDO::FETCH_ASSOC)) {
			$myResult[]=$row;
		}
		//echo "<pre>";
		return($myResult);
		 
	}
	public function insert($table,$coloumn)
	{
	
		//$data['columns']	= $coloumn;
		$data['tables']		= $table;
		$temp = $this->_db->insert($data['tables'],$coloumn);
		
		$myResult=array();
		
			
	}

}

?>
<?php
require_once './libraries/DBconnect.php';
class csvModel extends DBConnection
{

	public function select($table,$coloumn,$condition)
	{
		
		$data['columns']	= $coloumn;
		$data['tables']		= $table;
		$data['conditions']=array(array('$condition[0] ='. $condition[1]),true);
		$temp = $this->_db->select($data);
		
		$myResult=array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$myResult[]=$row;
		}
		if($myResult != null)
		{
			$userFormArray["country_id"] = $myResult[0]['id'];
		}
		 
	}

}

?>
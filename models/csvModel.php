<?php
/*
    **************************** Creation Log *******************************
    File Name                   -  lang.en.php
    Project Name                -  ExamGenerator
    Description                 -  Controller File For test
    Version                     -  1.0
    Created by                  -  Avni Jain 
    Created on                  -  May 03, 2013
*/
require_once './libraries/DBconnect.php';
class csvModel extends DBConnection
{
	/*********This function takes three arguments $table for tablename as string,$coloumn for coloumn(to be selected) 
	as an array,condition as an array it will return the array of selected column************************************/
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
	/*********This function takes two arguments $table for tablename as string,$coloumn for coloumn(to be inserted as an array********************/
	public function insert($table,$coloumn)
	{
		$data['tables']		= $table;
		$temp = $this->_db->insert($data['tables'],$coloumn);
		
		$myResult=array();		
	}

}

?>
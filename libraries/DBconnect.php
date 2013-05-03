<?php

/* Example Config for MYSQL */
$config = array();
$config['DATABSE_USER_NAME'] = 'root';
$config['DATABSE_PASSWORD'] = 'root';
$config['DATABASE_NAME'] = 'careerbook';
$config['DATABASE_HOST'] = 'localhost';
$config['DATABASE_TYPE'] = 'mysql';
$config['DATABASE_PORT'] = null;
$config['DATABASE_PERSISTENT'] = true;


include('PDO/cxpdo.php');

$db = db::instance($config);
/*
$result = $db->insert('mvc', array('title' => 'My First Post', 'desc' => ' DB system'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Second Post', 'desc' => 'can go relax!'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Third Post', 'desc' => 'I later'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';*/

echo "<pre>";

$data['columns']	= array('first_name', 'last_name','email_primary');
$data['tables']		= 'users';
//$data['conditions']=array(array('user_id ="17"'),true);
//$data['conditions']=array(array(' (user_id = 17  AND friend_id = 21) AND status = "F" '),true);
//$data['conditions']=array(array('email_primary LIKE "%loo%" '),true);
//$data['conditions']		= array('user_id' => 17);
//$data['group_by'] = array('user_id');
//$data['order_by'] = 'user_id';
//$data['limit']		= 2;
//$data['offset']		= 1;
$result = $db->select($data);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	print_r($row);
}


?>
<?php

/* Example Config for MYSQL */
$config = array();
$config['DATABSE_USER_NAME'] = 'root';
$config['DATABSE_PASSWORD'] = 'root';
$config['DATABASE_NAME'] = 'skillseeker';
$config['DATABASE_HOST'] = 'localhost';
$config['DATABASE_TYPE'] = 'mysql';
$config['DATABASE_PORT'] = null;
$config['DATABASE_PERSISTENT'] = true;


include('PDO/cxpdo.php');

$db = db::instance($config);

$result = $db->insert('mvc', array('title' => 'My First Post', 'desc' => ' DB system'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Second Post', 'desc' => 'can go relax!'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Third Post', 'desc' => 'I later'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';


?>
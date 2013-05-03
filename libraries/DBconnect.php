<?php

/* Example Config for MYSQL */
$config = array();
$config['user'] = 'root';
$config['pass'] = 'prince';
$config['name'] = 'mvc';
$config['host'] = 'localhost';
$config['type'] = 'mysql';
$config['port'] = null;
$config['persistent'] = true;


include('PDO/cxpdo.php');

$db = db::instance($config);

$result = $db->insert('mvc', array('title' => 'My First Post', 'desc' => ' DB system'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Second Post', 'desc' => 'can go relax!'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';
$result = $db->insert('mvc', array('title' => 'My Third Post', 'desc' => 'I later'));
print 'Created row '. $db->lastInsertId(). ' in the table "mvc"<br />';


?>
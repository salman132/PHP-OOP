<?php


defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/'.'gallery');

define('INCLUDE_PATH', SITE_ROOT.DS.'admin'.DS.'includes');




require_once('functions.php');
require_once('new_config.php');
require_once('database.php');
require_once('db_object.php');
require_once('user.php');
require_once('photo.php');
require_once('session.php');
require_once('comments.php');
require_once('paginate.php');






?>
<?php
session_start();
require_once('vendor/autoload.php');
require_once('config/database.php');

use App\Libraries\Route; //gọi lớp
$dt = new Route();
<?php
session_start();

require_once __DIR__ . '/../app/Config/Config.php';
require_once __DIR__ . '/../app/Config/Database.php';
require_once __DIR__ . '/../app/Config/auth.php';
require_once __DIR__ . '/../app/Router.php';

$app = new Router();
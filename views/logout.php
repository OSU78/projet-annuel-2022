<?php
require_once '../config.php';
$authDB = require_once '../models/Security.php';
$sessionId = $_COOKIE['session'];
if ($sessionId) {
    $authDB->logout($sessionId);
    header('Location: /');
}
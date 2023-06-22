<?php
if(isset($_SESSION['user'])) $user = $_SESSION['user'];
session_destroy();
session_start();
if(isset($user))$_SESSION['user'] = $user;
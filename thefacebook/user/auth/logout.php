<?php
require_once '../config/init.php';

Authentication::Logout();
header('Location: ../index.php');
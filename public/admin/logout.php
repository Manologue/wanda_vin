<?php

session_start();
unset($_SESSION['admin_name']);
unset($_SESSION['admin_photo']);
header("Location: ./index.php");

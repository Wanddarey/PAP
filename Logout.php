<?php
session_start();
if (!empty($_SESSION['user'])) {
   session_unset();
}
header('Location: Index.php');
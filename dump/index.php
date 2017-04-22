<?php
session_start();

if($_SESSION['logged_in'] == 1) { header("Location: agentView.php"); } else if ($_SESSION['logged_in'] == 2){header("Location: salesView.php");} else { header("Location: login.php"); }

?>


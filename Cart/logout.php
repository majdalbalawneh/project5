<?php
session_start();
if(isset($_SESSION['FirstName'])){
	session_destroy();
	header('location:landing.php');
}else{
	header('location:landing.php');

}
?>
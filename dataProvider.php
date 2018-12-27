<?php
session_start();
// PDO : php data ojects
try
{
	$conn = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	
catch(PDOException $e)
 {
    echo "Connection failed: " . $e->getMessage();
 }
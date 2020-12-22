<?php
// Database Connection
$db = 'mysql:dbname=php_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($db,$user,$password);

$id = $_POST['id'] ?? null;

if(!$id)
{
  header('Location: products.php');
  exit;
}

// Delete Query to Delete Record from the databse

$statment = $pdo->prepare("DELETE FROM products Where id = :id");
$statment->bindValue(':id',$id);
$statment->execute();
header('Location: products.php');



?>
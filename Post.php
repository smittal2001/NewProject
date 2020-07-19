<?php

$servername = 'localhost';
$username = 'root';
$password = 'ankith_sloth';
$dbname = 'Project1';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn -> connect_error)
{
  die("connection failed; ". $conn-> connect_error);
}
session_start();

$post = $_POST['userpost'];
$user = $_SESSION['user'];

if(!empty($_POST['userpost']))
{

  $sql = "INSERT INTO userposts (username,post) VALUES ('".$user."','".$post."')";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss",$user,$post);
  $stmt->execute();
  header("Location: http://localhost:8080/WebProject/ProfilePage.php");

}
$conn->close();
 ?>

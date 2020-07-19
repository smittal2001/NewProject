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
$user= $_POST["username"];
$pass = $_POST["password"];


$check = true;
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql) or die($conn->error);
  while ($row = $result->fetch_assoc())
  {
    if($row['username']===$user && $row['password']===$pass)
    {
      $_SESSION['isLog'] = true;
      //header("Location: http://localhost:8080/PHP/BudgetME/HomePage.php");
      $_SESSION['user'] = $user;
      $_SESSION['id'] = $row['id'];
      $check = false;

}

}

if($check === true)
{
  $_SESSION['Wrong']= "wrong thingy";
  header("Location: http://localhost:8080/WebProject/LoginPage.php");

}
else{
  header("Location: http://localhost:8080/WebProject/ProfilePage.php");
}

 ?>

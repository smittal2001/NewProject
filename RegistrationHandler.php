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
//$userid =  mt_rand(1, 500);
header("Location: http://localhost:8080/WebProject/RegistrationPage.php");
$check = true;
$legal ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_";
if(strlen($user)>=3&&strlen($user)<=20)
{
  for($i = 0; $i<strlen($user); $i++)
  {

      if(strpos($legal,substr($user,$i,1))===false)
      {
        $_SESSION['Error'] = "Invalid username";
        header("Location: http://localhost:8080/WebProject/RegistrationPage.php");
        $check = false;

        break;
      }
    }

}
else {
      $check = false;
        $_SESSION['Error'] = "Invalid username";

}
if($check===true)
{
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc())
  {
    if($user === $row['username'])
    {
      $check = false;
      $_SESSION['userexists'] = "already exists";
      header("Location: http://localhost:8080/WebProject/RegistrationPage.php");

      break;
    }
  //   while ($row = $result->fetch_assoc())
  //   {
  //     while($userid === $row['userid'])
  //     {
  //       $userid = mt_rand(1, 500);
  //     }
  // }
}
  if($check === true)
  {
  $sql = "INSERT INTO users (username, password) VALUES ('".$user."','".$pass."')";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss",$user,$pass);
  $stmt->execute();
  header("Location: http://localhost:8080/WebProject/LoginPage.php");
}

}

$conn->close();

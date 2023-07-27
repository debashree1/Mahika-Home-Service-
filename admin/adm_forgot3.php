<?php
session_start();

require("../php/PasswordHash.php");
$hasher = new PasswordHash(8, false);

@$password=$_REQUEST["password"];

$hash = $hasher->HashPassword($password);
$password=$hash;

$username=$_SESSION['username'];
if ($_SESSION["username"]==true)
{
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $query="update admin_login set password='$password' where username='$username' ";
    $result=mysqli_query($con,$query);
    if($result)
    {
        session_destroy(); //destroy the session
        header("location:a_success.php");
        exit();
    }
}
else {
    header("location:index.php");
}

?>
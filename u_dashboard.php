<?php
session_start();
@$username=$_REQUEST["username"];
@$password=$_REQUEST["password"];
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
if ($_SESSION["username"]==true && $_SESSION["password"]==true)
{
    $con=mysqli_connect("localhost","root","","mahika") or die("unable to connect");
    $q="select name from user_details where username='$username'";
    $res=mysqli_query($con,$q);
    if ($res)
    {
        while ($row=mysqli_fetch_array($res))
        {
            $dbname=$row['name'];
            $_SESSION['name']=$dbname;
            header("location:find_service.php");

        }
    }
}
else
{
    header("location:userlogin.php");
}

?>
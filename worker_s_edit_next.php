<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:workerlogin.html");
}
else {
    $username=$_SESSION['username'];
    @$category=$_REQUEST['category'];
    @$basis=$_REQUEST['basis'];
    @$service1=$_REQUEST["service1"];
    @$service2=$_REQUEST["service2"];
    @$service3=$_REQUEST["service3"];
    @$rate11=$_REQUEST["rate11"];
    @$rate12=$_REQUEST["rate12"];
    @$rate13=$_REQUEST["rate13"];
    @$rate21=$_REQUEST["rate21"];
    @$rate22=$_REQUEST["rate22"];
    @$rate23=$_REQUEST["rate23"];
    @$rate31=$_REQUEST["rate31"];
    $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
    @$q="UPDATE worker_details SET service1='$service1',service2='$service2',service3='$service3',rate11='$rate11',rate12='$rate12',rate13='$rate13',rate21='$rate21',rate22='$rate22',rate23='$rate23',rate31='$rate31' where username='$username'";
    @$res = mysqli_query($a, $q);
    if($res)
    {
        header("Location:worker_personal.php");
    }
    else{
        echo "Error";
    }

}
?>
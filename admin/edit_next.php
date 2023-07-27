<?php session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:index.php");
}
else {
    @$username=$_REQUEST["username"];
    $_SESSION['username']=$username;
    @$ans=$_REQUEST["ans"];
    @$ghy=$_REQUEST["ghy"];
    @$tin=$_REQUEST["tin"];
    @$tez=$_REQUEST["tez"];
    @$ngn=$_REQUEST["ngn"];
    @$dib=$_REQUEST["dib"];
    @$sil=$_REQUEST["sil"];
    @$jor=$_REQUEST["jor"];
    if ($ans!=null)
    {
        $a=mysqli_connect("localhost","root","","Mahika") or die("unable to connect");
        @$q1="UPDATE admin_login SET username='$username',answer='$ans'";
        @$res1 = mysqli_query($a, $q1);
        @$q2="UPDATE cities SET centre='$ghy' where city='Guwahati'";
        @$res2 = mysqli_query($a, $q2);
        @$q3="UPDATE cities SET centre='$sil' where city='Silchar'";
        @$res3 = mysqli_query($a, $q3);
        @$q4="UPDATE cities SET centre='$ngn' where city='Nagaon'";
        @$res4 = mysqli_query($a, $q4);
        @$q5="UPDATE cities SET centre='$tez' where city='Tezpur'";
        @$res5 = mysqli_query($a, $q5);
        @$q6="UPDATE cities SET centre='$tin' where city='Tinsukia'";
        @$res6 = mysqli_query($a, $q6);
        @$q7="UPDATE cities SET centre='$dib' where city='Dibrugarh'";
        @$res7 = mysqli_query($a, $q7);
        @$q8="UPDATE cities SET centre='$jor' where city='Jorhat'";
        @$res8 = mysqli_query($a, $q8);
        if($res1 and $res2 and $res3 and $res4 and $res5 and $res6 and $res7 and $res8)
        {
            header("Location:personal.php");
        }
        else{
            echo "Error";
        }
    }
    else
    {
        header("Location:profile.php");
    }
}
?>
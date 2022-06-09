<?php
session_start();
if(isset($_SESSION['id']))
{
    if($_SESSION['type']=='0')
    {
        echo "<br /> Welcome ".$_SESSION['name'];
    }
    else
    {
        echo "<br /><br /><br <center> /><h1> This Page is for Admin only </h1> </center>";
    }
}
else
{
    header("Location:login.php");
}
if(isset($_GET['out']))
{
    session_destroy();
    header("Location:login.php");
}
?>
<br /><br />
<a href="admin.php?out">Logout</a>

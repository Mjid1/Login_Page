<?php
session_start();
if(isset($_SESSION['id']))
{
    if($_SESSION['type']== 0)
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
<div style="position: absolute; left: 450px; top: 150px ; width: 150px;">
    <p style="font-size: 15px;"><a href="addNewUser.php">Add new user</a></p>
    <p style="font-size: 15px;"><a href="AllUsers.php">All users</a></p> 
</div>
<a href="admin.php?out">Logout</a>

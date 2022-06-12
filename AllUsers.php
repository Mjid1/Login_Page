<?php
session_start();
include "DBConn.php";
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
?>
<div style="position: absolute ; left:500px; width:500px; top:150px;"> 
    <table style="width:100%;" border='1'>
        <tr style="text-align: center;">
            <td><strong>Image :</strong></td>
            <td><strong>User ID :</strong></td>  
            <td><strong>User Name :</strong></td> 
            <td></td>
            <td></td>
        </tr>
        <?php
        if(isset($_GET['id']))
        {
            mysqli_query($conn,"DELETE FROM `t_user` WHERE `user_id` = '".$_GET['id']."'");
        }
            $userData=mysqli_query($conn,"select * from t_user Where type=1");
            while($row=mysqli_fetch_array($userData))
            {
                echo "<tr style='text-align: center;'>";
                echo "<td><img src='getImg.php?id=$row[user_id]' width='120' height='150'/></td>";
                echo "<td>".$row['user_id']."</td>";
                echo "<td>".$row['user_name']."</td>";
                echo "<td><a href='allUsers.php?id=$row[user_id]'>Delete</a></td>";
                echo "<td><a href='editUser.php?id=$row[user_id]'>Edit</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
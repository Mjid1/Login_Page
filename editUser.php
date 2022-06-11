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
$userData=mysqli_query($conn,"select * from t_user Where user_id=$_GET[id]");
$userData=mysqli_fetch_assoc($userData);
if(!isset($_POST['save']))
{
    $_POST['name']=$userData['user_name'];
    $_POST['pass']=$userData['user_pass'];
    $_POST['id']=$userData['user_id'];
}
?>
<div style ="position: absolute; left: 400px; width: 500px ; top:150px ; border:solid; padding: 20px;">
<center>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td></td>
                <td colspan="2" style="text-align: center">
                    <img src="Images/Profile.png" width="100" height="100"/>
                </td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td><input type="file" name="img" value=""></td>
            </tr>
            <tr>
                <td>User ID</td>
                <td><input type="text" name="id" value="<?php if(isset($_POST['id'])){echo $_POST['id'];}?>" readonly="" style="background-color: silver;"></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="save" value="Save"></td>
            </tr>
        </table>
    </form> 
    <?php
    if(isset($_POST['save']))
    {
        if(!empty($_POST['name']))
        {
            if(!empty($_POST['pass']))
            {
                $name=$_POST['name'];
                $pass=$_POST['pass'];
                if(!empty($_FILES['img']['tmp_name']))
                {
                    $img=addslashes(file_get_contents($_FILES['img']['tmp_name']));
                }
                mysqli_query($conn,"update t_user set user_name='$name',user_pass='$pass','img'='$img' where user_id=$_GET[id]");
                echo "<br /><br /> <center> <h1> User Data Updated Successfully </h1> </center>";
            }
            else
            {
                echo "<br /><br /><br <center> /><h1> Password is empty </h1> </center>";
            }
        }
        else
        {
            echo "<br /><br /><br <center> /><h1> User name is empty </h1> </center>";
        }
    }
    ?>
</center>  
</div>
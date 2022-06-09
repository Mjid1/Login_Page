<?php
session_start();
$host="localhost";
$user="root";
$pass="";
$db="loginform";
if ($conn=mysqli_connect($host,$user,$pass,$db))
{
    echo"Connected"; 
}
else
{
    echo"Not Connected" . mysqli_error($conn);
}
    
?>
<html>
    <head>
        <title>Login page</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <div style="position: absolute; width: 400px;height:150px;left:500px;top:150px;border:solid; padding:20px;">
            <center>
            <form action="" method="post">
            <table>
                <tr>
                    <td><label>User Id : </label></td>
                    <td><input type="text" name="id" value="" /></td>
                </tr>
                <tr>
                    <td><label>Password : </label></td>
                    <td><input type="password" name="pass" value="" /> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>                                                               
            </form>
            <?php
                if(isset($_POST['login']))
                {
                    if(!empty($_POST['id']))
                    {
                        if(is_numeric($_POST['id']))
                        {
                            if(!empty($_POST['pass']))
                            {
                                $id=$_POST['id'];
                                $pass=$_POST['pass'];
                                $userData=mysqli_query($conn,"select * from t_user where user_id='$id' and user_pass='$pass'");
                                $userData=mysqli_fetch_assoc($userData);
                                if(!empty($userData))
                                {
                                    $_SESSION['type']=$userData['type'];
                                    $_SESSION['id']=$id;
                                    $_SESSION['name']=$userData['user_name'];
                                    
                                    if($_SESSION['type']== 0)
                                    {
                                        header("location:admin.php");
                                    }
                                }
                                else
                                {
                                    echo"<br /> This user is not registered";
                                }
                            }
                            else
                            {
                                echo"<br /> Please enter password";
                            }
                        }
                        else
                        {
                            echo"<br /> Please enter valid id";
                        }
                    }
                    else
                    {
                        echo"<br /> Please enter user id";
                    }
                }
                
            ?>
            
            </center>
        </div>
    </body>
</html>
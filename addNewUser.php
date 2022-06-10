<?php
session_start();
if(isset($_SESSION['id']))
{
    if(!$_SESSION['type']=='0')
    {
        echo "<br /><br /><br <center> /><h1> This Page is for Admin only </h1> </center>";
    }
}
else
{
    header("Location:login.php");
}
include "DBConn.php"; 
?>
<div style ="position: absolute; left: 400px; width: 500px ; top:150px ; border:solid;">
<center>    
<form action="" method="post">
        <table>
            <?php
                $userId=mysqli_query($conn,"show table status from `loginform` like 't_user'");   
                $userId=mysqli_fetch_assoc($userId);
                $userId=$userId['Auto_increment'];       
            ?>
            <tr>
                <td><label>User ID :</label></td>
                <td><input type="text" name="id" value="<?php echo $userId?>" style ="background-color:silver;" readonly></td>    
            </tr>

            <tr>
                <td><label>User name: </label></td>
                <td><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"></td>    
            </tr>

            <tr>
                <td><label>Password: </label></td>
                <td><input type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}?>"></td>    
            </tr>

            <tr>
                <td><label>Confirm Password: </label></td>
                <td><input type="password" name="c_pass" value="<?php if(isset($_POST['c_pass'])){echo $_POST['c_pass'];}?>"></td>    
            </tr>

            <tr colspan="2" style="text-align:center;">
                <td><input type="submit" name="save" value="Save" /></td>
            </tr>

        </table> 
        <?php
        if(isset($_POST['save']))
        {
            if(!empty($_POST['name']))
            {
                if(!empty($_POST['pass']))
                {
                    if($_POST['pass']==$_POST['c_pass'])
                    {
                        $name=$_POST['name'];
                        $pass=$_POST['pass'];
                        if(mysqli_query($conn,"insert into t_user(`user_name`, `user_pass`, `type`) values('$name','$pass','1')"))
                        {
                            echo "<br /> User added successfully";
                        }
                        else
                        {
                            echo "<br /> User not added";
                        }
                    }
                    else
                    {
                        echo "<br /><p> Password and Confirm Password are not same </p>";
                    }
                }
                else
                {
                    echo "<br /><p> Please enter password </p>";
                }
            }
        }
        else
        {
            echo "<br /><p> Please enter user name </p>";
        }
        ?> 
    </form>
    </center>
</div>
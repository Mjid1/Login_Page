<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?php
    session_start();
    include "DBConn.php";
?>
<html>
    <head>
        <title>Login page</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="icon">
            <i class="fa-solid fa-users"></i>
        </div>
            <div class="center">   
    <form action="" method="post">
        <div class ="txt_field">
            <input type="text" name="id" value="" required>
            <span></span>
            <label>Username</label>
        </div>

        <div class ="txt_field">
            <input name ="pass" type="password" required>
            <span></span>
            <label>Password</label>
        </div>
        
            <div class="pass" name="pass" value="">Forgot Password?</div>
            <input type="submit" name="login" value="Login">
            <div class="signup_link">
                Not a member? <a href="#">SignUp</a>
            </div>
        </div>
    </form>
</div>
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
                                $userData=mysqli_query($conn,"select `user_id`, `user_name`, `user_pass`, `type` from t_user where user_id='$id' and user_pass='$pass'");
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
    </body>
</html>
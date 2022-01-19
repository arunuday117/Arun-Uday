<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
        $flag=0;
        if(empty($name)){
            $msg['name']="*Name is required";
            $flag=1;
        }
        if(empty($email)){
            $msg['email']="*Email ID is required";
            $flag=1;
        }
        if(empty($phone)){
            $msg['phone']="*Phone No is required";
            $flag=1;
        }
        if(empty($pass)){
            $msg['pass']="*Pass is required";
            $flag=1;
        }
        if(empty($cpass)){
            $msg['cpass']="*Confirm password is required";
            $flag=1;
        }
        if($flag==0){
            if(!preg_match('/^[a-zA-Z ]*$/',$name)){
                $msg['name']="*Invalid name";
                $flag=1;
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg['email']="*Invalid Email ID";
                $flag=1;
            }
            if(!preg_match("/^[6-9]\d{9}$/", $phone)){
                $msg['phone']="*Invalid Phone Number";
                $flag=1;
            }
            if(!preg_match("/^[A-Z\d]/",$pass)||!preg_match('/[^\w]/', $pass)||strlen($pass)<8){
                $msg['pass']="*Password should be at least 8 characters in length and should include at least one uppercase letter, one number and one special character";
                $flag=1;
            }
            if($pass!=$cpass){
                $msg['cpass']="*Passwords doesn't match";
            }
            if($flag==0){
                echo"<script>alert('Registration Successful');</script>";
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            border-radius: 10px;
            padding: 30px;
            margin: 20px;
            border:1px solid black;
        }
        input{
            width:200px;
        }
        label{
            display: inline-block;
            width:300px;
        }
        div{
            padding:10px;
        }
        span{
            color:red;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div>
            <label>Name</label><input type="text" name="name" value="<?php if(isset($name))echo$name;?>">
            <?php if(isset($msg['name'])){?><span><?php echo$msg['name'];?></span><?php }?>
        </div>
        <div>
            <label>Email ID</label> <input type="text" name="email" value="<?php if(isset($email))echo$email;?>">
            <?php if(isset($msg['email'])){?><span><?php echo$msg['email'];?></span><?php }?>
        </div>
        <div>
            <label>Phone No</label> <input type="tel" name="phone" value="<?php if(isset($phone))echo$phone;?>">
            <?php if(isset($msg['phone'])){?><span><?php echo$msg['phone'];?></span><?php }?>
        </div>
        <div>
            <label>Password</label> <input type="password" name="pass">
            <?php if(isset($msg['pass'])){?><span><?php echo$msg['pass'];?></span><?php }?>
        </div>
        <div>
            <label>Confirm Password</label> <input type="password" name="cpass">
            <?php if(isset($msg['cpass'])){?><span><?php echo$msg['cpass'];?></span><?php }?>
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
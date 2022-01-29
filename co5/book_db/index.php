<?php
    $con=mysqli_connect("localhost","root","","book_db");
    if(mysqli_connect_errno()){
        printf("Connection failed : ",mysqli_connect_error());
    }
    else{
        $msg['con']="Database Connection Successfull";
        if(isset($_POST['submit'])){
            $no=$_POST['no'];
            $title=$_POST['title'];
            $auth=$_POST['auth'];
            $edition=$_POST['edition'];
            $flag=0;
            if(empty($no)){
                $msg['no']="*Accession number is required";
                $flag=1;
            }
            if(empty($title)){
                $msg['title']="*Title is required";
                $flag=1;
            }
            if(empty($auth)){
                $msg['auth']="*Author name is required";
                $flag=1;
            }
            if(empty($edition)){
                $msg['edition']="*Edition is required";
                $flag=1;
            }
            if($flag==0){
                if(!preg_match('/^[0-9]*$/',$no)){
                    $msg['no']="*Invalid Accession number";
                    $flag=1;
                }
                if($flag==0){
                    $query=mysqli_query($con,"INSERT INTO book_table VALUES('$no','$title','$auth','$edition')");
                    if($query){
                        $msg['err']="Data Inserted";
                    }
                    else{
                        $msg['err']="Insertion Failed";
                    }
                }
                
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
            flex-direction: column;
            justify-content: space-between;
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
    <h3>REGISTRATION FORM</h3>
    <form action="" method="post">
        <div>
            <label>Accession NO</label><input type="text" name="no" value="<?php if(isset($no))echo$no;?>">
            <?php if(isset($msg['name'])){?><span><?php echo$msg['name'];?></span><?php }?>
        </div>
        <div>
            <label>Title</label> <input type="text" name="title" value="<?php if(isset($title))echo$title;?>">
            <?php if(isset($msg['title'])){?><span><?php echo$msg['title'];?></span><?php }?>
        </div>
        <div>
            <label>Author</label> <input type="text" name="auth" value="<?php if(isset($auth))echo$auth;?>">
            <?php if(isset($msg['auth'])){?><span><?php echo$msg['auth'];?></span><?php }?>
        </div>
        <div>
            <label>Edition</label> <input type="text" name="edition" value="<?php if(isset($edition))echo$edition;?>">
            <?php if(isset($msg['edition'])){?><span><?php echo$msg['edition'];?></span><?php }?>
        </div>
        <input type="submit" value="Submit" name="submit">
        <div>
            <?php if(isset($msg['con'])){?><span><?php echo$msg['con'];?></span><?php }?>
        </div>
        <div>
            <?php if(isset($msg['err'])){?><span><?php echo$msg['err'];?></span><?php }?>
        </div>
    </form>
    <h3>Search Book</h3>
    <form action="" method="post">
        <label>Enter Title</label><input type="text" name="se" id="se">
        <div>
            <input type="submit" value="Search" name="search">
        </div>
    </form>
    <?php 
        if(isset($_POST['search'])){
            ?>
    <table border=1 width="40%">
        <tr>
            <th>Accession No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Edition</th>
        </tr>
        <?php
            $query=mysqli_query($con,"SELECT * FROM book_table WHERE title LIKE '%$_POST[se]%'");
            while($row=mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo$row['no']; ?></td>
                <td><?php echo$row['title']; ?></td>
                <td><?php echo$row['author']; ?></td>
                <td><?php echo$row['edition']; ?></td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
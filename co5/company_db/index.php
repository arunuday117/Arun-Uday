<?php
    $con=mysqli_connect("localhost","root","","employee_db");
    if(mysqli_connect_errno()){
        printf("Connection failed : ",mysqli_connect_error());
    }
    else{
        $msg['con']="Database Connection Successfull";
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $name=$_POST['name'];
            $jname=$_POST['jname'];
            $mid=$_POST['mid'];
            $salary=$_POST['salary'];
            $flag=0;
            if(empty($id)){
                $msg['id']="*Employee ID is required";
                $flag=1;
            }
            if(empty($name)){
                $msg['name']="*Employee Name is required";
                $flag=1;
            }
            if(empty($jname)){
                $msg['jname']="*Job Name is required";
                $flag=1;
            }
            if(empty($mid)){
                $msg['mid']="*Manager ID is required";
                $flag=1;
            }
            if(empty($salary)){
                $msg['salary']="*Salary is required";
                $flag=1;
            }
            if($flag==0){
                if(!preg_match('/^[0-9]*$/',$id)){
                    $msg['id']="*Invalid ID";
                    $flag=1;
                }
                if(!preg_match('/^[a-zA-Z ]*$/',$name)){
                    $msg['name']="*Invalid Employee Name";
                    $flag=1;
                }
                if(!preg_match('/^[a-zA-Z ]*$/',$jname)){
                    $msg['jname']="*Invalid Job Name";
                    $flag=1;
                }
                if(!preg_match('/^[0-9]*$/',$mid)){
                    $msg['mid']="*Invalid Manager ID";
                    $flag=1;
                }
                if(!preg_match('/^[0-9]*$/',$salary)){
                    $msg['$salary']="*Invalid Salary";
                    $flag=1;
                }
                if($flag==0){
                    $query=mysqli_query($con,"INSERT INTO emp_table VALUES('$id','$name','$jname','$mid','$salary')");
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
    <title>Details Form</title>
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
    <h3>EMPLOYEE DETAILS FORM</h3>
    <form action="" method="post">
        <div>
            <label>Employee ID</label><input type="number" name="id" value="<?php if(isset($id))echo$id;?>">
            <?php if(isset($msg['id'])){?><span><?php echo$msg['id'];?></span><?php }?>
        </div>
        <div>
            <label>Employee Name</label> <input type="text" name="name" value="<?php if(isset($name))echo$name;?>">
            <?php if(isset($msg['name'])){?><span><?php echo$msg['name'];?></span><?php }?>
        </div>
        <div>
            <label>Job Name</label> <input type="text" name="jname" value="<?php if(isset($jname))echo$jname;?>">
            <?php if(isset($msg['jname'])){?><span><?php echo$msg['jname'];?></span><?php }?>
        </div>
        <div>
            <label>Manager ID</label> <input type="number" name="mid" value="<?php if(isset($mid))echo$mid;?>">
            <?php if(isset($msg['mid'])){?><span><?php echo$msg['mid'];?></span><?php }?>
        </div>
        <div>
            <label>Salary</label> <input type="number" name="salary" value="<?php if(isset($salary))echo$salary;?>">
            <?php if(isset($msg['salary'])){?><span><?php echo$msg['salary'];?></span><?php }?>
        </div>
        <input type="submit" value="Submit" name="submit">
        <div>
            <?php if(isset($msg['con'])){?><span><?php echo$msg['con'];?></span><?php }?>
        </div>
        <div>
            <?php if(isset($msg['err'])){?><span><?php echo$msg['err'];?></span><?php }?>
        </div>
    </form>
    <h3>Employees</h3>
    <table border=1 width="40%">
        <tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Job Name</th>
            <th>Manager ID</th>
            <th>Salary</th>
        </tr>
        <?php
            $query=mysqli_query($con,"SELECT * FROM emp_table");
            while($row=mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo$row['emp_id']; ?></td>
                <td><?php echo$row['emp_name']; ?></td>
                <td><?php echo$row['job_name']; ?></td>
                <td><?php echo$row['manager_id']; ?></td>
                <td><?php echo$row['salary']; ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <h3>Employees with salary greater than 35000</h3>
    <table border=1 width="40%">
        <tr>
            <th>Employee Name</th>
            <th>Salary</th>
        </tr>
        <?php
            $query=mysqli_query($con,"SELECT emp_name,salary FROM emp_table WHERE salary>35000");
            while($row=mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo$row['emp_name']; ?></td>
                <td><?php echo$row['salary']; ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
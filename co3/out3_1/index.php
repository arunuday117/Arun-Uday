<?php
    $con = mysqli_connect("localhost","root","","emp_db");
    if(!$con){
        printf("Connection Failed : ",mysqli_connect_error());
    }
    else{
        printf("Connection Successfull");
        $query=mysqli_query($con,"SELECT * FROM emp_table");?>
        <table border="1">
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Job Name</th>
                <th>Manager ID</th>
                <th>Salary</th>
            </tr>
            <?php
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){?>
                    <tr>
                        <td><?php echo$row['id']; ?></td>
                        <td><?php echo$row['emp_name']; ?></td>
                        <td><?php echo$row['job_name']; ?></td>
                        <td><?php echo$row['mid']; ?></td>
                        <td><?php echo$row['salary']; ?></td>
                    </tr>
                    <?php }
                }
                else{?>
                    <tr>
                        <td colspan="2">No Rows Selected</td>
                    </tr>
                </table>
                <?php  
                }
    }
?>
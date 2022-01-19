<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $players=array("Bhuvneshwar Kumar","Hardik Pandya","KL Rahul","Rohit Sharma","Virat Kohli");?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Cricketer name</th>
    </tr>
<?php foreach($players as $key=>$name){?>
    <tr>
        <td><?php echo"$key";?></td>
        <td><?php echo"$name";?></td>
    </tr>
<?php }?>
</table>
</body>
</html>
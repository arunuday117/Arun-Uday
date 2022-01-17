<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill</title>
</head>
<body>
    <form action="" method="POST" >
        Enter the meter number : <input type="number" name="mnum" id=""><br>
        Enter number of unit : <input type="number" name="unit" id=""><br>
        Select the category : <select name="category" id="">
            <option value="rural">Rural</option>
            <option value="residential">Residential</option>
            <option value="commercial">Commercial</option>
        </select><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $mnum=$_POST['mnum'];
        $unit=$_POST['unit'];
        $tariff=$_POST['category'];
        $se=0;
        $rate=0;
        if($tariff=='rural'){
            if($unit>0 && $unit<=50){
                $se=10;
                $rate=($unit*.25)+$se; 
            } 
            else if($unit>50 && $unit<=100){
                $se=10;
                $rate=($unit*.50)+$se; 
            }                     
            else if($unit>100 && $unit<=200){
                $se=10;
                $rate=($unit*1.0)+$se; 
            }
            else if($unit>200 && $unit<=400){
                $se=10;
                $rate=($unit*1.25)+$se; 
            }
            else if($unit>400){
                $se=10;
                $rate=($unit*1.50)+$se; 
            } 
        }
        if($tariff=='residential'){
            if($unit>0 && $unit<=50){
                $se=10;
                $rate=($unit*.50)+$se; 
            } 
            else if($unit>50 && $unit<=100){
                $se=10;
                $rate=($unit*1.0)+$se; 
            }                     
            else if($unit>100 && $unit<=200){
                $se=10;
                $rate=($unit*1.25)+$se; 
            }
            else if($unit>200 && $unit<=400){
                $se=10;
                $rate=($unit*1.50)+$se; 
            }
            else if($unit>400){
                $se=10;
                $rate=($unit*2.0)+$se; 
            } 
        }
        if($tariff=='commercial'){
            if($unit>0 && $unit<=50){
                $se=10;
                $rate=($unit*1.0)+$se; 
            } 
            else if($unit>50 && $unit<=100){
                $se=10;
                $rate=($unit*1.25)+$se; 
            }                     
            else if($unit>100 && $unit<=200){
                $se=10;
                $rate=($unit*1.50)+$se; 
            }
            else if($unit>200 && $unit<=400){
                $se=10;
                $rate=($unit*2.0)+$se; 
            }
            else if($unit>400){
                $se=10;
                $rate=($unit*2.25)+$se; 
            }  
        }
        echo"Meter Number : ".$mnum."<br>";
        echo"Surcharge : ".$se."<br>";
        echo"Tariff category : ".$tariff."<br>";
        echo"Unit : ".$unit."<br>";
        echo"Total charge for (".$unit.") : ".$rate;
    }
?>
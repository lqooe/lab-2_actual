<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <tr><th>МАШИНА</th><th>ДОХОД ЗА ЭТОТ ДЕНЬ</th></tr>
        <?php
        include('connection_to_rent.php');

       
            $selected_date = $_GET["selected_date"];
            $result = "";
           
            $res_ls = "<table ><tr><th>МАШИНА</th><th>ДОХОД ЗА ЭТОТ ДЕНЬ</th></tr>";
            $time= strtotime($selected_date);
            
            try{
                $cursor = $collection_r->find([]);
                
                foreach($cursor as $row) 
                {
                  if (($row["rentStart"]<=$time+86400)&&($row["rentEnd"]>=$time)){
                    $rent_all=$row["rentEnd"]-$row["rentStart"];
                    $rent_all=$rent_all * 1.0;
                    $costPerSec=$row["cost"]/$rent_all;
                  
                    if ($time>=$row["rentStart"]){
                      $startDay=$time;
                    }
                    else{
                      $startDay=$row["rentStart"];
                      
                    }
                    if ($time+86400<=$row["rentEnd"]){
                      $endDay=$time+86400;
                    }else{
                      $endDay=$row["rentEnd"];
                      
                    }
                    $secRentDay = $endDay-$startDay;
                    $moneyPerDay = $secRentDay*$costPerSec;
                    echo "<tr><td>".$row['brand']."</td><td>".$moneyPerDay."</td></tr>";
                    $res_ls .= "<tr><td>".$row['brand']."</td><td>".$moneyPerDay."</td></tr>";
                    
                    }

                }
             
                
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            echo "<script> localStorage.setItem('profit', '$res_ls'); </script>"
        ?>
    </table>
</body>
</html>
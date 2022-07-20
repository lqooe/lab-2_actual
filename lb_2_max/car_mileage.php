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
        <tr>
            <th>НАЗВАНИЕ</th>
            <th>ГОД ВЫПУСКА</th>
            <th>ПРОБЕГ</th>
            <th>СОСТОЯНИЕ</th>
        </tr>
        <?php
       
       include "connection_to_avto.php";  
       $car_mil = "<table ><tr><th>НАЗВАНИЕ</th><th>ГОД ВЫПУСКА</th><th>ПРОБЕГ</th><th>СОСТОЯНИЕ</th></tr>";
       $car_mileage = $_GET['car_mileage'];
            try{
              
               $cursor = $collection_a->find([]);
              
              foreach($cursor as $row)
              {
                $brand_avto = $row['brand'];
                $mileage_avto = $row['mileage'];
                $condition_avto = $row['condition'];
                $yearRelease = $row['yearRelease'];

                if ($row["mileage"] < $car_mileage){

                    echo "<tr><th>$brand_avto</th><th>$mileage_avto</th><th>$condition_avto</th><th>$yearRelease</th></tr>";
                    $car_mil .="<tr><th>$brand_avto</th><th>$mileage_avto</th><th>$condition_avto</th><th>$yearRelease</th></tr>";
                
                }
              }
              
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            echo "<script> localStorage.setItem('car_mileage', '$car_mil'); </script>"
        ?>
    </table>
</body>
</html>
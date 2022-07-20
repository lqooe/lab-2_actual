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
            <th>NAME</th>
        </tr>
        <?php
         include "connection_to_avto.php";  
        $res = "";
        $car_br = "<table ><tr><th>NAME</th></tr>";
            try{
              
               $cursor = $collection_a->find([]);
              
              foreach($cursor as $row)
              {
                $name = $row['brand'];

                $res .= "<tr><th>$name</th></tr>" ;
              }
              $car_br .= $res;
              echo $res;
              
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            echo "<script> localStorage.setItem('car_br', '$car_br'); </script>"
        ?>
    </table>
</body>
</html>
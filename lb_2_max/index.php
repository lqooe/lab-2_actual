<!DOCTYPE HTML>
<html>

<head>
    <title>ЛБ2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<h2>Лабораторная работа №2</h2>

<div class="wrapper">
        <form action="car_brands.php" method="get">
            <a>Получить имеющиеся в данном пункте марки автомобилей:</a>
            <input class="buttons" type="submit" value="Получить" id="car_brands" onmouseover="car_brands_f()"/>
        </form>

        <form action="car_mileage.php" method="get">
        <br>
        <br>
            <a>Получить автомобили с пробегом меньше, чем:</a><br>
            <input name="car_mileage"  type="text" value="0" />
            <input class="buttons" class="btn third" type="submit" value="Получить" id="car_mileage" onmouseover="car_mileage_f()()"/>
        </form>

        <form action="profit.php" method="get">
        <br>
        <br>
            <a>Доход с проката по состоянию на выбранную дату:</a><br>
            <input type=date name="selected_date" >
            <input class="buttons" type="submit" value="Получить" id="profit" onmouseover="profit_f()"/>
        </form>
    </div>
<script>
    function car_brands_f() {
    let value = document.getElementById("car_brands").value;
    
    let result = localStorage.getItem("car_br");
    document.getElementById('res').innerHTML = result;
}
function car_mileage_f(){
    let value = document.getElementById("car_mileage").value;
   
    
    let result = localStorage.getItem('car_mileage');
    document.getElementById('res').innerHTML = result;
}
function profit_f() {
    let value = document.getElementById("profit").value;
   
 
    let result = localStorage.getItem('profit');
    document.getElementById('res').innerHTML = result;
}
</script>
<div id="res"></div>
</body>

</html>
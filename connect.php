<!DOCTYPE html>
<html>
<body>






<?php

require_once 'base.php';

//create connection. First need to instantiate new mysqli class
$conn =  new mysqli("localhost", "root", "", "hotels");

//check if connection is successful
if ($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}
echo "";// het die net niks gemaak nie anders wys dit heeltyd op my form



/*
//create connection
$conn = mysqli_connect("localhost","root","","hotels");

//check connection
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}else{
    echo "Connected successfully";
}

*/
?>


</form>
</body>
</html>
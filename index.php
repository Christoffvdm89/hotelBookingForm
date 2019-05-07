<!DOCTYPE html>
<html>
<head>


</head>
<body>



<?php
// NB mysqli_query & mysqli_error
include_once 'connect.php';

//query to create table
$sql="CREATE TABLE movieslist(
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(64) NOT NULL,
    director VARCHAR(64) NOT NULL,
    year INT(4))";


$conn->query($sql);
echo $conn->error;


?>

<form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<label><input type="text" name="title" placeholder='Title'></label><br>
<label><input type="text" name="director"placeholder='Director'></label><br>
<label><input type="text" name="year" placeholder='Year'></label><br>
<input type="submit">


</form>

<?php

// NB mysqli_query & mysqli_error
if(isset($POST['submit'])){
 $_SESSION['firstname']=$_POST['firstname'];
 $_SESSION['surname']=$_POST['surname'];
 $_SESSION['firstname']=$_POST['firstname'];
 $_SESSION['firstname']=$_POST['firstname'];
 $_SESSION['firstname']=$_POST['firstname'];
 $_SESSION['firstname']=$_POST['firstname'];
 $_SESSION['firstname']=$_POST['firstname'];
 
$datetime1 = new DateTime($_SESSION['indate']);
$datetime2 = new DateTime($_SESSION['outdate']);
$interval = $datetime1->diff($datetime2);//die moeilikste deel , try verstaan.
$daysBooked = $interval-> format('%R%a days');
$value;


//Disaplay bookinf info for user
echo "<br> First Name : " . $_SESSION ['firstname'] . "<br>".
"Surname :" . $_SESSION['surname'] . "<br>" .  





$interval->format('%R%a days');
}

switch ($_SESSION['hotelname']) {
    case "Raddison":
        $value = $daysBooked * 350;
        break;
        case "Mount Nelson":
        $value = $daysBooked * 500;
        break;
        case "Holiday Inn":
        $value = $daysBooked * 100;
        break;
        case "Sun International":
        $value = $daysBooked * 50;
        break;      
    
    default:
        echo "invalid booking";
        break;
}

?>



</body>
</html>
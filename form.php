<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<h1>Book your dream Hotel</h1>
<div class="price">
<p id="inn">Holiday Inn: R 200</p>
<p id="rad">Radison: R 100</p>
<p id="city">City Lodge: R 400</p>
<p id="town">Town Lodge: R 150</p>
</div>

<div id='form'>
<form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<label>First Name<input type="text" name="firstname" placeholder='First Name' required></label><br>
<label>Surname<input type="text" name="surname"placeholder='surname' required></label><br>
<label>Hotel Name
<select name="hotelname" required>
  <option value="Holiday Inn">Holiday Inn</option>
  <option value="Radison">Radison</option>
  <option value="City Lodge">City Lodge</option>
  <option value="Town Lodge">Town Lodge</option>
</select>
</label><br>

<label>In Date<input type="date" name="indate" placeholder='indate' required></label><br>
<label>Out Date<input type="date" name="outdate" placeholder='outdate' required></label><br>
<button class="submit" name="submit" type="submit">Submit</button>


</form>
</div>


<?php
require_once "connect.php";
echo $conn->error;

$sql = "CREATE TABLE IF NOT EXISTS bookings (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(50),
   surname VARCHAR(50),
   hotelname VARCHAR(50),
   indate VARCHAR(30),
   outdate VARCHAR(30),
   booked INT(4))";


$conn ->query($sql);


//echo '<br>'. $_POST['firstname'] .'<br>'. $_POST['lastname'].'<br>'.$_POST['hotelname'].'<br>'.$_POST['indate'].'<br>'. $_POST['outdate'];




if (isset($_POST['submit'])) {
   $_SESSION['firstname']= $_POST['firstname'];
   $_SESSION['surname']= $_POST['surname'];
   $_SESSION['hotelname']= $_POST['hotelname'];
   $_SESSION['indate']= $_POST['indate'];
   $_SESSION['outdate']= $_POST['outdate'];



//echo $_SESSION['firstname'] //."<br>".  $_SESSION['lastname'] ."<br>".  $_SESSION['hotelname'] ."<br>". $_SESSION['indate'] ."<br>". $_SESSION['outdate']."<br>";


//display booking info to user
/*
echo "<br> Firstname:".  $_SESSION['firstname']."<br>".
"surname:".  $_SESSION['surname']."<br>".
"Start Date:". $_SESSION['indate']."<br>".
"End Date:". $_SESSION['outdate']."<br>".
"Hotel Name:". $_SESSION['hotelname']."<br>";
*/

//calculate duration of user's stay at hotel
$datetime1 = new DateTime($_SESSION['indate']);
$datetime2 = new DateTime($_SESSION['outdate']);
$interval = $datetime1->diff($datetime2);

$interval->format('%R%a days');

$daysbooked = $interval->format('%R%a days');
$value;

switch($_POST['hotelname']){
   case 'Holiday Inn':
   $value = $daysbooked * 200;
   break;

   case 'Radison':
   $value = $daysbooked * 100;
   break;

   case 'City Lodge':
   $value = $daysbooked * 400;
   break;

   case 'Town Lodge':
   $value = $daysbooked * 150;
   break;

   default:
   return "ERROR!";
}


echo '<div class="return">'. "<br> Firstname:".  $_SESSION['firstname']."<br>".
"surname:".  $_SESSION['surname']."<br>".
"Start Date:". $_SESSION['indate']."<br>".
"End Date:". $_SESSION['outdate']."<br>".
"Hotel Name:". $_SESSION['hotelname']."<br>".
"Total R" . $value ."<form role='form' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'>
<button name='confirm' type='submit'> Confirm </button></form>".'</div>';

//echo "<form role='form' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . " method='post'><input type='submit' name='confirm'>.'Confirm'.</form>";


// if(isset($_POST['confirm'])){

//    //Preparing and binding a statement

// //prepare is method, this way we only pass the query once and then the values
// $stmt=$conn->prepare("INSERT INTO bookings(firstname,surname,hotelname,indate,outdate) VALUES (?,?,?,?,?)");
// //also part of preparing & binding these values to the questions marks.
// $stmt=bind_param("sssss", $firstname,$surname,$hotelname,$indate,$outdate);
// $firstname=$_SESSION['firstname'];
// $surname=$_SESSION['surname'];
// $hotelname=$_SESSION['hotelname'];
// $indate=$_SESSION['indate'];
// $outdate=$_SESSION['outdate'];
// $stmt->execute();
// echo "Booking confirmed";
// echo $mysqli->query("SELECT * FROM bookings ");
// }

if($_POST['confirm']){
   $firstname =$_SESSION['firstname'];
   $surname =$_SESSION['surname'];
   $hotelname =$_SESSION['hotelname'];
   $indate=$_SESSION['indate'];
   $outdate=$_SESSION['outdate'];
     mysqli_query($conn, "INSERT INTO bookings (firstname, surname, hotelname)
     VALUES ('$firstname ', '$surname','$hotelname','$indate','$outdate')");
}



}
?>





</body>
</html>
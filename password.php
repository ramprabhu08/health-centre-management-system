<?php
session_start();
$db = mysqli_connect("localhost", "root", "password", "medicalcenter");
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{

color:red;

}

</style>
</head>

<body>



<?php

$conn = mysqli_connect('localhost', 'root', 'password', 'medicalcenter');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT username,pass_word FROM Users";
$result= mysqli_query($conn, $sql);

$username=mysqli_real_escape_string($conn, $_POST['username']);
$pass=mysqli_real_escape_string($conn, $_POST['pass']);
$x=0;
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               if($row[username]==$username){
                        if($row[pass_word]==$pass){
                        $x=1;
                     $_SESSION['username']=$username;     
                   Header("location:datacheck.php");
                                        
}}}

if($x==0)
   echo "________________________________________________________________________________________________________________________________________________________________Username or Password Invalid ";
      include('index.php');
      
}
mysqli_close($conn);
?> 

</body>
</html>

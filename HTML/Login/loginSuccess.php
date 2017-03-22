<?php 
ob_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Happytroy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM happytroy where username='".$_POST['username']."' and password='".$_POST['password']."';";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
  session_start();
// Store Session Data
$_SESSION['username']= $_POST['username'];  // Initializing Session with value of PHP Variable
?>
<html><meta http-equiv="refresh" content="0; url=http://localhost:8888/BookMyTravel/HTML/" /></html>
<?php   
} 
else
{
    echo "0 results";
}
$conn->close();

?>

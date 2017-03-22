<?php 
ob_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Happytroy";

session_start(); 
if($_POST['passwordsignup'] != $_POST['passwordsignup_confirm'])
{
    echo "mismatch";
    echo $_SESSION['passwordConfirmMismatch'] = true;
    ?>
    <html>
        <meta http-equiv="refresh" content="0; url=http://localhost:8888/BookMyTravel/HTML/login/login.php#toregister" />
    </html>;
    <?php 
    exit;
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO happytroy (username, password, email) VALUES ('".$_POST['username']."','".$_POST['passwordsignup']."','".$_POST['emailsignup']."')";
if ($conn->query($sql) == TRUE) 
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
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<?php
session_start();
$conn = new mysqli('localhost','bigboiteam', 'Thisisthepassword*111', 'bigboiteam');

//Verify current session ID, if false, re-route to login.php
if (isset($_SESSION['a_id']))
{
  
}
else
{
  header("Location: login.php");
}

$r_Target = $_POST['TargetDevice'];

$temp = $r_Target;

//select most recent recipe addition
$r_NameQuery = $conn->query("SELECT r_Name FROM recipes WHERE r_id=(SELECT max(r_id) FROM recipes)");
$results = $r_NameQuery->fetch_assoc();
$r_Name = $results['r_Name'];

// get MAC address from device
$r_TargetMacAddressQuery = $conn->query("SELECT d_MacAddress FROM registereddevices WHERE d_Name= '$temp'");
$results = $r_TargetMacAddressQuery->fetch_assoc();
$r_TargetMacAddress = $results['d_MacAddress'];


//Insert target device and respective MAC address into recipes

$INSERT = "UPDATE recipes SET r_TargetDevice = ?, r_TargetMACAddress = ? WHERE r_Name = '$r_Name'";


            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ss", $r_Target, $r_TargetMacAddress);
            $stmt->execute();
            
            
    
       
        $stmt->close();
        $conn->close();
        $done = 1;
if ($done)
{
    header("Location: createRecipe4.php");
    exit();
}
?>
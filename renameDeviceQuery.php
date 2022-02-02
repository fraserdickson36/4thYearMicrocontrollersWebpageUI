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

$d_Name = $_POST['OldName'];
$d_NewName = $_POST['NewName'];

$temp = $d_Name;

//Update registered device with new name, then remove the recipes associated with the old device name
$SELECT = "SELECT d_Name FROM registereddevices WHERE d_Name = ? LIMIT 1";
$INSERT = "UPDATE registereddevices SET d_Name = ? WHERE d_Name = '$d_Name'";
$DELETE1 = "DELETE FROM recipes WHERE r_TriggerDevice = '$d_Name'";
$DELETE2 = "DELETE FROM recipes WHERE r_TargetDevice = '$d_Name'";


$stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $temp);
        $stmt->execute();
        $stmt->bind_result($temp);
        $stmt->store_result();

        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum!=0) {
            $stmt->close();
            $stmt = $conn->prepare($DELETE1);            
            $stmt->execute(); 
            $stmt->close();
            $stmt = $conn->prepare($DELETE2);            
            $stmt->execute(); 
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("s", $d_NewName);            
            $stmt->execute(); 

        } else {        
        $retry = 1;
        if ($retry)
        {
            header("Location: noDeviceName.php");
            exit();
        }
        }
        $stmt->close();
        $conn->close();
        $done = 1;
if ($done)
{
    header("Location: devices.php");
    exit();
}
?>
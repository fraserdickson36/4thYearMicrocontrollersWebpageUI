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
$d_Name = $_GET['rn'];

$temp = $d_Name;




//Find if device is currently connected, if so, created entry in unregistered devices
$SELECTALL = $conn->query("SELECT * FROM registereddevices WHERE d_Name = '$temp' LIMIT 1");
while ($row = $SELECTALL-> fetch_assoc())
{
    $mcuType = $row["d_MCUType"];
    $devType = $row["d_DeviceType"];
    $macAdd = $row["d_MacAddress"];
    $connStatus = $row["d_ConnectionStatus"];
}

if ($connStatus == 1)
{
    $INSERT = "INSERT INTO unregistereddevice (un_DeviceType, un_MCUType, un_MACAddress, un_ConnectionStatus) VALUES (?,?,?,?)";

    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssss", $devType,$mcuType,$macAdd,$connStatus);
    $stmt->execute();
    $stmt->close();
}




// remove device from registered devices table, and all associated recipes
$SELECT = "SELECT d_Name FROM registereddevices WHERE d_Name = ? LIMIT 1";
$DELETE = "DELETE FROM registereddevices WHERE d_Name = '$d_Name'";
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
            $stmt = $conn->prepare($DELETE);            
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
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

$un_ID = $_GET['rn'];
$temp = $un_ID;

$conn = new mysqli('localhost','bigboiteam', 'Thisisthepassword*111', 'bigboiteam');

// First remove device entry from unregistered devices, and insert device details into registered devices
$SELECT = "SELECT un_id FROM unregistereddevice WHERE un_id = ? LIMIT 1";
$INSERT = "INSERT INTO registereddevices (d_Name, d_DeviceType, d_MCUType, d_MacAddress, d_ConnectionStatus) values(?,?,?,?,?)";
$REMOVE = "DELETE FROM unregistereddevice WHERE un_id = '$un_ID'";

$stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $temp);
        $stmt->execute();
        $stmt->bind_result($temp);
        $stmt->store_result();

        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum!=0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);

            $getDetailsQuery = $conn->query("SELECT * FROM unregistereddevice WHERE un_id = '$un_ID'");
            while($getDetails = $getDetailsQuery->fetch_assoc())
            {
                $d_DeviceType = $getDetails["un_DeviceType"];
                $d_MCUType = $getDetails["un_MCUType"];
                $d_MacAddress = $getDetails["un_MACAddress"];
                $d_ConnectionStatus = $getDetails["un_ConnectionStatus"];
            }

            $stmt->bind_param("sssss", $d_DeviceType, $d_DeviceType, $d_MCUType, $d_MacAddress, $d_ConnectionStatus);
            $stmt->execute();

            $stmt->close();
            $stmt = $conn->prepare($REMOVE);           
            $stmt->execute();

        } else {        
        $retry = 1;
        if ($retry)
        {
            header("Location: retry.php");
            exit();
        }
        }
        $stmt->close();
        
//insert custom device details into most recent entry of registered devices.
$d_idQuery = $conn->query("SELECT * FROM registereddevices WHERE d_id=(SELECT max(d_id) FROM registereddevices)");
$results = $d_idQuery->fetch_assoc();
$d_id = $results['d_id'];

$d_Name = $_POST['Name'];
$d_Building = $_POST['Building'];
$d_Room = $_POST['Room'];


$SELECT = "SELECT d_id FROM registereddevices WHERE d_id = ? LIMIT 1";
$INSERT = "UPDATE registereddevices SET d_Name = ?, d_Room = ?, d_Building = ? WHERE d_id = '$d_id'";

$stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $d_id);
        $stmt->execute();
        $stmt->bind_result($d_id);
        $stmt->store_result();

        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum!=0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $d_Name, $d_Room, $d_Building);
            $stmt->execute();


        } else {        
        $retry = 1;
        if ($retry)
        {
            header("Location: retry.php");
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
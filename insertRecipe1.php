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

//Get Name and Selected trigger device
$r_Name = $_POST['2'];
$r_TriggerDevice = $_POST['3'];

//Assign Null to all other recipe columns
$r_TriggerPeripheral = 'NULL';
$r_Trigger = 'NULL';
$r_TargetDevice = $_POST['3'];
$r_ActionPeripheral = 'NULL';
$r_Action = 'NULL';

$temp = $r_Name;

$tempDevice = $r_TriggerDevice;

//Find MAC address of selected trigger device
$r_TriggerMacAddressQuery = $conn->query("SELECT d_MacAddress FROM registereddevices WHERE d_Name= '$tempDevice'");
$results = $r_TriggerMacAddressQuery->fetch_assoc();
$r_TriggerMacAddress = $results['d_MacAddress'];


// insert name into recipes, and fill in blanks for the rest of variables
$SELECT = "SELECT r_Name FROM recipes WHERE r_Name = ? LIMIT 1";
$INSERT = "INSERT INTO recipes (r_Name, r_TriggerDevice, r_TriggerMACAddress, r_TriggerPeripheral, r_Trigger, r_TargetDevice, r_TargetMACAddress, r_ActionPeripheral, r_Action) values(?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $temp);
        $stmt->execute();
        $stmt->bind_result($temp);
        $stmt->store_result();

        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssssss", $r_Name, $r_TriggerDevice, $r_TriggerMacAddress, $r_TriggerPeripheral,
            $r_Trigger, $r_TargetDevice, $r_TriggerMacAddress, $r_ActionPeripheral, $r_Action);
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

    header("Location: createRecipe1.php");
    exit();
}

?>
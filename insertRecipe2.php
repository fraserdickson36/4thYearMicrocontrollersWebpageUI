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

//select most recent recipe addition
$r_NameQuery = $conn->query("SELECT r_Name FROM recipes WHERE r_id=(SELECT max(r_id) FROM recipes)");
$results = $r_NameQuery->fetch_assoc();
$r_Name = $results['r_Name'];


$r_TriggerPeripheral = $_POST['TriggerPeripheral'];

// Insert trigger peripheral into recipes
$INSERT = "UPDATE recipes SET r_TriggerPeripheral = ? WHERE r_Name = '$r_Name'";


            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("s", $r_TriggerPeripheral);
            $stmt->execute();
            
            
    
       
        $stmt->close();
        $conn->close();
        $done = 1;
if ($done)
{
    header("Location: createRecipe2.php");
    exit();
}
?>
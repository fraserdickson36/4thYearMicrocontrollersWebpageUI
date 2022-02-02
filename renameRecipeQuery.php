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

$r_OldName = $_POST['OldName'];

$temp = $r_OldName;

$r_NewName = $_POST['NewName'];

// Find Recipe name and Update it with new name
$SELECT = "SELECT r_Name FROM recipes WHERE r_Name = ? LIMIT 1";
$INSERT = "UPDATE recipes SET r_Name = ? WHERE r_Name = '$r_OldName'";


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
            $stmt->bind_param("s", $r_NewName);
            $stmt->execute();            
        } else {        
        $retry = 1;
        if ($retry)
        {
            header("Location: noRecipeName.php");
            exit();
        }
        }
        $stmt->close();
        $conn->close();
        $done = 1;
if ($done)
{
    header("Location: recipes.php");
    exit();
}
?>
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


$r_Name = $_GET['rn'];

//select the chosen recipe name, and remove it from recipes
$SELECT = "SELECT r_Name FROM recipes WHERE r_Name = ? LIMIT 1";
$INSERT = "DELETE FROM recipes WHERE r_Name = '$r_Name'";


$stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $r_Name);
        $stmt->execute();
        $stmt->bind_result($r_Name);
        $stmt->store_result();

        $stmt->fetch();
        $rnum = $stmt->num_rows;
        if ($rnum!=0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            
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
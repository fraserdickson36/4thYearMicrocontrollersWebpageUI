<?php
session_start();
$mysqli = NEW MySQLi('localhost','bigboiteam', 'Thisisthepassword*111', 'bigboiteam');

//Verify current session ID, if false, re-route to login.php
if (isset($_SESSION['a_id']))
{
  
}
else
{
  header("Location: login.php");
}
echo "<table class='table table-dark table-striped'>
        <tr>
            
            <th>Name</th>
            <th>Trigger Device</th>
            <th>Trigger Peripheral</th>
            <th>If this...</th>
            <th>Target Device</th>
            <th>Target Peripheral</th>
            <th>Then this...</th>
            <th>Action</th>
        </tr>";
        //Populate table with all the recipe information queried from the database
        $result = $mysqli->query("SELECT * FROM recipes");
        if ($result-> num_rows > 0)
        {
            while ($row = $result-> fetch_assoc())
            {
                $d_Name =$row["r_Name"];
                echo "<tr><td>".$row["r_Name"]."</td><td>".$row["r_TriggerDevice"]."</td>";

                $descTrigger = $row["r_TriggerPeripheral"];
                $descQuery = $mysqli->query("SELECT * FROM triggerperipherals WHERE tp_Name = '$descTrigger'");
                $descResult = $descQuery-> fetch_assoc();
                echo "<td>".$descResult["tp_Description"]."</td>";
                
                $descTrigger = $row["r_Trigger"];
                $descQuery = $mysqli->query("SELECT * FROM triggers WHERE tr_Name = '$descTrigger'");
                $descResult = $descQuery-> fetch_assoc();
                echo "<td>".$descResult["tr_Description"]."</td><td>".
                $row["r_TargetDevice"]."</td>";

                
                $descTrigger = $row["r_ActionPeripheral"];
                $descQuery = $mysqli->query("SELECT * FROM actionperipherals WHERE ac_Name = '$descTrigger'");
                $descResult = $descQuery-> fetch_assoc();
                echo "<td>".$descResult["ap_Description"]."</td>";

                $descAction = $row["r_Action"];
                $descQuery = $mysqli->query("SELECT * FROM actions WHERE ac_Name = '$descAction'");
                $descResult = $descQuery-> fetch_assoc();
                echo "<td>".$descResult["ac_Description"]."</td>";
                echo"<td>";
                echo"<div class='btn-group'>";
                //create dropdown menu buttons
                echo"<button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Edit</button>";
                echo"<div class='dropdown-menu'>";
                        echo "<a class='dropdown-item' href='deleteRecipeQuery.php?rn=$d_Name'>Delete</a>";
                        echo "<a class='dropdown-item' href='renameRecipe.php?rn=$d_Name'>Rename</a>";
                    echo "</div>";
                    echo"</div></td></tr>";
                
            }
            echo"</table>";
        }
        else 
        {
            echo "0 result";
        }

        $mysqli-> close();

?>
   
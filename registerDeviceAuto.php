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

//find all unregistered devices
$result = $mysqli->query("SELECT * FROM unregistereddevice");

echo "<table  class='table table-dark table-striped'>";
        echo "<tr>";
            
            
            echo"<th>MCU Type</th>";
            echo"<th>Device Type</th>";
            echo"<th>MAC Address</th>";
            echo"<th>Connection Status</th>";
            echo"<th>Action</th></tr>";
            //Populate table with all information queried from the database
            $result = $mysqli->query("SELECT * FROM unregistereddevice");
            if ($result-> num_rows > 0)
            {
                while ($row = $result-> fetch_assoc())
                {
                    $d_ID = $row["un_id"];
                    echo "<tr><td>".
                    
                    $row["un_MCUType"]."</td><td>".
                    $row["un_DeviceType"]."</td><td>".
                    $row["un_MACAddress"]."</td>";
                    if ($row["un_ConnectionStatus"] ==1)
                    {
                      echo"<td>Connected</td>";
                    }
                    else{
                      echo"<td>Disconnected</td>";
                    }
                    echo "<td><a class='btn btn-secondary' href='customiseDevice.php?rn=$d_ID'>Add</a></td></tr>";
                }
                echo"</table>";
            }
            else 
            {
                echo "0 result";
            }
    
            $mysqli-> close();
        

    
    echo "</table>";
    ?>

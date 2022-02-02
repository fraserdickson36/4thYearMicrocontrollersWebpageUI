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

$result = $mysqli->query("SELECT * FROM userdevice");

// echo table to enter information into
echo "<table  class='table table-dark table-striped'>";
        echo "<tr>";
            
            echo"<th>Name</th>";
            echo"<th>MCU Type</th>";
            echo"<th>Device Type</th>";
            echo"<th>MAC Address</th>";
            echo"<th>Room</th>";
            echo"<th>Building</th>";
            echo"<th>Connection Status</th>";
            echo"<th>Action</th></tr>";
    
    // for each registered device, populate the table with respective device properties
    $result = $mysqli->query("SELECT * FROM registereddevices");
        if ($result-> num_rows > 0)
        {
            while ($row = $result-> fetch_assoc())
            {
                $d_Name = $row["d_Name"];
                echo "<tr><td>".
                $d_Name."</td><td>".
                $row["d_MCUType"]."</td><td>".
                $row["d_DeviceType"]."</td><td>".
                $row["d_MacAddress"]."</td><td>".
                $row["d_Room"]."</td><td>".
                $row["d_Building"]."</td>";
                if ($row["d_ConnectionStatus"] ==1)
                {
                  echo"<td>Connected</td>";
                }
                else{
                  echo"<td>Disconnected</td>";
                }
                echo"<td>";
                echo"<div class='btn-group'>";
                
                //create dropdown menu buttons
                echo"<button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Edit</button>";
                echo"<div class='dropdown-menu'>";
                        echo "<a class='dropdown-item' href='removeDeviceQuery.php?rn=$d_Name'>Delete</a>";
                        echo "<a class='dropdown-item' href='renameDevice.php?rn=$d_Name'>Rename</a>";
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

    
    echo "</table>";

?>
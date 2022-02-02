<?php
session_start();

//unset the session ID and destroy current session
unset($_SESSION['a_id']);
unset($_SESSION); 
session_destroy();
//re-route to index
header("Location: index.php");


?>
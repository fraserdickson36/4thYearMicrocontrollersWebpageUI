<?php
session_start();
$con = NEW MySQLi('localhost','bigboiteam', 'Thisisthepassword*111', 'bigboiteam');
$msg = "";


//Password and Username verification
if (isset($_POST['submit'])) {
    
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);

    //Veryify entered Username and Password
    $sql = $con->query("SELECT a_id, a_Password FROM account WHERE a_Username='$username'");
    if ($sql->num_rows > 0) {
        $data = $sql->fetch_array();
        if (password_verify($password, $data['a_Password'])) {
            $_SESSION['a_id'] = $data['a_id'];
            header("Location: index.php");
        } else
            //Retry
            header("Location: retryLogin.php");
    } else
        
        //Retry
        header("Location: retryLogin.php");
}

?>
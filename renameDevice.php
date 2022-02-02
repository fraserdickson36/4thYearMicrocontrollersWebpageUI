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


?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bigBoiTeam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="web_master_css.css" type="text/css">
    <link rel="icon" href="Resources/Favicon.png">

  </head>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<a class="navbar-brand" href="index.php" title="bigBoiTeam"><img src="Resources\FrontLogo.png" style="width:200px;height:40px;" alt = "bigBoiTeam"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="recipes.php" title="My Recipes">My Recipes</a>
		
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="devices.php" title="Manage Devices">Manage Devices</a>
      </li>

    
    <li class="nav-item">
        <a class="nav-link" href="gettingStarted.php" title="Getting Started">Getting Started</a>
      </li>

    
    <li class="nav-item">
        <a class="nav-link" href="api.html" title="API">API</a>
      </li>

    </ul>
	<div class="navbar-nav ml-auto">
  <?php
  //Verify current session ID and if logged in, then button will display, if false, re-route to login.php
    if (isset($_SESSION['a_id']))
    {
      echo "<a href='signoutQuery.php' class='btn btn-outline-light'>Sign Out</a>";

    }
    else
    {
      header("Location: login.php");
    }
  ?>
		
    </div>
  </div>
</nav>


<body>
	<div class = "container padding">
  <button type="submit" class="btn btn-secondary" onclick="window.location.href='devices.php';">Back</button>
  
    &ensp;
    
    <p></p>  

  

    
	</div>
    


<form action = "renameDeviceQuery.php" method = "POST">
    

    <div class="container">
    
        <div class="text-center padding">

        <p></p>
        <h3>CAUTION: Doing so will delete any recipes with that name!</h3>
        <p></p>
        <h5>Device name you want to rename</h5>
        <?php
          $d_Name = $_GET['rn'];
        ?>
        <div class="mb-3">        
            <input type="text" class="form-control col-8 mx-auto" name = "OldName" placeholder="<?php echo "$d_Name" ?>" readonly value="<?php echo "$d_Name" ?>">
        </div>
        <h5>Enter new name</h5>
        <div class="mb-3">        
            <input type="text" class="form-control col-8 mx-auto" name = "NewName" placeholder="Type new name"required>
        </div>

        <div class="mb-3">
            <button class="btn btn-light" type = "submit" >Rename</button>
        </div>


    

        </div>
    
    </div>
</form>

<div class = "container padding"></div>
<div class = "container padding"></div>
<div class = "container padding"></div>
<div class = "container padding"></div>
<div class = "container padding"></div>
<div class = "container padding"></div>

</body>




<footer id="main-footer">
          <div class="container "><a href="index.php">Home</a> | <a href="https://github.com/QuentinPletinckx/4thYearMicrocontrollersWebsite">GitHub</a></div>
          <div class="container">
              <hr>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-6" style="text-align: left;">

              <div class="col-sm-12 col-md-6" style="text-align:left;">
                <div style="font-size: 12px;">&copy;2021 bigBoiTeam. All Rights Reserved.</div>
                <div style="font-size: 12px;">Website Design by Fraser Dickson</div>
              </div>
            </div>
          </div>
		  
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
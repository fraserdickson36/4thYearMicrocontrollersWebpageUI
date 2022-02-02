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
    <script type = "text/javascript" src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




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
  <h1>Getting Started</h1>
  <p></p>
  <p>New to BigBoiTeam (BBT) and our suite of products? Not to worry, this guide will help you get started in not time. </p>
  <p></p>
  <div></div>

  <h4>What is BBT?</h4>
  <p></p>
  <p>We are a company striving to reduces the hurdles of customized home automation by providing you with the best hardware possible. However, to give you the freedom you deserve we developed the best web-application there is out there. Our cutting edge platform allows you to connect all your devices together seamlessly with recipes. 

Recipes are like small programs easy to make that allow your devices to operate together in way that wouldn’t be possible without them. For example, by creating a recipe you are able to have your office light flicker if someone rings the doorbell in case you have your headphones on. </p>
  <p></p>
  
  <h4>Our Available Devices </h4>
  <p></p>
  <p>We currently have 6 different devices compatible with our system. These are explained here: </p>
  <p></p>
  <p><u>Thermometer:</u></p>
  <p></p>
  <p>The thermometer device uses the MSP430G2553 and has 3 action peripherals. There are 4 trigger options that can be set to thermometer which varies from indicating when the temperature drops below 0 °C to when temperature goes above 35 °C. 3 possible action peripherals are Buzzer, RGB LED and regular LED. The user would be able to create a recipe which for example, would light RGB LED to red colour when temperature rises above 15 °C or trigger a buzzer if temperature rises above 35 °C.  </p>
  <p></p>
  <p><u>Doorbell: </u></p>
  <p></p>
  <p>The doorbell device is created by both MSP430G2553 and MSP430FR4133 devices and has 2 different action peripherals. The user could create a simple recipe which would lead in pressing a button to trigger a buzzer or could go with more interactive recipes. For example, pressing a button would start a buzzer but pressing it twice in rapid fashion would also lead in lighting up LED.  </p>
  <p></p>
  <p><u>Bathroom RGB Light:</u></p>
  <p></p>
  <p>Although it is called "Bathroom RGB Light" this device could be used in any room! The device is created for MSP430G2553 board which connects a button and RGB light. The user could create multiple recipes to control the colour of the light in your room with different button presses. </p>
  <p></p>
  <p><u>Smart LED:</u></p>
  <p></p>
  <p>This device allows the user to select from our range of trigger peripherals to control LEDs in his house to have the maximum amount of control for lighting in the house. Created for both boards, this device allows the user to have seamless connection with our devices. If you want to dim the lights in the room when the temperature reaches certain threshold, it is not a problem with this device!  </p>
  <p></p>
  <p><u>Smart button:</u></p>
  <p></p>
  <p>Following the same idea as for "Smart LED", we give our users the ability to connect to any of their devices with smart button. This allows the user to control multiple devices in the house with smart buttons giving freedom to set your devices the way you want it. If that light in your room is too bright for a relaxing evening, now it can be dimmed with a simple push of the button.  </p>
  <p></p>
  <p><u>Wall mounted dial with dimmable LEDs:</u></p>
  <p></p>
  <p>One of the most common smart devices used in smart homes these days. Created for both MSP430FR4133 and MSP430G2553, this device allows the user to be very precise with brightness of a room. By turning the knob, the user can set up to 10 different brightness levels for the lights. </p>
  <p></p>


  <p></p>
 
    <div class="accordion panel-group" id="accordionExample">
    <div class="card card-card">
      <div class="card-header" id="headingFive">
        <h5 class="mb-0">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h4>Connect your Device</h4>
          </button>
        </h5>
      </div>

      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
        <div class="card-body panel-body">
        
            <p></p>
            <p>Before you start making recipes, you first need to connect your bigBoiTeam device(s). This can be done in no time. 

          To connect your device to our online service, all you need to do is enter your WIFI details along with your BBT account credentials. This can be seen below.</p> 
          <p></p>
          <img src="Resources/Getting_Started1.jpg" alt = "ESP Credentials Code" class ="gs">
          <p></p>
          <p>Once that is done, simply power up the device and it will connect to your WIFI and subsequently server automatically. If the credentials are correct and the device is in range of your WIFI, you should be able to see a new device in your list of unregistered devices in the web app as shown below. </p>
            <p></p>
            <img src="Resources/Getting_Started2.jpg" alt = "Manage Devices" class ="gs">
            <p></p>
            <img src="Resources/Getting_Started3.jpg" alt = "Manage Devices" class ="gs">
            <p></p>
          
        </div>
      </div>
    </div>
    <div class="card card-card">
      <div class="card-header" id="headingSix">
        <h5 class="mb-0">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <h4>Register your Device</h4>
          </button>
        </h5>
      </div>

      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
        <div class="card-body panel-body">
        
            <p></p>
            <p>Now that your  devices is available on the web-application and connected to the server, you must register the device. To do that, simply click on 'Add' next to the device you want to add and complete the name of your devices (the device name can be changed later on if needed). </p>
            <p></p>
            <img src="Resources/Getting_Started4.jpg" alt = "Add Device Form" class ="gs">

          
        </div>
      </div>
    </div>
    <div class="card card-card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <h4>Create a Recipe</h4>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body panel-body">
        <p>Now that you have at least one registered device with both an action and a trigger peripheral, you can create your first recipe! Go to the Create a Recipe page and start there. This is a 7 step process </p>
        <p></p>
        <ol>
          <li>Name your recipe: Put in a recognizable name that way you can differentiate your recipes easily. </li>
          <img src="Resources/Getting_Started5.jpg" alt = "New Name" width = "600" class ="gs">
          <p></p>
          <li>Choose your trigger device: This is the device that will activate the action device once the trigger is activated. </li>
          <img src="Resources/Getting_Started6.jpg" alt = "Trigger Device" width = "600" class ="gs">
          <p></p>
          <li>Choose your trigger peripheral: This is the peripheral that will be used as a trigger. </li>
          <img src="Resources/Getting_Started7.jpg" alt = "If This" width = "600" class ="gs">
          <p></p>
          <li>Choose your trigger: This is the type of input to the trigger peripheral that will create the trigger. </li>
          <img src="Resources/Getting_Started8.jpg" alt = "Does This" width = "600" class ="gs">
          <p></p>
          <li>Choose your action device: This is the device that will generate an action once the trigger condition has been met. </li>  
          <img src="Resources/Getting_Started9.jpg" alt = "Target Device" width = "600" class ="gs">
          <p></p>
          <li>Choose your action peripheral: This is the action peripheral that will generate an action once the trigger condition has been met. </li>  
          <img src="Resources/Getting_Started10.jpg" alt = "Then This" width = "600" class ="gs">
          <p></p>
          <li>Choose your action: This is the action that will be generated when the initial trigger condition is met. </li>  
          <img src="Resources/Getting_Started11.jpg" alt = "Does This" width = "600" class ="gs">
          <p></p>        
        </ol>

          
        </div>
      </div>
    </div>
    <div class="card card-card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h4>Delete or Rename a Recipe</h4>
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body panel-body">
        <p>Head to the 'My Recipes' page, here you can rename and delete your Recipes by pressing the edit button next to the Recipe you want to edit.<p>
        <p></p>
        <p><u>Delete Recipe</u></p>
        <ol>
          <li>Click the 'Edit' button.</li>
          <li>Press 'Delete' from the dropdown.</li>
          <img src="Resources/Getting_Started12.jpg" alt = "Delete Recipe" width = "600" class ="gs">           
        </ol>
        <p></p>
        <p><u>Rename Recipe</u></p>
        <ol>
          <li>Click the 'Edit' button.</li>
          <li>Press 'Rename' from the dropdown.</li>
          <img src="Resources/Getting_Started13.jpg" alt = "Rename Recipe" width = "600" class ="gs">
          <p></p>
          <li>Type the new name of the recipe in the text box, and press 'Rename'.</li>       
          <img src="Resources/Getting_Started14.jpg" alt = "New Name" width = "600" class ="gs">
        </ol>

      </div>
    </div>
  </div>
    <div class="card card-card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h4>Delete or Rename a Device</h4>
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body panel-body">
        <p>Head to the 'Manage Devices' page, here you can rename and delete your Devices by pressing the edit button next to the Device you want to edit.<p>
        <p></p>
        <p><u>Delete Device</u></p>
        <ol>
          <li>Click the 'Edit' button.</li>
          <li>Press 'Delete' from the dropdown.</li> 
          <img src="Resources/Getting_Started15.jpg" alt = "Delete Device" width = "600" class ="gs">      
        </ol>
        <p></p>
        <p><u>Rename Device</u></p>
        <ol>
          <li>Click the 'Edit' button.</li>
          <li>Press 'Rename' from the dropdown.</li>
          <img src="Resources/Getting_Started16.jpg" alt = "Rename Device" width = "600" class ="gs"> 
          <p></p>
          <li>Type the new name of the device in the text box, and press 'Rename'.</li>       
          <img src="Resources/Getting_Started17.jpg" alt = "New Name" width = "600" class ="gs"> 
        </ol>
        </div>
      </div>
    </div>
        
  </div>
  </div>
  
   



    


    
</div>
	


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
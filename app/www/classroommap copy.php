<?php

// Entry point for the app
require_once __DIR__ . "/../bootstrap.php";

// Get the URL requested and parse it
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = !empty($uri[1]) ? $uri[1] : "";  // get the controller name
$method = !empty($uri[2]) ? $uri[2] : "";      // get the method name
parse_str($_SERVER['QUERY_STRING'], $params);  // get any parameters

// Run the controller's method and output the response
if($controller !== "" && $method !== "") {
  ControllerLoader::Run($controller, $method, $params);
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Classroom Map</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="classroomstyle.css" rel="stylesheet">
<link href="headerstyle.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="classroomscript.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body onLoad="preLoad()">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:aquamarine">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
          <a class="nav-link disabled">Disabled</a>
        </div>
      </div>
    </div>
  </nav>
  <div>
    <!-- <div class="tab-content">
      <div class="tab-pane active" id="groundfloor"> -->
        
        <img id="a" src="/images/8-1-Overall.png" alt="Avatar woman" class ="img-fluid"> 
      <!-- </div>
      <div class="tab-pane" id="classfloor">
        <img src="/images/line.jpg" alt="Avatar woman" class ="img-fluid"> 
      </div> -->
    
  </div>
  <!-- <div class="container"> -->
    <br>
    <div class ="row no-gutters">
      <div class="col-md-7 no-gutters">
        <div class="leftside">
          <div class = "row row-col-4 no-gutters">
            <div class="col no-gutters">
              Classroom ID
            </div> 
            <div class="col no-gutters">
              Building number
            </div> 
            <div class="col no-gutters">
              teacher  
            </div>  
            <div class="col no-gutters">
              time
            </div> 
          </div>
        </div>
      </div>
      <div class="col-md-5 no-gutters">
        <div class="rightside">
        <div class="container">
          <div class = "row row-col-2 no-gutters">
            <div class="btn-group" data-toggle="buttons-radio" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="bldfloor" id="groundfloor" onClick="im('a1');" autocomplete="off" checked>
              <label class="btn btn-outline-primary" for="groundfloor">Ground Floor</label>

              <input type="radio" class="btn-check" name="bldfloor" id="classfloor" onClick="im('a2');" autocomplete="off">
              <label class="btn btn-outline-primary" for="classfloor">Class Floor</label>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</body>

</head>
</html>
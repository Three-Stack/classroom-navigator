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
<title>Classroom Homepage</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="headerstyle.css" rel="stylesheet">
<link href="homepage.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<body onLoad="floorPlans()">
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
   <div class="row no-gutters">
      <div class="col-md-4 no-gutters">
         <div class="leftside">
            <nav>
               <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-link nav-fill active" id="nav-classroom-tab" data-bs-toggle="tab" href="#nav-classroom" role="tab" aria-controls="nav-classroom" aria-selected="true">ClassRoom</a>
                  <a class="nav-link" id="nav-map-tab" data-bs-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map" aria-selected="false">Floor Plan</a>
               </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-classroom" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                  <form action="/Test/getClassInfo?">
                     <div class="form-group row">
                        <label for="class" class="col-sm-4 col-form-label d-flex justify-content-end">Class Number</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                           <input type="text" class="form-control" id="class" aria-describedby="classNumber" >
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="section" class="col-sm-4 col-form-label d-flex justify-content-end">Section Number</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                           <input type="text" class="form-control" id="section" aria-describedby="classNumber" >
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="instuctor" class="col-sm-4 col-form-label d-flex justify-content-end">Instructor</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                        <input type="text" class="form-control " id="instuctor" aria-describedby="classNumber" >
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-11 d-flex justify-content-end">
                           <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane fade" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
                  <div class="dropdown show">
                     <br>
                     <nav>
                        <ul class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                           <!-- <a class="nav-link nav-fill active" id="nav-classroom-tab" data-bs-toggle="tab" href="#nav-classroom" role="tab" aria-controls="nav-classroom" aria-selected="true">ClassRoom</a> -->
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-building" href="#nav-building" role="button" aria-haspopup="true" aria-expanded="false">Building</a>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" data-bs-toggle="tab" href="#nav-Building8" role="tab" aria-controls="nav-Building8" aria-selected="false">Building 8</a>
                                 <a class="dropdown-item" data-bs-toggle="tab" href="#nav-Building9" role="tab" aria-controls="nav-Building9" aria-selected="false">Building 9</a>
                              </div>
                           </li>
                        </ul>
                     </nav>
                     <div class="tab-content" id="nav-building">
                        <div class="tab-pane" id="nav-Building8" role="tabpanel" aria-labelledby="nav-Building8">
                           <div class="text-center">
                              <h1>Building8</h1><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 1</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 2</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 3</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 4</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 5</button></p><br>
                           </div>
                        </div>
                        <div class="tab-pane" id="nav-Building9" role="tabpanel" aria-labelledby="nav-Building9">
                           <div class="text-center">
                              <h1>Building9</h1><br>
                              <p><button type="button" class="btn btn-primary btn-lg" onclick="">Floor 1</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 2</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 3</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 4</button></p><br>
                              <p><button type="button" class="btn btn-primary btn-lg">Floor 5</button></p><br>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>   
         </div>
      </div>
      <div class="col-md-8 no-gutters">
         <div class="rightside">
            <img src="/images/map.png" alt="Map of CPP Quad" class ="img-fluid">          
         </div>
      </div>
   </div>
</body>
</head>
</html>
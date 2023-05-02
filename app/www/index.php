<?php

// Entry point for the app
require_once __DIR__ . "/../bootstrap.php";

set_error_handler(function($errno, $errstr, $errfile, $errline) {
   if (error_reporting() === 0) {
      return false;
   }
   
   throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

// Get the URL requested and parse it
try {
   $uri = parse_url($_SERVER['REQUEST_URI']);
   $path = explode('/', $uri["path"]);

   $controller = !empty($path[1]) ? $path[1] : "";  // get the controller name
   $method = !empty($path[2]) ? $path[2] : "";      // get the method name
   parse_str($uri["query"], $params);  // get any parameters
   
   // Run the controller's method and output the response

   if($controller !== "" && $method !== "") {
      ControllerLoader::Run($controller, $method, $params);
   }
} catch(Exception $e) {
   print_r($e);
   // Invalid request - do nothing
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
<script src="homescript.js"></script>
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
                  <a class="nav-link nav-fill active" id="nav-classroom-tab" data-bs-toggle="tab" href="#nav-classroom" role="tab" onclick="im('bhome')" aria-controls="nav-classroom" aria-selected="true">Classroom</a>
                  <a class="nav-link" id="nav-map-tab" data-bs-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map" aria-selected="false">Building Maps</a>
               </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-classroom" role="tabpanel" aria-labelledby="nav-home-tab">
                  <br>
                  <form action="search.html">
                     <div class="form-group row">
                        <label for="class" class="col-sm-4 col-form-label d-flex justify-content-end">Course ID</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                           <input type="text" class="form-control" id="class" aria-describedby="classNumber" name="class"
                              placeholder="ex. CS 4800"/>
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="class" class="col-sm-4 col-form-label d-flex justify-content-end">Course Name</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                           <input type="text" class="form-control" id="classname" aria-describedby="classNumber" name="classname"
                              placeholder="ex. Software Engineering"/>
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="section" class="col-sm-4 col-form-label d-flex justify-content-end">Section Number</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                           <input type="text" class="form-control" id="section" aria-describedby="classNumber" name="sec"
                              placeholder="ex. 01"/>
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <label for="instuctor" class="col-sm-4 col-form-label d-flex justify-content-end">Instructor</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                        <input type="text" class="form-control " id="instuctor" aria-describedby="classNumber" name="instructor"
                           placeholder="ex. Yu Sun"/>
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
                           <li class="nav-item dropdown text-center">
                              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-building" href="#nav-building" role="button" aria-haspopup="true" aria-expanded="false">Building</a>
                              <div class="dropdown-menu dropdown-menu-center">
                                 <a class="dropdown-item" data-bs-toggle="tab" href="#nav-Building8" role="tab" aria-controls="nav-Building8" aria-selected="false">Building 8</a>
                                 <a class="dropdown-item" data-bs-toggle="tab" href="#nav-Building9" role="tab" aria-controls="nav-Building9" aria-selected="false">Building 9</a>
                              </div>
                           </li>
                        </ul>
                     </nav>
                     <div class="tab-content" id="nav-building">
                        <div class="tab-pane" id="nav-Building8" role="tabpanel" aria-labelledby="nav-Building8">
                           <div class="column md-12 d-flex justify-content-center"><h1>Building 8</h1></div>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b81')">Floor 1</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b82')">Floor 2</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b83')">Floor 3</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b84')">Floor 4</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b85')">Floor 5</button></div>
                        </div>
                        <div class="tab-pane" id="nav-Building9" role="tabpanel" aria-labelledby="nav-Building9">
                           <div class="column md-12 d-flex justify-content-center"><h1>Building 9</h1></div>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b91');">Floor 1</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b92')">Floor 2</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b93')">Floor 3</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b94')">Floor 4</button></div>
                           <br>
                           <div class="column md-12 d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg" onclick="im('b95')">Floor 5</button></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>   
         </div>
      </div>
      <div class="col-md-8 no-gutters">
         <div class="rightside">
            <img id="b" src="/images/MAP_Center.png" alt="Map of CPP Quad" class ="img-fluid">          
         </div>
      </div>
   </div>
</body>
</head>
</html>
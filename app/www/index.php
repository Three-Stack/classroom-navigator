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
   // Invalid request - do nothing
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CPPNavigator</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="headerstyle.css" rel="stylesheet">
<link href="homepage.css" rel="stylesheet">
<body class="body-content" onLoad="floorPlans()">
<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-light" style="background-color:#91e0ff">
    <div class="container-fluid">
      <img src="images/cpp_nav.png" height=40 width=40>
       <a class="navbar-brand" href="index.php"> <span class="bg">CPP</span> Navigator</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
             <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
             <li class="nav-item"><a class="nav-link" href="index.php">Search</a></li>
          </ul>
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
                     <div class="form-group row">
                        <label for="term" class="col-sm-4 col-form-label d-flex justify-content-end">Term</label>
                        <div class="col-sm-7 d-flex justify-content-start">
                        <select class="form-control " id="instuctor" aria-describedby="classNumber" name="term">
                        <option value="spring_2023">Spring 2023</option>
                        <option value="summer_2023">Summer 2023</option>
                        <option value="fall_2023">Fall 2023</option>
                        <option value="winter_2024">Winter 2024</option>
                        <option value="spring_2024">Spring 2024</option>
                        </select>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-11 d-flex justify-content-end">
                           <button type="submit" class="btn btn-primary" >Search</button>
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
                        <div class="container"><br>
                        <div class="btn-group" data-toggle="buttons-radio" role="group" aria-label="Basic radio toggle button group">
                           <div class = "row no-gutters">
                              <div class="column md-12 d-flex justify-content-center"><h1>Building 8</h1></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b8g" onClick="im('b81');" autocomplete="off">
                                 <label class="btn btn-outline-dark" for="b8g">Floor G</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b81" onClick="im('b82');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b81">Floor 1</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b82" onClick="im('b83');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b82">Floor 2</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b83" onClick="im('b84');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b83">Floor 3</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b84" onClick="im('b85');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b84">Floor 4</label></div>
                              </div>
                           </div>
                        </div>
                           
                        </div>
                        <div class="tab-pane" id="nav-Building9" role="tabpanel" aria-labelledby="nav-Building9">
                        <div class="container"><br>
                        <div class="btn-group" data-toggle="buttons-radio" role="group" aria-label="Basic radio toggle button group">
                           <div class = "row no-gutters">
                              <div class="column md-12 d-flex justify-content-center"><h1>Building 9</h1></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b91" onClick="im('b91');" autocomplete="off">
                                 <label class="btn btn-outline-dark" for="b91">Floor 1</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b92" onClick="im('b92');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b92">Floor 2</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b93" onClick="im('b93');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b93">Floor 3</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b94" onClick="im('b94');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b94">Floor 4</label></div>
                              <div class="column md-12 d-flex justify-content-center">
                                 <input type="radio" class="btn-check btn-lg" name="bldfloor" id="b95" onClick="im('b95');" autocomplete="off" >
                                 <label class="btn btn-outline-dark" for="b95">Floor 5</label></div>
                              </div>
                           </div>
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
            <img id="b" src="/images/MAP_Center.png" alt="Map of CPP Quad" class ="img-fluid">          
         </div>
      </div>
   </div>
</body>
</head>
<script src="homescript.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>
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

// Else just load the default html
?>

<!DOCTYPE html>
<html>
<script>
  window.addEventListener('DOMContentLoaded', event => {

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector('#mainNav');
  if (mainNav) {
      new bootstrap.ScrollSpy(document.body, {
          target: '#mainNav',
          offset: 74,
      });
  };

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector('.navbar-toggler');
  const responsiveNavItems = [].slice.call(
      document.querySelectorAll('#navbarResponsive .nav-link')
  );
  responsiveNavItems.map(function (responsiveNavItem) {
      responsiveNavItem.addEventListener('click', () => {
          if (window.getComputedStyle(navbarToggler).display !== 'none') {
              navbarToggler.click();
          }
      });
  });

  });

  function search() {
    $("#result_list").empty();
    var name = $('#name_search').val();
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://ec2-3-143-241-55.us-east-2.compute.amazonaws.com/Test/getClassInfo?class=" + name, false);
    xmlHttp.send(null);
    res = xmlHttp.responseText;
    const obj = JSON.parse(res);
    console.log(obj);
    if(obj != "Invalid class or class not found") {
      $("#result_list").append('<li class="list-group-item">' + name + ": " + obj.name + " | Time: " + obj.time + "</li>");
      $("#result_list").append('<li class="list-group-item">' + "Directions: something" + "</li>");
    }
    else {
      $("#result_list").append('<li class="list-group-item"> ' + 'Class not found' + "</li>");
    }
  }
</script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Classroom Navigator</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 
</head>

<body>
  <h1>Welcome to Classroom Navigator</h1>
  <div>
    <input id="name_search" type="text"></input>
    <button class="btn btn-primary" onclick="search()">Search</button>  
  </div>
  <div>
    <ul class="list-group" id="result_list">
    </ul>
  </div>
</body>

</html>
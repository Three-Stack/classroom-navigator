<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

use Intervention\Image\ImageManager;

class LineTestController extends BaseController {
   public function picker($params){
      $manager = new ImageManager(['driver' => 'imagick']);
      $img = $manager->make(__DIR__.'/../image/'.$params["img"]);
      $hexcolor = $img->pickColor($params["x"], $params["y"], 'hex');
      return $hexcolor;
   }
   public function example($params){
      if(empty($params["img"])) {
         // The "number1" parameter wasn't passed in
         $this->setResponse("img key not passed in"); // Set the controller's response
         return;
     }

     $img = $params["img"]; // Declaring a variable to hold the value now that we know it exists
     if(!is_string($img)) {
         // number1 isn't actually a number...
         $this->setResponse("img must be string");
         return;
     }
     if(!file_exists(__DIR__.'/../image/'.$img)){
         $this->setResponse("file not found");
         return;
     }

     $x = $params["x"]; // Declaring a variable to hold the value now that we know it exists
     if(!is_int($x)) {
         // number1 isn't actually a number...
         $this->setResponse("x must be int");
         return;
     }
      $y = $params["y"]; // Declaring a variable to hold the value now that we know it exists
      if(!is_int($y)) {
            // number1 isn't actually a number...
            $this->setResponse("y must be int");
            return;
      }
      $col = '#fe0002';
      $compare = $this->picker($params);
      if(strcmp($compare,$col)!=0){
         $this->setResponse("The Color at x=".$x." and y=".$y." is not ".$col);
      }
      else{
         $this->setResponse("The Color at x=".$x." and y=".$y." is ".$col);
      }

   }
   
   public function drawLines($params){
      $manager = new ImageManager(['driver' => 'imagick']);
      $number = $params["classroom_nbr"];
      $build = $params["building"];
      $floor = $params["floor"];
      $map = '/../www/images/8-1-Overall.png';

      
      $map = "/../www/images/{$build}-{$floor}-Overall.png";
      if(file_exists(__DIR__."/../www/loadMap/loadMap_{$build}_{$floor}_{$number}.png"))
      {
         return "/../www/loadmap/loadMap_{$build}_{$floor}_{$number}.png";
      }

      //load the base map
      //load the base map
      $img = $manager->make(__DIR__.$map);

      //write the lines 
      $img->line($params["x1"], $params["y1"], $params["x2"], $params["y2"], function($draw) {
         $draw->color('#f00');
         $draw->width(5);
      });
      $img->line($params["x3"], $params["y3"], $params["x4"], $params["y4"], function($draw) {
         $draw->color('#f00');
         $draw->width(5);
      });
      $img->line($params["x5"], $params["y5"], $params["x6"], $params["y6"], function($draw) {
         $draw->color('#f00');
         $draw->width(5);
      });
      $img->line($params["x6"], $params["y6"], $params["x7"], $params["y7"], function($draw) {
         $draw->color('#f00');
         $draw->width(5);
      });
      if($params['x8'] != NUll)
      {
         $img->line($params["x7"], $params["y7"], $params["x8"], $params["y8"], function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });
      }

      //save to the image that will be loaded
      $img->save(__DIR__."/../www/loadmap/loadMap_{$build}_{$floor}_{$number}.png");

      return("/../www/loadmap/loadMap_{$build}_{$floor}_{$number}.png");
   }

   public function drawBottomFloor()
   {
      $manager = new ImageManager(['driver' => 'imagick']);
      $img = $manager->make(__DIR__."/../www/images/8-1-Overall.png");

      $img->line(3178, 2726, 3178, 2030, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });

      $manager = new ImageManager(['driver' => 'imagick']);
      $img = $manager->make(__DIR__."/../www/images/8-1-Overall.png");

      $img->line(3178, 2030, 3127, 2030, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });

      $manager = new ImageManager(['driver' => 'imagick']);
      $img = $manager->make(__DIR__."/../www/images/8-1-Overall.png");

      $img->line(3127, 2030, 3170, 1984, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });
      
      $img->line(3127, 2030, 3170, 2076, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });

      $img->save(__DIR__."/../www/loadmap/loadMap_8_bottomFloor.png");

      $img = $manager->make(__DIR__."/../www/images/9-1-Overall.png");

      $img->line(283, 396, 283, 667, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });

      $img->line(283, 667, 682, 667, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });
      
      $img->line(682, 667, 3170, 2076, function($draw) {
            $draw->color('#f00');
            $draw->width(5);
         });

      $img->save(__DIR__."/../www/loadmap/loadMap_8_bottomFloor.png");

   }
}

<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

use Intervention\Image\ImageManager;

class LineTestController extends BaseController {
   // final public const col = '#f00';
   // public function line($params){
   //    $manager = new ImageManager(['driver' => 'imagick']);
   //    $img = $manager->make(__DIR__.'/../image/'.$params["number1"]);

   //    // draw a red line with 5 pixel width
   //    $img->line($params["x1"], $params["x2"], $params["x3"], $params["x4"], function ($draw) {
   //       $draw->color(col);
   //       $draw->width(5);
   //    });
   //    $img->save(__DIR__.'/../image/line.jpg');
   // }
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
}

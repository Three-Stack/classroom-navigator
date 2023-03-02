<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

use Intervention\Image\ImageManager;

class ImageController extends BaseController {
   public function watermark($params) {

      $manager = new ImageManager(['driver' => 'imagick']);
      // open an image file
      $img = $manager->make(__DIR__.'/../image/'.$params["number1"]);

      // now you are able to resize the instance
      // $img->resize(320, 240);

      // and insert a watermark for example
      $img->insert(__DIR__.'/../image/kellogg.png');

      // finally we save the image as a new file
      $img->save(__DIR__.'/../image/combine.jpg');
   }
   public function line($params){
      $manager = new ImageManager(['driver' => 'imagick']);
      // create empty canvas with background color
      $img = $manager->make(__DIR__.'/../image/'.$params["number1"]);

      // draw a blue line
      $img->line(10, 10, 100, 10, function ($draw) {
         $draw->color('#0000ff');
      });

      // draw a red line with 5 pixel width
      $img->line(10, 10, 195, 195, function ($draw) {
         $draw->color('#f00');
         $draw->width(5);
      });
      $img->save(__DIR__.'/../image/line.jpg');
   }
}

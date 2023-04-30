function floorPlans() {
   bhome= new Image; bhome.src= 'images/map.png'
   b81 = new Image; b81.src = 'floorplans/8-1-0verall.png';  
   b82 = new Image; b82.src = 'floorplans/8-2-0verall.png';
   b83 = new Image; b83.src = 'floorplans/8-3-0verall.png';
   b84 = new Image; b84.src = 'floorplans/8-4-0verall.png';
   b85 = new Image; b85.src = 'floorplans/8-5-0verall.png';
   b91 = new Image; b91.src = 'floorplans/9-1-0verall.png';  
   b92 = new Image; b92.src = 'floorplans/9-2-0verall.png';
   b93 = new Image; b93.src = 'floorplans/9-3-0verall.png';
   b94 = new Image; b94.src = 'floorplans/9-4-0verall.png';
   b95 = new Image; b95.src = 'floorplans/9-5-0verall.png';
 }
 function im(image) {
   document.getElementById(image[0]).src = eval(image + ".src")
 }
 
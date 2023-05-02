function floorPlans() {
   bhome= new Image; bhome.src= 'images/MAP_Center.png'
   b81 = new Image; b81.src = 'images/8-1-Overall.png';  
   b82 = new Image; b82.src = 'images/8-2-Overall.png';
   b83 = new Image; b83.src = 'images/8-3-Overall.png';
   b84 = new Image; b84.src = 'images/8-4-Overall.png';
   b85 = new Image; b85.src = 'images/8-5-Overall.png';
   b91 = new Image; b91.src = 'images/9-1-Overall.png';  
   b92 = new Image; b92.src = 'images/9-2-Overall.png';
   b93 = new Image; b93.src = 'images/9-3-Overall.png';
   b94 = new Image; b94.src = 'images/9-4-Overall.png';
   b95 = new Image; b95.src = 'images/9-5-Overall.png';
 }
 function im(image) {
   document.getElementById(image[0]).src = eval(image + ".src")
 }
 
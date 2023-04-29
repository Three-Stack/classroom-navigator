function floorPlans() {
   bhome= new Image; bhome.src= 'images/map.png'
   b81 = new Image; b81.src = 'floorplans/0008.00G.20170315.pdf';  
   b82 = new Image; b82.src = 'floorplans/0008.001.20190201.pdf';
   b83 = new Image; b83.src = 'floorplans/0008.002.20181031.pdf';
   b84 = new Image; b84.src = 'floorplans/0008.003.20120301.pdf';
   b85 = new Image; b85.src = 'floorplans/0008.004.20180322.pdf';
   b91 = new Image; b91.src = 'floorplans/0009.001.20180131.pdf';  
   b92 = new Image; b92.src = 'floorplans/0009.002.20160204.pdf';
   b93 = new Image; b93.src = 'floorplans/0009.003.20101124.pdf';
   b94 = new Image; b94.src = 'floorplans/0009.004.20110201.pdf';
   b95 = new Image; b95.src = 'floorplans/0009.005.20180322.pdf';
 }
 function im(image) {
   document.getElementById(image[0]).src = eval(image + ".src")
 }
 
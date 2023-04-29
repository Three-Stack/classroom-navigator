function preLoad() {
  a1 = new Image; a1.src = 'floorplans/0008.00G.20170315.pdf';  
  a2 = new Image; a2.src = 'images/map.png';
}
function im(image) {
  document.getElementById(image[0]).src = eval(image + ".src")
}

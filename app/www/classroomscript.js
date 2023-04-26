function preLoad() {
  a1 = new Image; a1.src = 'images/test.png';  
  a2 = new Image; a2.src = 'images/map.png';
}
function im(image) {
  document.getElementById(image[0]).src = eval(image + ".src")
}

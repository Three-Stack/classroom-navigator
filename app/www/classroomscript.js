function preLoad() {
  a1 = new Image; a1.src = 'images/test.png';  
  a2 = new Image; a2.src = 'images/map.png';
}
function im(image) {
  document.getElementById(image[0]).src = eval(image + ".src")
}


const output = document.querySelector('.output');
const leftside = document.createElement('div');
leftside.className="leftside";
output.append(leftside);
const url = '/Search/getRoomInfo' + window.location.search;
var i=1;
window.addEventListener('DOMContentLoaded',()=>{
   loadData();
})
function loadData(){
   fetch(url).then(rep=>rep.json())
   .then((data)=>{
      console.log(data);
      addtoPage(data);
   })
}
function addtoPage(arr){
  arr.forEach((el)=>{
    const row=document.createElement('div');
    row.className="row row-col-4 no-gutters";
    const col1 = document.createElement('div');
    col1.className="col no-gutters";
    col1.textContent=el.classname;
    row.append(col1);
    const col2 = document.createElement('div');
    col2.className="col no-gutters";
    col2.textContent=el.room_info;
    row.append(col2);
    const col3 = document.createElement('div');
    col3.className="col no-gutters";
    col3.textContent=el.instructor;
    row.append(col3);
    const col4 = document.createElement('div');
    col4.className="col no-gutters";
    col4.textContent=el.time;
    row.append(col4);
    leftside.append(row);
  });
}
function preLoad(data) {
  a1 = new Image; 
  a2 = new Image; 
  a1.src = `images/${data.room_info.building}-1-Overall.png`
  a2.src = `images/loadMap_${data.room_info.building}_${data.room_info.floor}_${data.room_info.classroom_nbr}.png`
}
function im(image) {
  document.getElementById(image[0]).src = eval(image + ".src")
}


const url = '/Search/getRoomInfo' + window.location.search;

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
function addtoPage(data){
  const output = document.querySelector('.output');
  const left = document.createElement('div');
  left.className="leftside"
  output.append(left);
  const row =document.createElement('div');
  row.className="row  no-gutters";
  left.append(row);
  console.log(data.room_info)
  const col1 = document.createElement('div');
  col1.className="col-md-6 no-gutters";
  col1.textContent=data.classname;
  row.append(col1);
  const col2 = document.createElement('div');
  col2.className="col-md-1 no-gutters";
  col2.textContent=data.room_info.building+"-"+data.room_info.classroom_nbr;
  row.append(col2);
  const col3 = document.createElement('div');
  col3.className="col-md-5 no-gutters";
  col3.textContent=data.instructor+"  "+data.time;
  row.append(col3);
  // const col4 = document.createElement('div');
  // col4.className="col-md-3 no-gutters";
  // col4.textContent=data.time;
  // row.append(col4);
  preLoad(data)
  const imgout = document.querySelector('.imgout');
  const img = document.createElement('img');
  img.setAttribute('id',"a");
  img.setAttribute('src',`images/${data.room_info.building}-1-Overall.png`);
  img.setAttribute('class',"img-fluid")
  imgout.append(img);
};
function preLoad(data) {
  a1 = new Image; 
  a2 = new Image; 
  if(data.room_info.floor!=1)
  {  
    a1.src = `loadmap/loadMap_${data.room_info.building}_bottomFloor.png`
  }
  else
  {
    a1.src = `loadmap/loadMap_${data.room_info.building}_${data.room_info.floor}_${data.room_info.classroom_nbr}.png`
  }
  a2.src = `loadmap/loadMap_${data.room_info.building}_${data.room_info.floor}_${data.room_info.classroom_nbr}.png`
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
      if(data==0)
      {
        const goBack = document.querySelector('.imgout');
        const word = document.createElement('p');
        word.setAttribute("style","font-size: 30px; text-align:center");
        word.innerHTML=`<br>No classroom found, please remove check your building and room number.<br>`;
        goBack.append(word) 
        const button = document.createElement('a');
        button.textContent="New Search";
        button.setAttribute("class","btn btn-outline-dark btn-lg btn-block");
        button.setAttribute("href","index.php")
        word.append(button)
        return;
      }
      addtoPage(data);
   })
}
function addtoPage(data){
  const output = document.querySelector('.output');
  const left = document.createElement('div');
  left.className="leftside"
  output.append(left);
  const row =document.createElement('div');
  row.className="row no-gutters";
  left.append(row);
  console.log(data.room_info)
  const col1 = document.createElement('div');
  col1.className="col-md-5 no-gutters";
  col1.textContent=data.classname;
  row.append(col1);
  const col2 = document.createElement('div');
  col2.className="col-md-auto no-gutters";
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
  console.log(data.room_info.floor)
  if(data.room_info.floor!=1)
  {  
    img.setAttribute('src',`loadmap/loadMap_${data.room_info.building}_bottomFloor.png`);
  }
  else
  {
    img.setAttribute('src',`loadmap/loadMap_${data.room_info.building}_${data.room_info.floor}_${data.room_info.classroom_nbr}.png`);
  }
  if(sessionStorage.getItem("color") !=null){
    img.setAttribute('class',`img-shrink img-${sessionStorage.getItem("color")}`)
  }
  else
  {
    img.setAttribute('class',`img-shrink img-dark`)
  }
  imgout.append(img);
  gotoSearch()
};

function gotoSearch(){
  const goBack = document.querySelector('.return');
  const li = document.createElement('li');
  goBack.append(li);
  li.className="nav-item";
  const link = document.createElement('a');
  link.setAttribute("class","nav-link");
  link.setAttribute("style","color:black;")
  if(sessionStorage.getItem("url")==null){
    link.setAttribute("href","index.php");
  }
  else{
    link.setAttribute("href","search.html"+sessionStorage.getItem("url"));
  }
  link.textContent="Return to Search"
  li.append(link);
  
};

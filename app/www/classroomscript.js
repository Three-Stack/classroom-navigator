function preLoad(data) {
  a1 = new Image; 
  a2 = new Image; 
  a1.src = `loadmap/loadMap_${data.room_info.building}_bottomFloor.png`
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
  img.setAttribute('src',`loadmap/loadMap_${data.room_info.building}_bottomFloor.png`);
  if(sessionStorage.getItem("color") !=null){
    img.setAttribute('class',`img-shrink img-${sessionStorage.getItem("color")}`)
  }
  else
  {
    img.setAttribute('class',`img-shrink img-dark`)
  }
  imgout.append(img);
  radioBtn()
};

// function radioBtn(){
//   const radio = document.querySelector('.radioBtn');
//   const row = document.createElement('div');
//   row.className="row row-col-2 no-gutters";
//   radio.append(row);
//   const btngroup = document.createElement('div');
//   btngroup.setAttribute("class","btn-group");
//   btngroup.setAttribute("data-toggle","buttons-radio");
//   btngroup.setAttribute("role","group")
//   btngroup.setAttribute("aria-label","Basic radio toggle button group")
//   row.append(btngroup);
//   const btn1 = document.createElement('input');
//   btn1.setAttribute("type","radio");
//   btn1.setAttribute("class","btn-check");
//   btn1.setAttribute("name","bldfloor");
//   btn1.setAttribute("id","groundfloor");
//   btn1.setAttribute("onClick","im('a1')");
//   btn1.setAttribute("autocomplete","off");
//   btngroup.append(btn1);
//   const btn1label = document.createElement("label");
//   if(sessionStorage.getItem("color")=="red")
//   {  
//     btn1label.setAttribute("class","btn btn-outline-danger");
//   }
//   else if(sessionStorage.getItem("color")=="blue")
//   {  
//     btn1label.setAttribute("class","btn btn-outline-primary");
//   }
//   else if(sessionStorage.getItem("color")=="green")
//   {  
//     btn1label.setAttribute("class","btn btn-outline-success");
//   }
//   else{
//     btn1label.setAttribute("class","btn btn-outline-secondary");
//   }
//   btngroup.append(btn1label);
//   const btn2 = document.createElement('input');
//   btn2.setAttribute("type","radio");
//   btn2.setAttribute("class","btn-check");
//   btn2.setAttribute("name","bldfloor");
//   btn2.setAttribute("id","groundfloor");
//   btn2.setAttribute("onClick","im('a2')");
//   btn2.setAttribute("autocomplete","off");
//   btngroup.append(btn2);
//   console.log(btn2);
//   const btn2label = document.createElement("label");
//   if(sessionStorage.getItem("color")=="red")
//   {  
//     btn2label.setAttribute("class","btn btn-outline-danger");
//   }
//   else if(sessionStorage.getItem("color")=="blue")
//   {  
//     btn2label.setAttribute("class","btn btn-outline-primary");
//   }
//   else if(sessionStorage.getItem("color")=="green")
//   {  
//     btn2label.setAttribute("class","btn btn-outline-success");
//   }
//   else{
//     btn2label.setAttribute("class","btn btn-outline-secondary");
//   }
//   btngroup.append(btn2label)
// }
// /* <div class = "row row-col-2 no-gutters">
//             <div class="btn-group" data-toggle="buttons-radio" role="group" aria-label="Basic radio toggle button group">
//               <input type="radio" class="btn-check" name="bldfloor" id="groundfloor" onClick="im('a1');" autocomplete="off" checked>
//               <label class="btn btn-outline-primary" for="groundfloor">Ground Floor</label>
//               <input type="radio" class="btn-check" name="bldfloor" id="classfloor" onClick="im('a2');" autocomplete="off">
//               <label class="btn btn-outline-primary" for="classfloor">Class Floor</label>
//             </div>
//           </div> */
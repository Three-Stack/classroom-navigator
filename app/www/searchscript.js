const output = document.querySelector('.output');
const container = document.createElement('div');
container.className="container-fluid bg-gradient p-5";
output.append(container);
const row = document.createElement('row')
row.className="row m-auto text-center w-75";
container.append(row);
const url = '/Search/getClassInfo' + window.location.search;
sessionStorage.setItem("url",window.location.search);
var i=1;
var color;
window.addEventListener('DOMContentLoaded',()=>{
   loadData();
})
function loadData(){
   fetch(url).then(rep=>rep.json())
   .then((data)=>{
      // console.log(data);
      addtoPage(data);
   })
}
 
function addtoPage(arr){
   arr.forEach((el)=>{
      //console.log(el);
      const pricingitem = document.createElement('div');
      if (i%3==1){
         pricingitem.className="col-12 princing-item red";
         color="red";
      }
      else if (i%3==2){
         pricingitem.className="col-12 princing-item blue";
         color="blue";
      }
      else if (i%3==0){
         pricingitem.className="col-12 princing-item green";
         color="green";
      }
      const pricingdivider = document.createElement('div');
      pricingdivider.className= "pricing-divider";
      pricingitem.append(pricingdivider);
      const h3=document.createElement('h3')
      h3.className="text-light";
      h3.textContent=el.class_id+"."+el.section;
      pricingdivider.append(h3);
      const h4= document.createElement('h4');
      h4.className="my-0 display-4 text-light font-weight-normal mb-3"
      h4.textContent=el.class_name;
      pricingdivider.append(h4);
      const svg = document.createElementNS('http://www.w3.org/2000/svg','svg');
      svg.setAttribute('class','pricing-divider-img');
      svg.setAttribute('enable-background','new 0 0 300 100');
      svg.setAttribute('height','100px');
      svg.setAttribute('preserveAspectRatio','none');
      svg.setAttribute('version','1.1');
      svg.setAttribute('viewBox','0 0 300 100');
      svg.setAttribute('width','300px');
      svg.setAttribute('x','0px');
      svg.setAttribute('xml:space','preserve');
      svg.setAttribute('xmlns:xlink','http://www.w3.org/1999/xlink');
      svg.setAttribute('xmlns','http://www.w3.org/2000/svg');
      svg.setAttribute('y','0px');
      svg.setAttribute('id','Layer_1');
      pricingdivider.append(svg);
      
      const path1=document.createElementNS('http://www.w3.org/2000/svg','path');
      path1.setAttribute('class','deco-layer deco-layer--1');
      path1.setAttribute('d',
      'M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z');
      path1.setAttribute('fill','#FFFFFF');
      path1.setAttribute('opacity','0.6');
      svg.appendChild(path1);
      const path2=document.createElementNS('http://www.w3.org/2000/svg','path');
      path2.setAttribute('class','deco-layer deco-layer--2');
      path2.setAttribute('d',
      'M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z');
      path2.setAttribute('fill','#FFFFFF');
      path2.setAttribute('opacity','0.6');
      svg.appendChild(path2);
      const path3=document.createElementNS('http://www.w3.org/2000/svg','path');
      path3.setAttribute('class','deco-layer deco-layer--3');
      path3.setAttribute('d',
      'M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716  H42.401L43.415,98.342z');
      path3.setAttribute('fill','#FFFFFF');
      path3.setAttribute('opacity','0.7');
      svg.appendChild(path3);
      const path4=document.createElementNS('http://www.w3.org/2000/svg','path');
      path4.setAttribute('class','deco-layer deco-layer--4');
      path4.setAttribute('d',
      'M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z');
      path4.setAttribute('fill','#FFFFFF');
      svg.appendChild(path4);
      const cardbody=document.createElement('div');
      cardbody.className="card-body bg-white mt-0 shadow";
      pricingitem.append(cardbody);
      const ul=document.createElement('ul')
      ul.className="list-unstyled mb-5 position-relative";
      cardbody.append(ul);
      const li1=document.createElement('li');
      li1.innerHTML=`<b>Instructor: </b> ${el.instructor}`;
      ul.append(li1);
      const li2=document.createElement('li');
      li2.innerHTML=`<b>Location: </b> ${el.location}`;
      ul.append(li2);
      const li3=document.createElement('li');
      li3.innerHTML=`<b>Time: </b> ${el.days} ${el.start_time} - ${el.end_time}`;
      ul.append(li3);
      const li4=document.createElement('li');
      li4.innerHTML=`<b>Mode: </b> ${el.mode}`;
      ul.append(li4);
      const button = document.createElement('button')
      const bld = el.location.split(' ');
      if(el.location =="Online" || !(bld[1]==8 ||bld[1]==9 )){
         button.className=`btn btn-lg btn-block  btn-${color} disabled`;
      }
      else{
         button.className=`btn btn-lg btn-block  btn-${color}`;
      }
      
      button.textContent="Search";
      button.addEventListener("click", function() {
         window.location.href = "classroommap.html?classname="+el.class_id+"."+el.section+": "+el.class_name+"&location="+el.location+"&time="+el.start_time+"-"+el.end_time+"&instructor="+el.instructor;
      });
      button.setAttribute("onClick",`colorPass("${color}");`);
      ul.append(button);
      const space =document.createElement("li");
      space.innerHTML="<br>";
      ul.append(space);
      row.append(pricingitem);
      i++;
   });
}

function colorPass(info)
{
   console.log(info);
   sessionStorage.setItem("color",info);
}
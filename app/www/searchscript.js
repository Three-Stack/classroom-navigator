const output = document.querySelector('.output');
const container = document.createElement('div');
container.className="container-fluid bg-gradient p-5";
output.append(container);
const row = document.createElement('row')
row.className="row m-auto text-center w-75";
container.append(row);
const url = 'data.json';
var i=1;
window.addEventListener('DOMContentLoaded',()=>{
   loadData();
})
function loadData(){
   fetch(url).then(rep=>rep.json())
   .then((data)=>{
       //console.log(data);
       addtoPage(data);
   })
}
 
function addtoPage(arr){
   arr.forEach((el)=>{
      console.log(el);
      const pricingitem = document.createElement('div');
      if (i%3==1){
         pricingitem.className="col-12 princing-item red";
      }
      else if (i%3==2){
         pricingitem.className="col-12 princing-item blue";
      }
      else if (i%3==0){
         pricingitem.className="col-12 princing-item green";
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
      li1.innerHTML=`<br><b>Instructor: </b> ${el.instructor}`;
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
      if(el.location =="Online"){
         button.className="btn btn-lg btn-block  btn-custom disabled";
      }
      else{
         button.className="btn btn-lg btn-block  btn-custom";
      }
      button.textContent="Search";
      ul.append(button);
      const space =document.createElement("li");
      space.innerHTML="<br>";
      ul.append(space);
      row.append(pricingitem);
      console.log(pricingitem)
      i++;
   });
}

// <div class="col-4 princing-item red">
//    <div class="pricing-divider ">
//       <h3 class="text-light">START-UP</h3>
//       <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 120 <span class="h5">/mo</span></h4>
//       <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
//          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
//          c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
//          <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
//          c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
//          <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
//          H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
//          <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
//          c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
//       </svg>
//    </div>
//    <div class="card-body bg-white mt-0 shadow">
   //    <ul class="list-unstyled mb-5 position-relative">
   //       <li><b>10</b> users included</li>
   //       <li><b>2 GB</b> of storage</li>
   //       <li><b>Free </b>Email support</li>
   //       <li><b>Help center access</b></li>
   //    </ul>
   //    <button type="button" class="btn btn-lg btn-block  btn-custom ">Sign up for free</button>
//    </div>
// </div>
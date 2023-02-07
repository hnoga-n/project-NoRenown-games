//console.log('hello');
const radio1 = document.getElementById('radio1')
const radio2 = document.getElementById('radio2')
const radio3 = document.getElementById('radio3')
const radio4 = document.getElementById('radio4')
const first_slide = document.querySelector('#slide-first')
//console.log(first_slide);

let count = 1;
myInterval = setInterval(function(){
  auto_slide_showdown(count);
  count++;
  if(count > 4 ) {
    count = 1;
  }
  //console.log(count);
},5000 )

function auto_slide_showdown(count_slide){
  switch(count_slide){
    case 1: 
      radio1.checked = true
      first_slide.style.marginLeft = '0'
      break;
    case 2: 
      radio2.checked = true
      first_slide.style.marginLeft = '-20.4%'
      break;
    case 3: 
      radio3.checked = true
      first_slide.style.marginLeft = '-40.5%'
      break;
    case 4: 
      radio4.checked = true
      first_slide.style.marginLeft = '-60.8%'
      break;
  }
}


// click to move to next slide
  radio1.addEventListener('click',function(){
    first_slide.style.marginLeft = '0'
    count = 1
    //console.log('checked');
  })
  radio2.addEventListener('click',function(){
    first_slide.style.marginLeft = '-20.4%'
    count = 2
    //console.log('checked');
  })
  radio3.addEventListener('click',function(){
    first_slide.style.marginLeft = '-40.5%'
    count = 3
    //console.log('checked');
  })
  radio4.addEventListener('click',function(){
    first_slide.style.marginLeft = '-60.8%'
    count = 4
    //console.log('checked');
  })
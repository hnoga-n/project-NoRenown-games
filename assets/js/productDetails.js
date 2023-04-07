let getImgPos = 0;
let array = document.querySelectorAll('.visuals-gameplay img');

function antiPropagation(event) {
    event.stopPropagation();
}

//check if img source is undefined , display none it
array.forEach((item)=>{
    if(item.src.split("/")[item.src.split("/").length-1] == 'undefined') {
        item.parentElement.style.display = 'none';
    }
})

// _src : src path of image
// element: image tag
function zoomIn(_src,element) {
    document.querySelector('.box-image-zoom-in img').src = _src;
    document.querySelector('.box-image-zoom-in').style.display='flex';
    //get image position
    array.forEach((item,pos)=>{
        if(item == element) {
            getImgPos = pos;
        } 
        // console.log(item);
    })
}

document.querySelector('.box-image-zoom-in').onclick = ()=> {
    document.querySelector('.box-image-zoom-in').style.display='none';
}

$(document).keydown(function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 37) {
      getImgPos -= 1;
      if(getImgPos < 0)
          getImgPos = 4;
      document.querySelector('.box-image-zoom-in img').src = array[getImgPos].src;
    } else if(evt.keyCode == 39) {
      getImgPos += 1;
      if(getImgPos >= array.length)
          getImgPos = 0;
      document.querySelector('.box-image-zoom-in img').src = array[getImgPos].src;
    }
});

for (let index = 0; index < array.length; index++) {
    //move to the next image in right side
    document.querySelector('.box-image-zoom-in .fa-chevron-right').onclick = ()=> {
        getImgPos += 1;
        if(getImgPos >= array.length)
            getImgPos = 0;
        document.querySelector('.box-image-zoom-in img').src = array[getImgPos].src;
    }
    //move to the next image in left side
    document.querySelector('.box-image-zoom-in .fa-chevron-left').onclick = ()=> {
        getImgPos -= 1;
        if(getImgPos < 0)
            getImgPos = 4;
        document.querySelector('.box-image-zoom-in img').src = array[getImgPos].src;
    }
}


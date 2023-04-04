let selections = document.querySelectorAll(".selection");
let selectionIcons = document.querySelectorAll(".selection i");
let dropdownCategories = document.querySelectorAll(".dropdown-category");
let categoryListItem = document.querySelectorAll(".category-list li");

function antiPropagation(event) {
    event.stopPropagation();
}
if(document.querySelector('#genres') != null) {
    document.querySelector('#genres').addEventListener('click',async () => {
        searchGenres(document.querySelector('#genres').value);
    })
}


//click the input genres search , the dropdown will appear
selectionIcons.forEach((selectionIcon,index) => {
    let item = dropdownCategories[index];
    selectionIcon.addEventListener('click',() => {
        item.classList.add('showDropdownCategory');
        selectionIcon.parentElement.querySelector("input").focus();
    })
    selectionIcon.parentElement.querySelector("input").addEventListener('click',() => {
        item.classList.toggle('showDropdownCategory');
    })
    selectionIcon.parentElement.querySelector("input").addEventListener('input',() => {
        item.classList.add('showDropdownCategory');
    })
});

//click outside the input genres search , the dropdown will disappear
document.querySelector('.search-view').addEventListener('click',()=> {
    dropdownCategories.forEach((dropdownCategory)=> {
        dropdownCategory.classList.remove('showDropdownCategory');
    })
})


//show video when hover
/* let arrItem = document.querySelectorAll('.products-list-filter div');

console.log(document.querySelector('.products-list-filter'));
 */

function showVid(event,params) {
    params.querySelector('video').style.display = 'block';
    params.querySelector('video').play();
    params.querySelector('img').style.display = 'none';
}

function closeVid(event,params) {
    params.querySelector('video').style.display = 'none';
    params.querySelector('img').style.display = 'block';
}

let tmpInputValuePage;
function returnPageValue(input) {
    tmpInputValuePage = Number(input.value);//input value pagination active
}

let tmpCount = 0;
function scrollToPosition(element,length) {
    if(tmpInputValuePage == 1 || tmpInputValuePage == 2) {
            document.querySelector('#showPagination').scrollTo(0,0);
            return;
    } else if(tmpInputValuePage == length || tmpInputValuePage == length - 1 ) {
            document.querySelector('#showPagination').scrollTo(length*50,0);
            return;
    } else if(tmpInputValuePage == length - 2 ) {
            document.querySelector('#showPagination').scrollTo(tmpInputValuePage*45,0);
            return;
    }
    else {
        if(tmpInputValuePage > length / 2) {
            document.querySelector('#showPagination').scrollTo(tmpInputValuePage*40,0);
        } else {
            document.querySelector('#showPagination').scrollTo((tmpInputValuePage-1)*40,0);
        }
        
    }
        
}


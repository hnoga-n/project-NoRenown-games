let selections = document.querySelectorAll(".selection");
let selectionIcons = document.querySelectorAll(".selection i");
let dropdownCategories = document.querySelectorAll(".dropdown-category");
let categoryListItem = document.querySelectorAll(".category-list li");

function antiPropagation(event) {
    event.stopPropagation();
}

document.querySelector('#genres').addEventListener('click',async () => {
    searchGenres(document.querySelector('#genres').value);
})


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







let selections = document.querySelectorAll(".selection");
let selectionIcons = document.querySelectorAll(".selection i");
let dropdownCategories = document.querySelectorAll(".dropdown-category");

function antiPropagation(event) {
    event.stopPropagation();
}

//click the input genres search , the dropdown will appear
selectionIcons.forEach((selectionIcon,index) => {
    let item = dropdownCategories[index];
    selectionIcon.onclick = () => {
        item.classList.add('showDropdownCategory');
        selectionIcon.parentElement.querySelector("input").focus();
    }
    selectionIcon.parentElement.querySelector("input").onclick = () => {
        item.classList.toggle('showDropdownCategory');
    }
});

//click outside the input genres search , the dropdown will disappear
document.querySelector('.search-view').onclick = ()=> {
    dropdownCategories.forEach((dropdownCategory)=> {
        dropdownCategory.classList.remove('showDropdownCategory');
    })
}

​








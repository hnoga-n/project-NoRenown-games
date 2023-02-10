let selections = document.querySelectorAll(".selection");
let selectionIcons = document.querySelectorAll(".selection i");
let dropdownCategories = document.querySelectorAll(".dropdown-category");

// selections.forEach((selection, index) => {
//   let dropdownCategory = dropdownCategories[index];
//   selection.onclick = function () {
//     document
//       .querySelector(".dropdown-category.showDropdownCategory")
//       .classList.remove("showDropdownCategory");
//     dropdownCategory.classList.add("showDropdownCategory");
//   };
// });

// selectionIcons.forEach((selectionIcon,index) => {
//     console.log(index);
//     selectionIcon.addEventListener("click",()=> {

//             document.querySelector('.dropdown-category.showDropdownCategory').classList.remove('showDropdownCategory');

//             document.querySelector('.dropdown-category').classList.add('showDropdownCategory');

//     });

// });

selectionIcons.forEach((selectionIcon,index) => {
    let item = dropdownCategories[index];
    // console.log(selectionIcon);

    selectionIcon.onclick = function () {
        selectionIcon.parentElement.querySelector('.dropdown-category.showDropdownCategory').classList.remove('showDropdownCategory');
        item.classList.add('showDropdownCategory');

    }

    // selectionIcon.addEventListener("click",()=> {
        // dropdownCategories.forEach(dropdownCategory=>{

        //     dropdownCategory.classList.remove('showDropdownCategory');
        //     document.querySelector(".dropdown-category.showDropdownCategory").classList.remove('showDropdownCategory');
        // })
        // console.log()
        
    // });
    // selectionIcon.addEventListener("blur",()=> {
    //     dropdownCategories.forEach(dropdownCategory=>{
    //         dropdownCategory.classList.remove('showDropdownCategory');
    //     })
    // });Z
    
});

selections.forEach((selection,index) => {
    console.log(selection);
    selection.addEventListener("blur",()=> {
        console.log("hello");
        // console.log( document.querySelector('.dropdown-category.showDropdownCategory'));
        // document.querySelector('.dropdown-category.showDropdownCategory').classList.remove('showDropdownCategory');
    });
})


// document.addEventListener("click", ()=> {
//     dropdownCategories.forEach(dropdownCategory=>{

//         dropdownCategory.classList.remove('showDropdownCategory');
//     })
// });
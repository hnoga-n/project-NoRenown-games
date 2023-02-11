let selections = document.querySelectorAll(".selection");
let selectionIcons = document.querySelectorAll(".selection i");
let dropdownCategories = document.querySelectorAll(".dropdown-category");

selectionIcons.forEach((selectionIcon,index) => {
    let item = dropdownCategories[index];

    selectionIcon.onclick = () => {
        item.classList.add('showDropdownCategory');
        selectionIcon.parentElement.querySelector("input").focus();
    }
    
    selectionIcon.parentElement.querySelector("input").onclick = () => {
        item.classList.toggle('showDropdownCategory');
    }

    selectionIcon.parentElement.querySelector("input").onblur = () => {
        //chỗ này for sẽ check mục lục xem có tên loại mục đó không
        // if có thì lúc blur không bị mất chữ 
        // else nhấn chữ lung tung blur thì mất chữ
        let flagItem = 0;

        item.querySelectorAll("li").forEach(itemLi => {

            if (selectionIcon.parentElement.querySelector("input").value.toLowerCase() === itemLi.innerText.toLowerCase()) {
                item.classList.toggle('showDropdownCategory');
                flagItem = 1;
            }

        });

        if(flagItem == 0) {
            item.classList.remove('showDropdownCategory');
            selectionIcon.parentElement.querySelector("input").value = '';
        }
        
    }
    

});


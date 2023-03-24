if(window.location.href.split("/")[window.location.href.split("/").length-1] == 'search.php'){
    document.getElementById('header-search').disabled = false;
    document.getElementById('close').style.display = 'block'
    document.getElementById('header-search').placeholder = 'Minecraft, RPG, multiplayer...'
    document.getElementById('header-search').style.width = '450px'
    document.getElementById('header-search').focus()
    if(window.matchMedia("(max-width: 1100px)").matches) {
        document.getElementById('header-search').style.width = '300px'
        document.querySelector('.search').style.backgroundColor = '#101010'
        document.querySelector('.search').style.zIndex = '1'
    }
    document.getElementById('header-search').style.backgroundImage = 'none'
}
else {
    document.getElementById('header-search').disabled = true;
}  

document.querySelector(".search").addEventListener("click",()=> {
    if(window.location.href.split("/")[window.location.href.split("/").length-1] == 'search.php'){
        return;
    }
    else {
        window.location.href = '/project-NoRenowned-games/view/user/search.php';
    }    
})
if(window.matchMedia("(max-width: 1100px)").matches == true) {
    console.log("hello");
    document.getElementById('header-search').addEventListener('click',function() {
    if(window.location.href.split("/")[window.location.href.split("/").length-1] == 'search.php') {
        document.querySelector('.search').style.backgroundColor = '#101010'
        document.getElementById('header-search').style.width = '300px'
        document.getElementById('header-search').style.backgroundImage = 'none'
        document.getElementById('header-search').placeholder = 'Minecraft, RPG, multiplayer...'
        document.querySelector('.search').style.zIndex = '1'
    }
})
}else {
    document.querySelector('.search').style.backgroundColor = 'transparent'
    document.getElementById('header-search').addEventListener('click',function() {
        if(window.location.href.split("/")[window.location.href.split("/").length-1] == 'search.php') {
            document.getElementById('close').style.display = 'block'
            document.getElementById('header-search').placeholder = 'Minecraft, RPG, multiplayer...'
            document.getElementById('header-search').style.width = '450px'
            document.getElementById('header-search').style.backgroundImage = 'none'
        }
    })
}


document.getElementById('close').addEventListener('click',function () {
    document.getElementById('close').style.display = 'none'
    document.getElementById('header-search').placeholder = ''
    document.getElementById('header-search').style.width = '60px'
    if(window.matchMedia("(max-width: 1100px)").matches) {
        document.getElementById('header-search').style.width = '80px'
        document.querySelector('.search').style.backgroundColor = 'unset'
        document.querySelector('.search').style.zIndex = '-1'
    }
    document.getElementById('header-search').value = ''
    document.getElementById('header-search').style.backgroundImage = 'url(https://www.instant-gaming.com/themes/igv2/images/search.svg)'
})
window.onscroll = function() {
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
        if(window.matchMedia("(max-width: 1100px)").matches) {
            header.classList.remove("sticky");
            document.querySelector('.menu').style.display = 'none'
        }
    }
    else if(window.pageYOffset == 0 && sticky == 0) {
        header.classList.remove("sticky");
        if(window.matchMedia("(max-width: 1100px)").matches) {
            document.querySelector('.menu').style.display = 'flex'
        }
    }
     else {
        header.classList.remove("sticky"); 
    }
};

window.onclick = function(event) {
    const panel = document.getElementById("panel-el")
    if (event.target == panel) {
        panel.style.display = "none";
    }
}


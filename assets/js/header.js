document.getElementById('header-search').addEventListener('click',function() {
    document.getElementById('close').style.display = 'block'
    document.getElementById('header-search').placeholder = 'Minecraft, RPG, multiplayer...'
    document.getElementById('header-search').style.width = '450px'
    document.getElementById('header-search').style.backgroundImage = 'none'
})
document.getElementById('close').addEventListener('click',function () {
    document.getElementById('close').style.display = 'none'
    document.getElementById('header-search').placeholder = ''
    document.getElementById('header-search').style.width = '60px'
    document.getElementById('header-search').value = ''
    document.getElementById('header-search').style.backgroundImage = 'url(https://www.instant-gaming.com/themes/igv2/images/search.svg)'
})

window.onscroll = function() {
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
        
    } else {
        header.classList.remove("sticky");  
    }
};


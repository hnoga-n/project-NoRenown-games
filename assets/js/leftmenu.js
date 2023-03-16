function openSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.classList.add('open')
}
function closeSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.classList.remove('open')
}
active()
function active() {
    let navItems = document.querySelectorAll(".nav-item")
    navItems.forEach(navItem => {
        navItem.addEventListener('click',() => {
            
            navItems.forEach(navItem => {
                navItem.classList.remove('active')
            })
            navItem.classList.add('active')
        })
    })
}

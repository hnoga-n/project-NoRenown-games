document.querySelectorAll(".pageNum").forEach(page => {
    page.addEventListener('click', () => {
        document.querySelectorAll(".pageNum").forEach(page => {
            page.classList.remove('active')
        })
        page.classList.add('active')
    })
}) 


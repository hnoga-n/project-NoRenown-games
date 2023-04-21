document.querySelectorAll(".pageNum").forEach(page => {
    page.addEventListener('click',() => {
        document.querySelectorAll(".pageNum").forEach(page => {
            page.classList.remove('active')
        })
        page.classList.add('active')
    })
}) 

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    
    // toggle the icon
    this.classList.toggle("fa-eye");
});

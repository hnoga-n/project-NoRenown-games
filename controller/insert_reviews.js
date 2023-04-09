
function validateForm() {
    let inputReviews = document.forms["myForm"]["user_reviews"].value;
    if(inputReviews == "") {
        return false;
    }
} 
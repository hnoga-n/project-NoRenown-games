function validateImageFile(file) {
    // Define an array of valid image file extensions
    const validExtensions = ["jpg", "jpeg", "png", "gif"];
  
    // Check if the file is not null and is a valid image file extension
    if (file != null) {
      const extension = file.name.split(".").pop().toLowerCase();
      if (!validExtensions.includes(extension)) {
        alert("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        return false;
      }
    } else {
      alert("Please select a file.");
      return false;
    }
  
    // Use FileReader to read the contents of the file and check if it is a valid image
    const reader = new FileReader();
    reader.onload = function(e) {
      const img = new Image();
      img.onload = function() {
        // Check the image dimensions and file size
        if (this.width <= 0 || this.height <= 0) {
          alert("Invalid image dimensions.");
          return false;
        }
        if (file.size > 1024 * 1024) {
          alert("File size exceeds the maximum allowed limit of 1MB.");
          return false;
        }
      }
      img.onerror = function() {
        alert("Invalid image file.");
        return false;
      }
      img.src = e.target.result;
    }
    reader.readAsDataURL(file);
    return true;
  }
let fileInput ;
let file ;

  function checkFile() {
    return validateImageFile(file);
  }
document.getElementById("avatar").addEventListener("change",()=> {
    fileInput = document.getElementById('avatar')
    file = fileInput.files[0];
    // console.log( file.name);
    // checkFile(file.name)
    
})
function checkCheckBox() {
  const form = document.getElementById("myForm");
  const all_checkbox = form.querySelectorAll("input[type=checkbox]");

  let anyCheckboxChecked = false;

  // Loop through the checkboxes and check if any are checked
  for (const checkbox of all_checkbox) {
    if (checkbox.checked) {
      anyCheckboxChecked = true;
      break; // Exit the loop if at least one checkbox is checked
    }
  }
  alert("Group must have at least 1 authority");
  return anyCheckboxChecked;
}

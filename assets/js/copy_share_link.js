function copy_to_clipboard() {
  // Get the text field
  var copyText = document.getElementById("share_link");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
          
  // Alert the copied text
  alert("Copied to clipboard");
}
function exists(input) {
    var atLeastOneChar = false;
    if (input) {
      for (var i=0; i<input.length; i++) {
        if (input.charAt(i) != " ") {
          atLeastOneChar = true;
          break;
        }
      }
    }
  return atLeastOneChar;
}

function check() {
  return exists(document.getElementById("email").value) && exists(document.getElementById("password").value);
}

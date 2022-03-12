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
  var ok = false;
  if(exists(document.getElementById("email").value) && exists(document.getElementById("password").value))
    ok = true;
  return ok;
}

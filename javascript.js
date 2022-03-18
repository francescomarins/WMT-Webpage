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
  else
    alert("Warning, some information are missing! Fill all fields properly.");
  return ok;
}

function showmore(nation) {
  var el = document.getElementById(nation + "-details");
  if (el.style.display === "none") {
    el.style.display = "block";
  } else {
    el.style.display = "none";
  }
}

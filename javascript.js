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

function show() {
  var reg = document.getElementById("reg-container");
  var login = document.getElementById("login-container");
  var but = document.getElementById("show");
  if (reg.style.display === "none") {
    reg.style.display = "block";
    login.style.display = "none";
    but.innerText = "Log in";
  } else {
    reg.style.display = "none";
    login.style.display = "block";
    but.innerText = "Sign up";
  }
}

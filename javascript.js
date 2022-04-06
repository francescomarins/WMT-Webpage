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

function check_login() {
  var ok = false;
  if(exists(document.getElementById("email").value) && exists(document.getElementById("password").value))
  ok = true;
  else
  alert("Warning, some information are missing!\nMake sure to fill all fields properly.");
  return ok;
}

function check_reg() {
  var ok = false;
  if(exists(document.getElementById("email").value) && exists(document.getElementById("password").value)) {
    if(exists(document.getElementById("country").value))
    ok = true;
  }
  else
    alert("Warning, some information are missing!\nMake sure you fill all fields properly and select the country.");
  return ok;
}

function display_totals() {
  let froms = document.getElementsByClassName("from");
  let from_values = new Array();
  let from_countries = new Array();
  let total = 0;

  for (var i = 0; i < froms.length; i++) {
    var item = froms[i];
    total = total + parseInt(item.innerHTML);
  }

  var limit = (froms.length < 5) ? froms.length : 5;
  for (var i = 0; i < limit; i++) {
    var item = froms[i];
    from_countries[i] = item.getAttribute('name');
    from_values[i] = parseInt(item.innerHTML)*1.0 / total * 100;
  }

  if(froms.length > 5) {
    from_countries[5] = "Others";
    var others_value = 0;
    for (var i = 5; i < froms.length; i++) {
      var item = froms[i];
      others_value = others_value + parseInt(item.innerHTML);
    }
    from_values[5] = others_value*1.0 / total * 100;
  }

  var colours_array = ["90e0ef","48cae4","00b4d8","0096c7","0077b6","023e8a","03045e"];

  var data = [{
    values: from_values,
    labels: from_countries,
    type: 'pie',
    hoverinfo: 'label+percent',
    marker: {
      colors: colours_array
    }
  }];

  var layout = {
    paper_bgcolor: 'rgba(0,0,0,0)',
    plot_bgcolor: 'rgba(0,0,0,0)',
    font: {
      color: 'white'
    },
    hoverlabel: {
      bordercolor: 'white'
    },
    showlegend: false
  }

  Plotly.newPlot('countriespie', data, layout);
}

function display_ranking(country) {
  let fors = document.getElementsByClassName("for");
  let for_values = new Array();
  let for_countries = new Array();
  let total = 0;

  for (var i = 0; i < fors.length; i++) {
    var item = fors[i];
    total = total + parseInt(item.innerHTML);
  }

  var limit = (fors.length < 5) ? fors.length : 5;
  for (var i = 0; i < limit; i++) {
    var item = fors[i];
    for_countries[i] = item.getAttribute('name');
    for_values[i] = parseInt(item.innerHTML)*1.0 / total * 100;
  }

  if(fors.length > 5) {
    for_countries[5] = "Others";
    var others_value = 0;
    for (var i = 5; i < fors.length; i++) {
      var item = fors[i];
      others_value = others_value + parseInt(item.innerHTML);
    }
    for_values[5] = others_value*1.0 / total * 100;
  }

  var colours_array = ["90e0ef","48cae4","00b4d8","0096c7","0077b6","023e8a","03045e"];

  var data = [{
    values: for_values,
    labels: for_countries,
    type: 'pie',
    hoverinfo: 'label+percent',
    marker: {
      colors: colours_array
    }
  }];

  var layout = {
    paper_bgcolor: 'rgba(0,0,0,0)',
    plot_bgcolor: 'rgba(0,0,0,0)',
    font: {
      color: 'white'
    },
    hoverlabel: {
      bordercolor: 'white'
    },
    showlegend: false
  }

  el_name = country + "_pie";
  Plotly.newPlot(el_name, data, layout);
}

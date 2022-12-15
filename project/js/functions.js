function swapFormNext(page) {
  let nextpage = page + 1;
  let window = "form-window-" + page
  let nextwindow = "form-window-" + nextpage
  document.getElementById(window).style["display"] = "none";
  document.getElementById(nextwindow).style["display"] = "block";
}

function swapFormLast(page) {
  let lastpage = page - 1;
  let window = "form-window-" + page
  let lastwindow = "form-window-" + lastpage
  document.getElementById(window).style["display"] = "none";
  document.getElementById(lastwindow).style["display"] = "block";
}


function disablePopUp(){
  document.getElementById("popup-warning").style["display"] = "none";
}

function dissipate(){
  document.getElementById("registretionAlertBox").style.display = "none";
}

function checkAll() {
  let length = document.querySelectorAll('.checkBox').length;
  for (var i = length ; i >= 0; i--) {
    if (document.getElementById(i).checked == false) {
      document.getElementById(i).click();
    }
  }
}

function uncheckAll() {
  let length = document.querySelectorAll('.checkBox').length;
  for (var i = length ; i >= 0; i--) {
    if (document.getElementById(i).checked == true) {
      document.getElementById(i).click();
    }
  }
}

function statisticShowAdmin() {
  let length = document.querySelectorAll('.checkBox').length;
  for (var i = length ; i >= 0; i--) {
    let data = '[data-id="'+i+'"]';
    if (dataLabels[i] === 2) {
      document.querySelector(data).style["display"] = "flex";
      document.getElementById('admin').style["backgroundColor"] = "#4A737D"
      document.getElementById('admin').style["color"] = "#fff"
    } else {
      document.querySelector(data).style["display"] = "none";
      document.getElementById('economy').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('personal').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('economy').style["color"] = "#143943"
      document.getElementById('personal').style["color"] = "#143943"
    }
  }
}

function statisticShowEconomy() {
  let length = document.querySelectorAll('.checkBox').length;
  for (var i = length ; i >= 0; i--) {
    let data = '[data-id="'+i+'"]';
    if (dataLabels[i] === 3) {
      document.querySelector(data).style["display"] = "flex";
      document.getElementById('economy').style["backgroundColor"] = "#4A737D"
      document.getElementById('economy').style["color"] = "#fff"
    } else {
      document.querySelector(data).style["display"] = "none";
      document.getElementById('admin').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('personal').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('admin').style["color"] = "#143943"
      document.getElementById('personal').style["color"] = "#143943"
    }
  }
}

function statisticShowPersonal() {
  let length = document.querySelectorAll('.checkBox').length;
  for (var i = length ; i >= 0; i--) {
    let data = '[data-id="'+i+'"]';
    if (dataLabels[i] === 1) {
      document.querySelector(data).style["display"] = "flex";
      document.getElementById('personal').style["backgroundColor"] = "#4A737D"
      document.getElementById('personal').style["color"] = "#fff"
    } else {
      document.querySelector(data).style["display"] = "none";
      document.getElementById('economy').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('admin').style["backgroundColor"] = "#D7EBEB"
      document.getElementById('economy').style["color"] = "#143943"
      document.getElementById('admin').style["color"] = "#143943"
    }
  }
}

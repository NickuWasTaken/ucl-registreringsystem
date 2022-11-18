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
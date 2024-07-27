document.getElementById("qbutton").onclick = function() {
  var list = document.getElementById("quicklinks");

  // Toggle visibility on button click
  if (list.style.display === "block") {
      list.style.display = "none";
  } else {
      list.style.display = "block";
  }
};

document.getElementById("nbutton").onclick = function() {
  var list = document.getElementById("newsletters");

  // Toggle visibility on button click
  if (list.style.display === "block") {
      list.style.display = "none";
  } else {
      list.style.display = "block";
  }
};

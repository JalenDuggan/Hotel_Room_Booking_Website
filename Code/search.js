function filterFunction(input) {
  var div;
  div = document.getElementsByClassName("hotelDiv");
  if (input == "all")
    input = "";
  for (var i = 0; i < div.length; i++) {
    classRemove(div[i], "show");
    if (div[i].className.indexOf(input) > -1) classAdd(div[i], "show");
  }
}

function classAdd(element, name) {
  var array1, array2;
  array1 = element.className.split(" ");
  array2 = name.split(" ");
  for (var i = 0; i < array2.length; i++) {
    if (array1.indexOf(array2[i]) == -1) {
      element.className = element.className + " " + array2[i];
    }
  }
}

function classRemove(element, name) {
  var array1, array2;
  array1 = element.className.split(" ");
  array2 = name.split(" ");
  for (var i = 0; i < array2.length; i++) {
    while (array1.indexOf(array2[i]) > -1) {
      array1.splice(array1.indexOf(array2[i]), 1);
    }
  }
  element.className = array1.join(" ");
}


function searchFunction() {
  var input, filter, nodes;
  input = document.getElementById("search");
  filter = input.value.toLowerCase();
  nodes = document.getElementsByClassName('hotelDiv');

  for (var i = 0; i < nodes.length; i++) {
    while (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
      break;
    }
    while (!nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "none";
      break;
    }
  }
}
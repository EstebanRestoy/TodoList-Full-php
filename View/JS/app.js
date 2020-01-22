function Error(message) {
  window.alert(message);
}
function CreateToDoItem(Type) {
  var list;
  var text;
  if (Type == "0") {
    list = document.getElementById("ListToDo");
    text = document.getElementById("inputToDo").value;
    console.log(text);
    list.innerHTML +=
      '<li><div class="container"><input type="checkbox" onclick=make()> ' +
      text +
      "</div></li>";
  } else {
    list = document.getElementById("ListDo");
    text = document.getElementById("inputDo").value;
    list.innerHTML += "<li>${text}</li>";
  }
}
f;

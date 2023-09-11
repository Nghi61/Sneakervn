function check() {
    var button = document.getElementById("btn_delete");
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked==false){
            checkboxes[i].checked = true;
            button.hidden=false;
        }
        else{
            button.hidden=true;
            checkboxes[i].checked = false;
        }
      }
  }
  function anhien() {
    var checkboxes = document.getElementsByName("checkboxes[]");
    var button = document.getElementById("btn_delete");
    var checkedCount = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkedCount++;
        }
    }
    if (checkedCount > 0) {
        button.hidden = false;
    } else {
        button.hidden = true;
    }
}

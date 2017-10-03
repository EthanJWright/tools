<?php
include("include/header.php");
?>
  <textarea name="code" id="code">
  </textarea>
</br>
</br>
<center>
  <button name="note" id="note" class="btn btn-primary" onclick="saveNote()">Submit Note</button>
  <button name="clearAll" id="clearAll" class="btn btn-danger" onclick="clearNotes()">Clear All Notes</button>
</center>
</br>
</br>


<script>
function loadNotes(){
  $("#user_notes").html('');
  var notes = localStorage.getItem("notes");
  if(notes){
    notes = notes.split("{break}");
    notes.forEach(function(element){
      if(element !== null){
        $('#user_notes').append('<pre><code><xmp>' + element + '</xmp></code></pre>');
      }
    });
  }
}

function saveNote(note){
  var entered = document.getElementById('code').value;
  document.getElementById('code').value = "";
  var stored = localStorage.getItem("notes");
  if(entered.length > 2){
    if(stored !== null){
      localStorage.setItem("notes", entered + "{break}" + stored);
    }else{
      localStorage.setItem("notes", entered);
    }
  }
  loadNotes();
}

function clearNotes(){
  localStorage.removeItem("notes");
  loadNotes();
}

document.addEventListener('DOMContentLoaded', function() {
  loadNotes();
}, false);

</script>

<div id="user_notes"></div>
<style>

textarea {
  margin-top: 10px;
  margin-left: 50px;
  width: 90%;
  height: 300px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
}


textarea:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    outline-width: 0;
}


</style>


<?php
include("include/footer.php");
?>

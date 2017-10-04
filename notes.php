<?php
include("include/header.php");
?>
  <textarea name="code" id="code">
  </textarea>
</br>
</br>
<center>
  <button name="note" id="note" class="btn btn-primary" onclick="saveNote()">Submit Note</button>
  <button name="clearAll" id="clearAll" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">Clear All Notes</button>
</center>
</br>
</br>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-text">
                Are you sure you want to delete all notes?
            </div>
            <div class="modal-body alert-text">
              This action cannot be reversed.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" onclick="clearNotes()" data-dismiss="modal">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
$('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<style>
.alert-text{
  color: black !important;
}

.note_close{
  background-color: transparent;
  border: none;
  float: right;
  padding-top: 20px;
  outline: none;
}
</style>
<script>
function loadNotes(){
  $("#user_notes").html('');
  var notes = localStorage.getItem("notes");
  if(notes){
    notes = notes.split("{break}");
    var count = 0;
    notes.forEach(function(element){
      if(element !== null){
        $('#user_notes').append('<button onclick="removeNote(' + count + ');" class="material-icons note_close">close</button><pre><code><xmp>' + element + '</xmp></code></pre>');
        count += 1;
      }
    });
  }
}

function removeNote(count){
  var stored = localStorage.getItem("notes");
  if(stored !== null){
    stored = stored.split("{break}");
    stored.splice(count, 1);
    if(stored.length > 0){
      stored = stored.join("{break}");
      localStorage.setItem("notes", stored);
    }else{
      localStorage.removeItem("notes");
    }
    loadNotes();
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

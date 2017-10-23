<?php
include("include/header.php");
?>
	   <p>Enable Vim</p>
<label class="switch">
	  <input id='vim' type="checkbox">
		  <span class="slider round"></span>
</label>
 <textarea name="code" id="code"></textarea>
</br>
</br>
<center>
  <button name="note" id="note" class="btn btn-primary">Submit Note</button>
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
                <a id="clearing" class="btn btn-danger btn-ok" data-dismiss="modal">Delete</a>
            </div>
        </div>
    </div>
</div>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">



<div id="user_notes"></div>
<script src="functions.js"></script>

<link rel="stylesheet" href="note_style.css">
</div>
</body>
</html>


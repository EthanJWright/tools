 <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dev Tools</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Dev Tool Kit</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li id="home"><a href="index.php">Home</a></li>
          <li id="boilerplate"><a href="boilerPlate.php">Boilerplate Code</a></li>
          <li id="cheatsheets"><a href="cheatSheets.php">Cheat Sheets</a></li>
          <li id="formatCode"><a href="formatCode.php">Format Code</a></li>
          <li id="notes"><a href="notes.php">Notes</a></li>
      </ul>
    </div>
  </div>
</nav>



<script>
var url = window.location.href;
url = url.split('/');
current_page = url[url.length - 1];

switch(current_page){
  case 'index.php':
    $('#home').addClass('active');
    break;
  case 'boilerPlate.php':
    $('#boilerplate').addClass('active');
    break;
  case 'cheatSheets.php':
    $('#cheatsheets').addClass('active');
    break;
  case 'formatCode.php':
    $('#formatCode').addClass('active');
    break;
  case 'notes.php':
    $('#notes').addClass('active');
    break;
}
</script>


<div class="content">

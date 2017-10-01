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
      <a class="navbar-brand" href="#">Dev Tool Kit</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="home"><a href="index.php">Home</a></li>
      <li id="boilerplate"><a href="boilerPlate.php">Boilerplate Code</a></li>
      <li id="cheatsheets"><a href="cheatSheets.php">Cheat Sheets</a></li>
    </ul>
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
}
</script>


<div class="content">

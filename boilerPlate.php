<?php
include("include/header.php");

?>
<h1> Web Dev </h1>
<p>Boilerplate <code>HTML</code> code:</p>
<pre><code><xmp><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  
  </body></html></xmp></code></pre>


<p>Common <code>Javascript</code> and <code> CSS</code> libraries:</p>
<pre><code><xmp><!-- Local Imports -->
  <script src="../js/script.js"></script>
  <link rel="stylesheet" href="style.css">


  <!--JQUERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></xmp></pre></code>

<p> Template <code>HTML</code> Form:
<pre><code><xmp><form action="someFile.php" method="POST">
  <input name="inputName" type="text">
  <button class="btn btn-primary" type="submit" value="submit" name="submit"></button>
</form></xmp></code></pre>

<p> Template DOM manipulation in <code>Javascript</code></p>
<pre><code>// Modify CSS
document.getElementById('some id').className += 'added class';
$('#some id').addClass('added class');</code></pre>

<p>Template <code>AJAX</code> call</p>
<pre><code><xmp>$.ajax({
  type: 'POST',
  url: 'https://website.com/orfile.php',
  data: { postVar1: 'theValue1', postVar2: 'theValue2' },
  beforeSend:function(){
    // this is where we append a loading image
    $('#ajax-panel').html('<div class="loading"><img src="/images/loading.gif" alt="Loading..." /></div>');
  },
  success:function(data){
    // successful request; do something with the data
    $('#ajax-panel').empty();
    $(data).find('item').each(function(i){
      $('#ajax-panel').append('<h4>' + $(this).find('title').text() + '</h4><p>' + $(this).find('link').text() + '</p>');
    });
  },
  error:function(){
    // failed request; give feedback to user
    $('#ajax-panel').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
  }
});</xmp></pre></code>
<hr>
<h1>PHP</h1>
<?php
$codeHeader=<<<EOT
<p>Template <code>PHP</code> class:</p>
<pre><code>
EOT;
$codeFooter=<<<EOT
</code></pre>
EOT;
echo $codeHeader;
$code=<<<EOT
//Class named className.class.php
<?php
class className{
  private someVariable = null;

  function getSomeVariable(){
    return \$this->someVariable;
  }
}
// Import class with:
//include("className.class.php");
\$classObject = new className();
\$newVar = \$classObject->getSomeVariable();
?>
EOT;
highlight_string($code);
echo $codeFooter;
?>
<hr>
<h1>Python</h1>
<p>Template <code>Python</code> class:</p>
<pre><code>class ClassName():
    def __init__(self, _firstVariable):
        self.firstVariable = _firstVariable
        self.secondVariable = ""
    
    def doStuff(self):
        return self.firstVariable + self.secondVariable</code></pre>

<h1>Latex</h1>
<p>Boilerplate <code>Latex</code> code:
<pre><code><xmp>\documentclass[12pt]{article}
\setlength{\oddsidemargin}{0in}
\setlength{\evensidemargin}{0in}
\setlength{\textwidth}{6.5in}
\setlength{\parindent}{0in}
\setlength{\parskip}{\baselineskip}

\usepackage{amsmath,amsfonts,amssymb}
\usepackage{graphicx}
\usepackage{fancyhdr}
\usepackage{listings}
\usepackage{forest}
\usepackage{tikz}
\usetikzlibrary{arrows}
\usetikzlibrary{matrix}

\lstset{
  basicstyle=\small\ttfamily,
  columns=flexible,
  breaklines=true
}

\begin{document}

CSCI 3104 Spring 2017 \hfill Problem Set 7\\
Ethan Wright (03/07)\\



\hrulefill

\begin{enumerate}


\end{enumerate}
\end{document}</xmp></code></pre>

<?php
include("include/footer.php");
?>

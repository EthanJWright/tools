<?php
include("include/header.php");
?>
<form action="formatCode.php" method="POST">
  <textarea name="code" id="code">
  </textarea>
</br>
</br>
<center>
  <button type="submit" name="sql" id="sql" class="btn btn-primary">Format SQL</button>
  <button type="submit" name="json" id="json" class="btn btn-primary">Format JSON</button>
  <button type="submit" name="xml" id="xml" class="btn btn-primary">Format XML</button>
  <button type="submit" name="html" id="html" class="btn btn-primary">Format HTML</button>
</center>
</form>
</br>
</br>
<?php
require_once("sql-formatter/lib/SqlFormatter.php");

if(isset($_POST)){
  if(isset($_POST['sql'])){
    if(count($_POST['code']) > 0){
      echo SqlFormatter::format($_POST['code']);
    }
    unset($_POST['sql']);
    unset($_POST['code']);
  }
  if(isset($_POST['json'])){
    if(count($_POST['code']) > 0){
      $json = prettyPrint($_POST['code']);
      echo "<pre><code><xmp>$json</xmp></code></pre>";
    }
    unset($_POST['json']);
    unset($_POST['code']);
  }
  if(isset($_POST['xml'])){
    if(count($_POST['code']) > 0){
      $xml = formatXmlString($_POST['code']);
      echo "<pre><code><xmp>$xml</xmp></code></pre>";
    }
    unset($_POST['xml']);
    unset($_POST['code']);
  }
  if(isset($_POST['html'])){
    if(count($_POST['code']) > 0){
      $html = formatHTML($_POST['code']);
      echo "<pre><code><xmp>$html</xmp></code></pre>";
    }
    unset($_POST['html']);
    unset($_POST['code']);
  }
}

function formatXmlString($xml){
    $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);
    $token      = strtok($xml, "\n");
    $result     = '';
    $pad        = 0; 
    $matches    = array();
    while ($token !== false) : 
        if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) : 
          $indent=0;
        elseif (preg_match('/^<\/\w/', $token, $matches)) :
          $pad--;
          $indent = 0;
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
          $indent=1;
        else :
          $indent = 0; 
        endif;
        $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n";
        $token   = strtok("\n");
        $pad    += $indent;
    endwhile; 
    return $result;
}

function formatHTML($input){
  $tidy = new tidy();
  $config = array(
    'show-body-only' => true,
    'indent' => 2,
    'indent-spaces' => 2,
    'quiet' => true,
    'tidy-mark' => true
  );
  $clean = $tidy->repairString($input,$config);
  return $clean;
}


/* https://stackoverflow.com/questions/6054033/pretty-printing-json-with-php  */
function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}
?>

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

<?php
include("include/header.php");
?>

<div class="tiles">
<div class="row">
    <div class="col-md-4 col-xs-12">
      <div class="wrapper">
          <div class="main-content">
              <h1 id="date" class="date"></h1>
              <h3 id="time" class="time"></h3>
          </div>
      </div>
  </div>
    <div class="col-md-4 col-xs-12 col-md-offset-2">
      <div class="wrapper">
          <div class="main-content">
            <p class="date" id="results"></p>
            <p id="summary" class="time"><p>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-xs-12">
    <div class="wrapper">
        <div class="main-content">
          <p class="date">Public IP</p>
          <p id="public_ip" class="time"><p>
        </div>
    </div>
  </div>
  <div class="col-md-4 col-xs-12 col-md-offset-2">
    <div class="wrapper">
        <div class="main-content">
          <div class="form-group date">
            <div class="main"> 
              <p>Math</p>
              <input id="entry" type="text" onkeyup="return doMath(event);" />
            </div>
          </div>
          <p id="math_value" class="time"><p>
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-xs-12">
    <div class="wrapper">
        <div class="main-content">
          <div class="form-group">
            <div>
              <p class="date">Google Search</p>
            </div>
          </div>
          <input id="google" class="" type="text" onkeypress="return doGoogle(event);" />
        </div>
    </div>
  </div>
  <div class="col-md-4 col-xs-12 col-md-offset-2">
    <div class="wrapper">
        <div class="main-content">
          <div class="form-group">
            <div class="main">
              <p class="date">Stack Overflow Search</p>
            </div>
          </div>
          <input id="overflow" class="" type="text" onkeypress="return doOverflow(event);" />
        </div>
    </div>
  </div>
</div>
</div>
<script>
$("#overflow").focusout(function(){
  document.getElementById("overflow").value = "";
});
$("#google").focusout(function(){
  document.getElementById("google").value = "";
});

function newTab(url){
  var win = window.open(url);
  win.focus();
}

function doGoogle(e){
  var input = document.getElementById('google').value;
  input = input.split(" ");
  var generate_search = "/search?q=";
  input.forEach(function(word){
    generate_search += "+" + word;
  });
  if(e.keyCode == 13){
    url = 'http://www.google.com' + generate_search;
    newTab(url);
  }
}

function doOverflow(e){
  var input = document.getElementById('overflow').value;
  input = input.split(" ");
  var generate_search = "/search?q=";
  var checkFirst = false;
  input.forEach(function(word){
    if(checkFirst == false){
      generate_search += word;
      checkFirst = true;
    }else{
      generate_search += "+" + word;
    }
  });
  if(e.keyCode == 13){
    url = 'http://www.stackoverflow.com' + generate_search;
    newTab(url);
  }
}

function showIP(data){
  alert(data.ip);
}

function setWeather(ip_data){
    var url = 'https://api.forecast.io/forecast/14f21b5cf06a634b8b3a1a762b056f9c/' + ip_data.latitude + ',' + ip_data.longitude;
       $.ajax({url:url, dataType:"jsonp"}).then(function(data) {
         document.getElementById("results").innerHTML = 'Temperature: ' + data.currently.temperature + ' F';
         document.getElementById("summary").innerHTML = data.currently.summary;
       })
}

$.ajax({
  url: '//freegeoip.net/json/?callback=?',
  dataType: 'json',
  success: function(data){
    document.getElementById("public_ip").innerHTML = data.ip;
    setWeather(data);
  },
  error: function(){
    document.getElementById("public_ip").innerHTML = "Info blocked by ad block"
    document.getElementById("summary").innerHTML = "Info blocked by ad block"
    document.getElementById("results").innerHTML = "Weather: ..."
  }
});
</script>

<script src="js/math.min.js"></script>
<script>
function doMath(e){
  entered = document.getElementById('entry').value;
  try{
    value = math.eval(entered);
  } catch(err){
    //idgaf
  }
  if(entered == ""){
    document.getElementById('math_value').innerHTML = "";
  }
  if(value != undefined && value.length != 1){
    document.getElementById('math_value').innerHTML = value;
  }
}

</script>



<style>
input{
    border: none;
    padding: 10px;
    margin: 10px;
    height: 40px;
    width: 300px;
    border:1px solid #eaeaea;
    box-shadow: 0 0 2px rgba(0,0,0,0.5);
    outline:none;
}
input:hover{
    border-color: #a0a0a0 #b9b9b9 #b9b9b9 #b9b9b9;
}
input:focus{
    border-color:#4d90fe;
}

input[type="submit"] {
    border-radius: 2px;
    background: #f2f2f2;
    border: 1px solid #f2f2f2;
    color: #757575;
    cursor: default;
    font-size: 14px;
    font-weight: bold;
    width: 100px;
    padding: 0 16px;
    height:36px;
}
input[type="submit"]:hover {
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background: #f8f8f8;
    border: 1px solid #c6c6c6;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    color: #222;
}

* {
    margin: 0;
    padding: 0;
}

body {
    font-family: lato,sans-serif;
    color: #bdc3c7;
}

.wrapper {
    width: 400px;
    margin: 10% auto;
}

.main-content {
    background: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    width: 400px;
}

.date, .time {
    color: #bdc3c7;
    font-weight: 300;
    font-size: 1.5em;
    padding: 20px;
}

.date {
    border-bottom: 2px solid #eee;
}

.time {
    font-size: 3em;
}
#math_value{
  word-wrap: break-word;
}
</style>

<script>
var d = new Date();
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];

var date = document.getElementById("date");
var time = document.getElementById("time");

function getDate() {
    date.innerHTML = monthNames[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
}

function timer() {
    setTimeout(timer, 1000);
    var d = new Date();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var ampm = hours <= 11 ? 'am' : 'pm';
    var strTime = [hours % 12,
                  (minutes < 10 ? "0" + minutes : minutes)
                  ].join(':') + ampm;
    time.innerHTML = strTime;
    setTimeout(timer, 1000);
}

getDate();
timer();

</script>

<?php
include("include/footer.php");
?>

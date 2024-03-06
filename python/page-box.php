<?php
  include "settings.php";
  include "session.php";
  include "functions.php";

  $menu_name = "menu_1"; // <- INPUT
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $page_next = page_next_file($page_name, $menu_name);    // get the next file to be shown
  $page_level = page_order($page_name, $menu_name);       // get the order (level) of the page
  $page_title = page_title($page_name, $menu_name);       // get the title of the page
  $page_order = "0".$page_level;

  session_update($page_level, $language_default, $quiz_mandatory);

  page_box_check(); 

  $lang = $_SESSION['lang'];
?>

<?php
$box_array = randomGen(1,3,3); //generates 3 unique random numbers
?>

<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <style>
    #myDiv1 
    {
    width: 150px;
    height: 150px;
    position: absolute;
    text-align: center;
    left: 350px;
    top: 400px;
    background: #e4f3fe;
    border-radius: 10px;
    padding-top: 4px;
}

#myDiv2 
{
    width: 150px;
    height: 150px;
    position: absolute;
    text-align: center;
    left: 350px;
    top: 400px;
    background: #e4f3fe;
    border-radius: 10px;
    border-radius: 10px;
    padding-top: 4px;
}

#myDiv3 
{
    width: 150px;
    height: 150px;
    position: absolute;
    text-align: center;
    left: 350px;
    top: 400px;
    background: #e4f3fe;
    border-radius: 10px;
    padding-top: 4px;
}
  
  </style>

<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>

      <br /><br />

      <?php include_once('menu.php'); ?>
      
      <?php // include_once("header_right.php"); ?>

    </header>
  </div>

  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">SCEGLI IL PROSSIMO ARGOMENTO</h2>
    <br/>
  
      <div id="myDiv1"><?php include "box_1.php"?></div>
      <div id="myDiv2"><?php include "box_2.php"?></div>
      <div id="myDiv3"><?php include "box_3.php"?></div>

  </div>

  <div class="b-divider"></div>
  <div class="b-divider"></div>
  
  
  <script>
    // requestAnim shim layer by Paul Irish
    window.requestAnimFrame = (function(){
      return  window.requestAnimationFrame       || 
              window.webkitRequestAnimationFrame || 
              window.mozRequestAnimationFrame    || 
              window.oRequestAnimationFrame      || 
              window.msRequestAnimationFrame     || 
              function(/* function */ callback, /* DOMElement */ element){
                window.setTimeout(callback, 1000 / 60);
              };
    })();

function CircleAnimater(elem, radius, angle, speed) {
    this.elem = elem;
    this.radius = radius;
    this.angle = angle;
    this.origX = this.elem.offsetLeft;
    this.origY = this.elem.offsetTop;
    
    this.shouldStop = false;
    this.lastFrame = 0;
    this.speed = speed;
}

CircleAnimater.prototype.start = function () {
    this.lastFrame = +new Date;
    this.shouldStop = false;
    this.animate();
}
    
CircleAnimater.prototype.stop = function () {
    this.shouldStop = true;
}
    
CircleAnimater.prototype.animate = function () {
    var now    = +new Date,
        deltaT = now - this.lastFrame;
    
    var newY = Math.sin(this.angle) * this.radius;
    var newX = Math.cos(this.angle) * this.radius;

    this.elem.style.left = (this.origX + newX) + "px";
    this.elem.style.top = (this.origY + newY) + "px";
    this.angle += (this.speed * deltaT);

    this.lastFrame = +new Date;

    if (!this.shouldStop) {
        var $this = this;
        requestAnimFrame(function () {
            $this.animate();
        });
    }        
}

var elem = document.getElementById("myDiv1");
var elem2 = document.getElementById("myDiv2");
var elem3 = document.getElementById("myDiv3");

var ca = new CircleAnimater(elem, 150, 0, Math.PI / 5000);
var ca2 = new CircleAnimater(elem2, 150, -90,  Math.PI / 5000);
var ca3 = new CircleAnimater(elem3, 150, 90, Math.PI / 5000);

    ca.start();
    ca2.start();
    ca3.start();

  </script>
  

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>
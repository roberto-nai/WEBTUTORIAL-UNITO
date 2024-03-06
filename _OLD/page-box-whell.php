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

  // page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>

<?php
$box_array = randomGen(1,3,3); //generates 3 unique random numbers
?>

<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <style>
  text{
        font-family:Helvetica, Arial, sans-serif;
        font-size:12px;
        pointer-events:none;
    }
    #chart{
        position:relative;
        width:500px;
        height:500px;
        top:10px;
        left:10px;
    }
    #question{
        position: absolute;
        width:400px;
        height:500px;
        top:250px;
        left:620px;
    }
    #question h1{
        font-size: 20px;
        /* font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; */
        font-weight: bold;
        position: absolute;
        padding: 0;
        margin: 0;
        top:50%;
        -webkit-transform:translate(0,-50%);
                transform:translate(0,-50%);
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

    <div id="chart"></div>
    <div id="question"><h1></h1></div>
    
  </div>

  <script>

var padding = {top:20, right:40, bottom:0, left:0},
            w = 500 - padding.left - padding.right,
            h = 500 - padding.top  - padding.bottom,
            r = Math.min(w, h)/2,
            rotation = 0,
            oldrotation = 0,
            picked = 100000,
            oldpick = [],
            color = d3.scale.category20();//category20c()
            //randomNumbers = getRandomNumbers();
        //http://osric.com/bingo-card-generator/?title=HTML+and+CSS+BINGO!&words=padding%2Cfont-family%2Ccolor%2Cfont-weight%2Cfont-size%2Cbackground-color%2Cnesting%2Cbottom%2Csans-serif%2Cperiod%2Cpound+sign%2C%EF%B9%A4body%EF%B9%A5%2C%EF%B9%A4ul%EF%B9%A5%2C%EF%B9%A4h1%EF%B9%A5%2Cmargin%2C%3C++%3E%2C{+}%2C%EF%B9%A4p%EF%B9%A5%2C%EF%B9%A4!DOCTYPE+html%EF%B9%A5%2C%EF%B9%A4head%EF%B9%A5%2Ccolon%2C%EF%B9%A4style%EF%B9%A5%2C.html%2CHTML%2CCSS%2CJavaScript%2Cborder&freespace=true&freespaceValue=Web+Design+Master&freespaceRandom=false&width=5&height=5&number=35#results
        var data = [
                    {"label":"Tipi di dato e conversione",  "value":1,  "question":"Tipi di dato e conversione"}, // padding
                    {"label":"Istruzioni condizionali (if e for)",  "value":2,  "question":"Istruzioni condizionali (if e for)"},
                    {"label":"Liste e Dizionari",  "value":3,  "question":"Liste e dizionari"} //font-family
                     //color
                    // {"label":"HONDA",  "value":4,  "question":"What CSS property is used for changing the boldness of text?"}, //font-weight
                    // {"label":"FERRARI",  "value":5,  "question":"What CSS property is used for changing the size of text?"}, //font-size
                    // {"label":"APARTMENT",  "value":6,  "question":"What CSS property is used for changing the background color of a box?"}, //background-color
                    // {"label":"IPAD PRO",  "value":7,  "question":"Which word is used for specifying an HTML tag that is inside another tag?"}, //nesting
                    // {"label":"LAND",  "value":8,  "question":"Which side of the box is the third number in: margin:1px 1px 1px 1px; ?"}, //bottom
                    // {"label":"MOTOROLLA",  "value":9,  "question":"What are the fonts that don't have serifs at the ends of letters called?"}, //sans-serif
                    // {"label":"BMW", "value":10, "question":"With CSS selectors, what character prefix should one use to specify a class?"}
        ];
        var svg = d3.select('#chart')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom);
        var container = svg.append("g")
            .attr("class", "chartholder")
            .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");
        var vis = container
            .append("g");
            
        var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
        // declare an arc generator function
        var arc = d3.svg.arc().outerRadius(r);
        // select paths, use arc generator to draw
        var arcs = vis.selectAll("g.slice")
            .data(pie)
            .enter()
            .append("g")
            .attr("class", "slice");
            
        arcs.append("path")
            .attr("fill", function(d, i){ return color(i); })
            .attr("d", function (d) { return arc(d); });
        // add the text
        arcs.append("text").attr("transform", function(d){
                d.innerRadius = 0;
                d.outerRadius = r;
                d.angle = (d.startAngle + d.endAngle)/2;
                return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
            })
            .attr("text-anchor", "end")
            .text( function(d, i) {
                return data[i].label;
            });
        container.on("click", spin);
        function spin(d){
            
            container.on("click", null);
            //all slices have been seen, all done
            console.log("OldPick: " + oldpick.length, "Data length: " + data.length);

            if(oldpick.length == data.length){
                console.log("done");
                container.on("click", null);
                return;
            }
            var  ps       = 360/data.length,
                 pieslice = Math.round(1440/data.length),
                 rng      = Math.floor((Math.random() * 1440) + 360);
                
            rotation = (Math.round(rng / ps) * ps);
            
            picked = Math.round(data.length - (rotation % 360)/ps);
            picked = picked >= data.length ? (picked % data.length) : picked;
            if(oldpick.indexOf(picked) !== -1){
                d3.select(this).call(spin);
                return;
            } else {
                oldpick.push(picked);
            }
            rotation += 90 - Math.round(ps/2);
            vis.transition()
                .duration(3000)
                .attrTween("transform", rotTween)
                .each("end", function(){
                    //mark question as seen
                    d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                        .attr("fill", "#CCCCCC");
                    //populate question
                    d3.select("#question h1")
                        .text(data[picked].question);
                    oldrotation = rotation;
              
                    /* Get the result value from object "data" */
                    console.log(data[picked].value)
                    // MY LOGIG
                    // dati e conversioni
                    if (parseInt(data[picked].value) == 1){
                        menu_name = 'menu_2';
                        page_name = 'page-04.php';
                    }
                    // istruzioni condizionali
                    if (parseInt(data[picked].value) == 2){
                        menu_name = 'menu_3';
                        page_name = 'page-06.php';
                    }
                    // liste e dizionari
                    if (parseInt(data[picked].value) == 3){
                        menu_name = 'menu_4';
                        page_name = 'page-08.php';
                    }
                    // setTimeout(function(){window.location = 'https://example.com/'; }, 3000); // WORKS
                    var params = {'btn_submit':'1', 'menu_value':menu_name, 'page_value':page_name}
                    $.post('page-box-submit.php', params, function(data)
                    {   
                        // do nothing;          
                    });
                    setTimeout(function(){window.location = page_name; }, 3000); // WORKS
                    // END MY LOGIC
              
                    /* Comment the below line for restrict spin to sngle time */
                    // container.on("click", spin);
                }); // fine each()

        } // fine function spin()
        //make arrow
        svg.append("g")
            .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
            .append("path")
            .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
            .style({"fill":"black"});
        //draw spin circle
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 60)
            .style({"fill":"white","cursor":"pointer"});
        //spin text
        container.append("text")
            .attr("x", 0)
            .attr("y", 15)
            .attr("text-anchor", "middle")
            .text("GIRA!")
            .style({"font-weight":"bold", "font-size":"30px"});
        
        
        function rotTween(to) {
          var i = d3.interpolate(oldrotation % 360, rotation);
          return function(t) {
            return "rotate(" + i(t) + ")";
          };
        }
        
        
        function getRandomNumbers(){
            var array = new Uint16Array(1000);
            var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
            if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                window.crypto.getRandomValues(array);
                console.log("works");
            } else {
                //no support for crypto, get crappy random numbers
                for(var i=0; i < 1000; i++){
                    array[i] = Math.floor(Math.random() * 100000) + 1;
                }
            }
            return array;
        }

  </script>
    

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>
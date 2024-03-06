<?php
  include "../settings.php";
?>
<!doctype html>
<html lang="en">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="../view/eventsGet.js"></script>
  
  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>

    </header>
  </div>

  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">Data log</h2>
    <br />
      <div class="panel panel-default">
        <div class="panel-body">
        <hr />
        <p>Project ID: <b><span id="projectID"></b></span></p>
        <p>Project name: <b><span id="projectname"></b></span></p>
        <hr />
        <br />
        Table: <select name="table_db" id="table_db">
          <option value="events">Events</option>
          <option value="quiz">Quiz</option>
          <option value="survey">Survey</option>
        </select>
        <br /><br />
        <p>Rows found in DB: <span id="tableLen"></span></p>
        <br />
        <p>Table as csv: <img src="../../assets/images/csv.png" alt="csv" id="imgCSV" style="cursor:pointer;"/></p>
        <br />
        <p>Table as html:</p>
        <br />
            <div id="tableRes"></div>
        <br />
        </div>
    </div>
  </div>

  <div class="b-divider"></div>


  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>
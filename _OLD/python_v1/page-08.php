<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a page-xx
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session
    $next_level = $page_level + 1;
  }

  session_update($page_level, $language_default, $quiz_mandatory);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>
<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script>

  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      
      <?php include_once("header_left.php"); ?>
      
      <?php include_once('menu.php'); ?>
      
      <?php include_once("header_right.php"); ?>

    </header>
  </div>

  <div class="b-divider"></div>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">DIZIONARIO</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Una struttura dati chiave-valore</h2>
          <p>
            Supponiamo di aver bisogno di memorizzare <b>coppie di valori</b>, come ad esempio le distanze tra Torino e le città di Milano, Genova, Grenoble. 
            <p></p>

            Ci serve quindi una <b>struttura dati</b> che memorizzi queste coppie di chiavi-valore:<br /><br />
            CHIAVE: VALORE<br />
            "Milano": 140<br />
            "Genova": 180 <br />
            "Grenoble": 240
              <p></p>

            Si può creare un dizionario <i>distanze</i>:<br />

            <code>distanze = {"Milano": 140, "Genova": 180 ,"Grenoble": 240}</code>
            
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Accedere a un dizionario</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
        Come in ogni dizionario, partendo dalla chiave si può ottenere il rispettivo valore. 
        <p></p>
        Ad esempio, per stampare il valore corrispondente a "Grenoble":<br /> 
        <code>print(distanze["Grenoble"])</code>
          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Chiavi e valori</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          In un dizionario, possiamo recuperare tutte le chiavi con i metodi <b>keys()</b> e tutti i valori con <b>values()</b>. 
      <br />

          Ad esempio, l'istruzione <b>distanze.keys()</b> restituirà la lista:  <br />
          <code>["Milano","Genova","Grenoble"]</code>
      <p></p>
          E per stampare tutti valori posso usare:

      <br />
          <code>print(distanze.values())</code>
        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container text-center">
      <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>
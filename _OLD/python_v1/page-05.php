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
    <h2 class="text-primary">ISTRUZIONE IF</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Se... allora</h2>
          <p>

Una <b>struttura di controllo</b> del flusso molto elementare è IF, per verificare se una condizione logica sia vera o falsa. <br />

Ad esempio, se abbiamo: <br />
          
<code>mese = 12</code> <br />

Vogliamo stampare un messaggio a seconda del mese dell’anno. <br />

<code>
if (mese == 12):    <br />
&nbsp;&nbsp;print(“mese di Dicembre”)
</code>
<br />
  
Oppure verificare la presenza di un  <b>errore</b>: <br />

<code>if (mese < 0 or mese > 12):<br />
&nbsp;&nbsp;print("Errore nel numero del mese")</code>

                        
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>if... else</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          La struttura if può anche contenere l'alternativa (se la condizoine non viene soddisfatta):     <br />
                           

          se (condizione):     <br />
          &nbsp;&nbsp;fai qualcosa     <br />
                           
          altrimenti:    <br />
          &nbsp;&nbsp;fai qualcos'altro    <br />
                           
        </p><p>
        

          Vogliamo verificare il nome del mese:    <br />
                           
          <code>
          if (mese == 12):    <br />
          &nbsp;&nbsp;print(“Mese di dicembre”)    <br />
                           
          else:<br />
          &nbsp;&nbsp;print(Non é dicembre”)
          </code>

       </p>


        </div>
    </div>
  </div>

  <div class="b-divider"></div>


<div class="container" id='paragrafo-03'>
    <h2>elif</h2>
      <div class="panel panel-default">
        <div class="panel-body">

        <p>
          Il comando <b>elif</b> può permettere di concatenare un'altra istruzione if nell'alternativa:<br />

          if <i>condizione</i> <br />
          &nbsp;&nbsp;(fai qualcosa) <br />
          altrimenti se <i>condizione2 <i><br />
          &nbsp;&nbsp;(fai qualcos'altro) <br />
          altrimenti <br />(fai altro ancora) <br />

          <code>
          if (mese == 12):<br />
          &nbsp;&nbsp;print("Mese di dicembre")<br />
          elif (mese == 1):<br />
          &nbsp;&nbsp;print("Mese di gennaio")<br />
          else:<br />
          &nbsp;&nbsp;print("Non é dicembre né gennaio")
          </code>
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
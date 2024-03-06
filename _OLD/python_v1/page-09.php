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
    <h2 class="text-primary">Funzioni</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Risparmiare codice</h2>
          <p>
              Se vogliamo avere un codice più <b>leggibile</b> oppure abbiamo del codice che si <b>ripete molte volte</b>, possiamo creare una funzione che si possa richiamare quando serve. 
              </p></p>
              Ad esempio, se vogliamo salutare possiamo creare una funzione:

              <code>
              def auguri(): <br />
              &nbsp;&nbsp;print("Tanti auguri !") 
              </code>
              <br />
              Che possiamo richiamare nel programma semplicemente con: <br />
              <code>auguri()</code> <br />

                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Passare un parametro alla funzione</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
            Se decidiamo di passare anche un valore, possiamo avere:
            <br />
            <code>
              def auguri(n): <br />
              &nbsp;&nbsp;print("Tanti auguri a " + n + " !") 
            </code>

             <br />
             In questo modo, possiamo passare un nome:<br />
             <code>auguri("Tanti auguri a Chiara !")</code>

             <br />

             Per ottenere visualizzato il messaggio completo con il nome.
            </p></p>
             Possiamo anche aggiungere altri nomi facilmente: <br />
             <code>
              greeting("Mario")<br />
              greeting("Franca")
             </code><br />

                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Funzione con più argomenti</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Possiamo anche passare più argomenti alla funzione, separandoli con una virgola:<br />
          <code>
          def auguri(n, eta):<br />
              &nbsp;&nbsp;print("Tanti auguri a " + n + " per i suoi " + eta + " anni !") <br />
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
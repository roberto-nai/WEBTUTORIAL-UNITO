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
    <h2 class="text-primary">VARIABILI</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Un contenitore di dati</h2>
          <p>
            
Una variabile è come una “scatola” che serve a contenere un dato (di qualsiasi tipo, ad esempio un numero, una lettera, una parola). <br />

Nel computer tale "scatola" corrisponde ad una <b>locazione di memoria</b>, in cui viene registrato il dato: si chiama <b>variabile </b>, perché il suo contenuto, durante l'esecuzione di programma, può variare.<br />

Una variabile in Python viene creata tramite l'operatore <code>=</code> con l'assegnazione di un certo dato<br />
    </p>


        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Somma di variabili numeriche</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            Ad esempio, creiamo due variabili <b>a</b> e <b>b</b>, i cui valori sono rispettivamente <b>1</b> e <b>2</b>:<br />
            <code>
            a = 1<br />
            b = 2
            </code>
            <br />
            Cosa succede se aggiungo una variabile ad un’altra? 
            <br />

            Python mi restituisce il risultato, usando l’operatore <b> + </b>
            <br />

            Ad esempio: 
            <br />
            <code> print(a + b) </code>
            <br />
            Somma le due variabili, che sono di tipo intero, restituendo la somma dei valori.
          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Concatenare parole</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Nel caso di variabili di tipo <b>stringa:</b> <br/>
          c = “BELLA ” <br/>
          d = “CIAO ”<br/>

          Essendo entrambe di tipo stringa, la somma di <code> c + d </code> concatena dei rispettivi valori. 
          <br />
          Cosa succede invece con:

          <code> print(d + c) </code> ?

        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Errori</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            Le operazioni con tipi di dato diversi possono generare errori: <br/>

            Ad esempio:<br/>
            <code> print(a + c) </code>

            <br/>Ovvero: se aggiungo una stringa (“BELLA ”) ad un numero intero (1), la somma non é possibile e viene segnalato l’errore seguente: <br/>

            <code> TypeError: cannot concatenate 'str' and 'int' objects on line ... </code> 
          </p>

          <p>
            <i>Soluzione</i>: si potrebbe trasformare il tipo di dato numerico in stringa mediante l’istruzione <b>str()</b>: <br/>

            <code>a + str(c) </code><br/>

            Oppure trasformare la stringa in numero, con l'istruzione <b>int()</b>: <br/>

            <code>int(a) + b </code><br/>

            Provare... per credere ;-)
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
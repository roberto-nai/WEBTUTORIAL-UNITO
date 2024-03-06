<?php
  include "settings.php";
  include "session.php";
  
  $page_name = basename($_SERVER['PHP_SELF']); // filename
  $parts_1 = explode("-", $page_name);
  
  if (count($parts_1) == 2) // is a page-xx
  { 
    $parts_2 = explode(".", $parts_1[1]);
    $page_order = $parts_2[0];
    $page_level = intval($parts_2[0]); // for page level in session (the int version of $page_order)
    $next_level = $page_level + 1;
  }

  session_update($page_level, $language_default, $quiz_mandatory);

  page_level_check($page_level);

  $lang = $_SESSION['lang'];
?>
<!doctype html>
<html lang="<?php echo $lang;?>">
  
  <?php include_once("head.php"); ?>

  <script defer type="text/javascript" src="./view/eventsSave.js"></script> <!-- specific events for page -->
  
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
    <h2 class="text-primary">IMPARARE A PROGRAMMARE IN PYTHON</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Python è un linguaggio <b>semplice e versatile</b>, probabilmente il più popolare oggi nel mondo. 
          </p><p>
Il presente tutorial descrive alcuni aspetti fondamentali per iniziare a programmare.<br />
Ogni </b>lezione</b> (o pagina web) è breve e contiene facili esercizi.
</p><p>
Tra una pagina e la successiva trovate una semplice <b>domanda</b> (quiz) per capire se siete al passo e proseguire. 
</p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>La struttura del tutorial</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
          La prima lezione descrive cos'è un <b>programma</b>, ovvero un insieme di istruzioni.
          </p><p>
          In seguito ci saranno alcune parti fondamentali alla base di ogni programma, quali:
          <ul>
            <li><b>tipi di dato </b> - i dati principali che un programma può gestire possono essere numeri, caratteri, parole - cosiddette stringhe, e così via </li>
            <li><b>variabili </b> - ovvero le “scatole” dove mettere i dati, ad es. mese = 1, nome = “Emma”</li>
            <li>strutture dati quali <b> liste </b> e <b> dizionari </b>, in cui sistemare i dati usati nel programma 
            <li>l'<b>istruzione IF </b> - ovvero “se” si verifica una certa condizione allora fai qualcosa (una o più istruzioni) </li>
            <li><b>ciclo FOR</b> - ovvero ripeti per un certo numero di volte una o più istruzioni</li>
          </ul>
         </p>      
   
        </div>
    </div>
  </div>


<div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Suggerimento per visualizzare il tutorial</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          
          Se non avete già installato python sul vostro computer, potete anche utilizzare un <i>emulatore</i>online, affiancando la finestra per svolgere gli esercizi proposti.
          </p><p>
          Ad esempio, potete <b>ridimensionare</b> questa pagina a metà schermo, e affiancare una pagina con <a href= "https://pythonsandbox.com/" target = "_blank"> python sandbox </a>), come nella seguente immagine:

          <img alt="Tutorial python" src="./images-tutorial/interface-python.png">
          <p>PS: con uno schermo esterno ovviamente potreste avere una gestione migliore.</p>
          
        </div>
    </div>
  </div>


  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2>Conclusione</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>Infine, una lezione finale introdurrà le <b>funzioni</b>, che permettono di ripetere parti di codice utile.
   </p><p>

Al termine del tutorial ci sarà un breve <b>questionario</b>, per ripassare quanto avete imparato 🙂
   </p><p>
Buon divertimento!
   </p><p>
Premere il bottone per proseguire...</p>
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
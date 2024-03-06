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
    <h2 class="text-primary">UN PROGRAMMA</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            
Un programma è una <b>sequenza di istruzioni</b>, scritte in uno specifico <b>linguaggio di programmazione</b>. 
<br>
Le istruzioni sono eseguite dal computer per risolvere un certo <i>problema</i> di interesse, mediante un computer.
</p>  
<p>
Il computer è formato principalmente da:
          </p>
          <ul>
            <li>una <b>memoria</b> dove vengono salvati i dati</li>
            <li>una <b>unità di calcolo</b> o CPU </li>
            <li>connettori o <b>bus</b> che permettono il trasferimento di dati</li>
          </ul>
Il programma deve gestire queste diverse componenti. 
<br>
Un linguaggio di programmazione è definito ad <b>alto livello</b> se nasconde al programmatore questi passaggi. 
</p> 

          
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>UN ESEMPIO</h2>
      <div class="panel panel-default">
        <div class="panel-body">

          <p>
            Se volessimo visualizzare sullo schermo la scritta “Hello world”, avremmo bisogno di gestire molte operazioni <b>lato "macchina"</b>: ad esempio, gestire il monitor, far comparire dei pixel a forma di lettere, sistemarle con un certo ordine e in un certo punto dello schermo, usare la memoria RAM per interagire con la CPU e con il “bus” dati. 
      </p><p>
Python si occupa questi aspetti in modo per noi “invisibile”: è sufficiente utilizzare l’istruzione specifica <b>print()</b> per “stampare“ a video. </p><p>Seguendo la <b>sintassi</b> dell’istruzione print(), nella parentesi possiamo inserire il dato che vogliamo visualizzare.
</p><p>
Nel caso di:<br />
<code>print(Hello world)</code><br />
Python farà comparire il messaggio sullo schermo, senza farci (pre)occupare di quello che avviene nella "macchina", ovvero a “basso” livello :-) 

          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>



  <div class="container" id='paragrafo-03'>
    <h2>I COMMENTI </h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            Ogni volta che Python vede il <b>carattere #</b>, il resto della riga viene ignorato: così si possono scrivere commenti al codice.
          </p>
          <p>
            Ad esempio, queste righe verranno ignorate: <br/>
            <code>
              # Esempio di riga commentata  <br/>
              # Programma in python numero 1  <br/>
            </code>
          </p>
          <p>
          E anche i seguenti commenti, dopo le istruzioni, verrano ignorati da Python e non genereranno errore: <br/>
          <code>
            print("ciao") # Un saluto informale  <br/>
            print("buongiorno") # Un saluto formale  <br/>
          </code>
          </p>
        </div>
    </div>
  </div>



  <div class="b-divider"></div>
  <p>

  <div class="container" id='paragrafo-03'>
    <h2>LE ISTRUZIONI</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            Alcuni blocchi di codice sono già pronti per essere utilizzati: sono funzioni, procedure, o <b>gruppi di istruzioni</b> (raccolte in “librerie” che si possono importare e usare).
          </p>
          <p>
            Un programma é fondamentalmente <b>un file</b> (in formato .py) che contiene <b>istruzioni</b>. Ogni istruzione tipicamente si trova su ogni riga, e prevede di solito tre parti principali:
            <ul>
              <li>una parte iniziale che include le librerie, le funzioni, e altre dichiarazioni iniziali</li>
              <li>il programma principale, con le istruzioni fondamentali</li>
              <li>la restituzione dei risultati all’utente</li>
            </ul>
          </p>
      </div>
    </div>
  </div>
  </p>

  <div class="b-divider"></div>

  <div class="container text-center">
    <?php include_once('page_footer.php'); ?>
  </div>

  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>

  </body>
</html>
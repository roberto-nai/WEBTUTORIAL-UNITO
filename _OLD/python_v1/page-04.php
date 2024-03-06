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
    <h2 class="text-primary">
    TIPI DI DATO
    </h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
          I dati possono essere di tipo differente: 
            <ul>
              <li> numeri, di tipo intero (<b>integer</b>) oppure decimali (<b>float</b>)
              <li> testi e stringhe alfanumeriche (<b>string</b>) 
              <li> valori booleani, con due modalità: <i>True</i> oppure <i>False</i> (<b>boolean</b>) 
            </ul>
          </p>
        </div>
    </div>
  </div>



  <div class="b-divider"></div>



  <div class="container" id='paragrafo-02'>
    <h2>ESEMPI </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Alcuni esempi di variabili di tipo <b>integer</b> sono i seguenti:<br/>
             <code>
          anno_nascita = 1975<br/>
          mese_nascita = 12<br/>
          giorno_nascita = 18 <br/>
          peso = 65 
             </code>
          </p>

          <p>
          Provare a svolgere la <b>somma</b>, dopo aver creato le precedenti variabili: <br/>
           <code>
          print(anno_nascita + mese_nascita)
           </code>

             </p>

             <p>
              Esempi di variabili di tipo numerico float:<br/>

               <code>
                altezza = 1.67<br/>
                peso_forma = 60.2
             </code>
          <br/>
          Svolgere:    <br/>
           <code>
          print(altezza * peso) </code>

             </p>   <p>
          Alcuni esempi di variabili di tipo <b>string</b> sono i seguenti:
          <br/>
          <code>
            nome = "Chiara"<br/>
            cognome = "Rossi"<br/>
            comune = "Torino"  
          </code>
          <br/>
          Svolgere:    <br/>
            <code>
          print (nome + " " + cognome)
           </code>

            </p>
            <p>
              Esempi di variabili di tipo numerico <b>boolean</b>:
              <br/>
              <code>
                minore = False<br/>
                piemontese = True<br/>
                sarda = False
              </code>
            <br/>
            Svolgere i seguenti confronti di uguaglianza (==) oppure di disuguaglianza (!=) 
            <br/>
            <code>
              print(piemontese == sarda)  <br/>
              print(piemontese != minore)  <br/>
            </code>

            </p>

        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>CONVERTIRE TIPI DI DATO</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          NOTA BENE: un'operazione tra un numero intero e un numero decimale converte automaticamente il numero intero in decimale <br/>
          Ad esempio:<br/>

          <code>peso - peso_forma # converte peso in formato decimale (65.0), e poi svolge l'operazione</code>
          <br/>
          Analogamente avviene nel calcolo seguente:
          <br/>
          <code>IMC = peso / (altezza * altezza)</code>
          </p> 

          <p>Per concatenare <b>una stringa e un numero</b>, dobbiamo convertire il numero in stringa:
          <br/>
          <code>n-of xprint(comune + str(anno))</code>
          </p> 

          <p>

          Si può anche avere una variabile stringa, contenente un valore numerico (quindi un numero racchiuso tra virgolette) 
          <br/>

          <code>anno_matrimonio = "2001"</code>
          <br/>

          possiamo convertirlo in intero, e poi utilizzarlo nelle operazioni:
          <br/>

          <code>print(int(anno_matrimonio) - anno_nascita)</code>
          </p>

          <p>
          Si può anche svolgere il <b>confronto tra valori booleani</b>. 
          <br/>
          </p>
          <p>
          Ad esempio:
          <code> print( (2022 - anno_nascita) == minore )</code><br/>
          
          Prima svolge il calcolo e poi confronta il risultato con il valore contenuto nella variabile minore:
          </p>
          <p>
          Altro esempio:
          <code> print ((peso < 50) == False) </code> 

          <br/>
          Prima verifica se il peso é minore di 50, ed é False. Poi confronta tale esito con il valore booleano False: dato che è uguale (False == False), allora il print restituisce il valore True:<br/>

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
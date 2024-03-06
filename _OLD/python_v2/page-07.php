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
    <h2 class="text-primary"> LISTA </h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Creare una variabile lista</h2>
          <p>
          Se abbiamo bisogno di una struttura dati che contenga diverse variabili o valori, ci serve una lista. 

          <br /> 

          La peculiarità della lista é che i dati possono essere molti, e di qualsiasi tipo.
        </p><p>
          Ad esempio, la lista dei 
        <b>giorni della settimana</b> potrebbe essere: <br /> 

          <code>week = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"] </code>

        </p>
        <p> 

          Una lista di numeri pari: <br /> 

          <code>pari = [2,4,6,8]</code>
          
          </p>
          <p>
          Possiamo creare una lista con una sequenza di numeri anche utilizzando con l'istruzione range():  </p> 
          <p>
          Ad esempio, con l'istruzione: <br /> 

          <code>decina = range(0,10)</code> <br /> 

          Quale risultato ottenete? E se cambiate 10 in 100 ?

          </p>   

        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2> Indici</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                            
          Se vogliamo accedere al primo elemento della lista, dobbiamo inserire tra <b>parentesi quadrate</b> l'indice (ovvero la posizione) dell'elemento desiderato: <br /> 
          Se vogliamo quindi stampare "Mon", nell'esempio sopra:  <br /> 
          
          <code>print(week[0]) </code> <br /> 
 
          NOTA BENE: il primo elemento ha indice 0 !
       </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2> LUNGHEZZA DELLA LISTA </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p> Supponiamo di voler calcolare la lunghezza della lista. 
<br />
In python l'istruzione len permette di calcolare il numero di elementi. <br /> 

Nell'esempio sopra, len(week) restituirà come valore 7. <br /> 

<code>print (len(week))</code> <br /> 

E se vogliamo stampare l'ultimo elemento? <br /> 

<code>print (week[len[week]-1])</code> <br /> 

NOTA BENE: - 1 perché l'indice parte da 0. Senza questo accorgimento ci darebbe errore. 

        </p>
        </div>
    </div>
  </div>


  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2> APPARTENENZA AD UNA LISTA </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p> Per verificare se un elemento é nella lista possiamo usare <code>in</code>. 
<br />
Cerchiamo "Sim" nella nostra lista: lo trova?  <br /> 

<code>print("Sim" in week)</code>   <br /> 

E se cerchiamo "Mon"?

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
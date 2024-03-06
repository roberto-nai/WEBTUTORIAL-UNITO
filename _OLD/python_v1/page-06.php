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
    <h2 class="text-primary"> FOR</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Ciclo for</h2>
          <p>
          Se vogliamo <b>ripetere</b> una o più istruzioni molte volte, possiamo usare un ciclo FOR, seguendo una sintessi molto semplice:<br />

          <code>
          for (condizione): <br />
          &nbsp;<i>istruzioni</i>
          </code>

          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2> Esempi</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
                            
          Se vogliamo stampare 5 volte la scritta "ciao":<br />
          <code>
          for n in range(0,5):
          <br /> &nbsp;&nbsp;print("ciao")
          </code>
          <br />
          Per stampare i numeri da 1 a 5, si può stampare la variabile  </b>n </b>:
          <br />
          <code>
          for n in range(0,5):
          <br /> &nbsp;&nbsp;print(n)
          </code>
       </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2> For annidati </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p> Supponiamo di avere una tabella (o <b>matrice</b>) di dati formata da 4 colonne e 2 righe.
        <br />
        In python la tabella/matrice si può rappresentare come lista di liste:
        <br />
        m = [&nbsp;["A","B","C","D"], 
        <br />&nbsp;&nbsp;&nbsp;["E","F","G","H"]&nbsp;]

        </p>
        <p>
        Per stampare l'elemento nella prima riga e seconda colonna:
        <br />

        <code>
        print(m[0][1])
        </code>
        </p>

        <p>
        Un doppio ciclo for può essere usato per stampare tutti gli elementi della matrice, in cui  
        <ul>
          <li> il primo (i) "cicla" su  tutte le righe <br />
          <li> il secondo (j) "cicla" su tutte le colonne:
        <br />
        <code>
        for i in range(0,2):  <br />  
        &nbsp;&nbsp;for j in range(0,4):<br />
        &nbsp;&nbsp;&nbsp;&nbsp;print (m[i][j])<br />
        &nbsp;&nbsp;print("\n")
        </code>
        <br/>
        NOTA BENE: Aggiungendo il parametro <i>end</i> all'interno dell'istruzione print, il comando stampa sulla stessa riga: <br/>
        <code>  print(m[i][j], end=" ") </code>
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
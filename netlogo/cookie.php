<?php

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    if (isset($_SESSION['lang']))
      $lang = $_SESSION['lang'];
    else
      $lang = "it";
?>
<!doctype html>
<html lang="<?php echo $lang;?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NetLogo Tutorial</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.6.1.min.js"></script>
  </head>
  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
        <img width="40" height="32" role="img" class="media-object" alt="NetLogo" src="./images-tutorial/netlogo_logo.png" />
        <span class="fs-4">Tutorial NetLogo</span>
        <!--<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>-->
      </a>
      
      <?php include_once('menu.php'); ?>
      
      <div class="col-md-2 text-end">
        <button type="button" class="btn btn-primary">ITA</button>
        &nbsp;
        <button type="button" class="btn btn-primary">ENG</button>
      </div>
    </header>
  </div>

  <div class="container">
    <p>
    I <b>cookie</b> sono piccoli aggregati di testo registrati localmente nella memoria temporanea del tuo browser, e quindi nel tuo computer, per periodi di tempo variabili in funzione dell'esigenza.<br />
    <br />
    Mediante i cookie è possibile registrare in modo semi-permanente informazioni relative alle tue preferenze e altri dati tecnici che permettono una navigazione più agevole e una maggiore facilità d'uso e efficacia del sito stesso.<br />
    Ad esempio, i cookie possono essere usati per determinare se è già stata effettuata una connessione fra il tuo computer e il nostro sito per mantenere le informazioni di "login".<br />
    A tua garanzia, viene identificato solo il cookie memorizzato sul tuo computer.<br />
    <br />
    Al fine di rendere più comoda possibile la tua visita al nostro sito web utilizziamo i cookie o codici informatici equivalenti.<br />
    Su questo sito sono presenti solo cookie tecnici.<br />
    <br />
    Questi cookie sono necessari al corretto funzionamento del sito e consentono di gestire le operazioni di registrazione informazioni, registrare le preferenze di configurazione dove disponibili o alla visualizzazione di determinati contenuti.<br />
    Tali cookie non sono soggetti alla raccolta del consenso dell’utente, ma possono comunque essere disabilitati utilizzando l’apposita funzione del browser.<br />
    </p>
  </div>  


  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>
 
  </body>
</html>
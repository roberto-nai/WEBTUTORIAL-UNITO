<?php

    include "settings.php";
    include "session.php";

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    if (isset($_SESSION['lang']))
      $lang = $_SESSION['lang'];
    else
      $lang = $language_default;
?>


<!doctype html>
<html lang="<?php echo $lang;?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NetLogo Tutorial</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.6.1.min.js"></script>
  </head>
  <body>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./page-01.php" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
        <img width="40" height="32" role="img" class="media-object" alt="NetLogo" src="./images-tutorial/python_logo.png" />
        <span class="fs-4">Tutorial <?php echo $project_name;?></span>
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
    Informativa sul trattamento dei dati personali ai sensi dell’art. 13 del Regolamento Generale sulla protezione dei dati (Regolamento UE 679/2016)<br />
    <br />
    Versione 2 del 01/05/2022
    <br />
    <br /><br />
    _________________________________________________________________________
    <br /><br />
    a) Identità e dati di contatto
    <br /><br />
    Si informa il "Titolare" del trattamento dei dati è l'Università degli Studi di Torino (nel seguito Università), con sede legale in Via Verdi 8 – 10124 Torino (dati di contatto: indirizzo pec: ateneo@pec.unito.it - indirizzo mail: rettore@unito.it: il rappresentante legale: il Magnifico Rettore pro tempore).
    <br />
    Il referente del software a disposizione sul sito <b><?php echo $_SERVER['SERVER_NAME']; ?></b> è il Dipartimento di Informatica dell'Università degli Studi Torino.
    <br /><br /><br />
    b) Dati di contatto del responsabile della protezione dei dati personali (DPO)
    <br /><br />
    Si informa che Il Responsabile della protezione dei dati personali – RPD, nella versione anglosassone Data protection officer – DPO, può essere contattato al seguente indirizzo mail rpd@unito.it.
    <br /><br /><br />
    c) Finalità del trattamento e base giuridica
    <br /><br />
    I trattamenti dei dati richiesti all’interessato sono effettuati ai sensi dell’art. 6, Paragrafo 1, lett. e) del regolamento UE 2016/679 per le seguenti finalità istituzionali:
    <br />
    svolgimento delle finalità di ricerca del progetto del Dipartimento di Informatica dell’Università degli Studi di Torino: metriche, modelli, metodi e strumenti a supporto della ricerca in ambito dell'educational data mining.<br />
    Il progetto ha per oggetto l’utilizzo di un tutorial online, attraverso un’applicazione Web di supporto ai docenti per avvicinare gli studenti al mondo dell'informatica familiarizzando con il concetto di agent based modeling.
    <br />
    L’applicazione non prevede la memorizzazione dei dati personali degli utenti.
    <br />
    L'applicazione memorizza le seguenti informazioni:
    <br />
    -azioni svolte dall'utente nell’applicazione web.
    <br />
    Considerando che il conferimento riguarda solo dati identificativi indiretti il rischio di identificazione degli studenti è ritenuto trascurabile, ai sensi dell’Art. del regolamento UE 2016/679.
    <br />
    Per il buona riuscita della ricerca non è necessaria una registrazione da parte degli utenti.
    <br /><br /><br />

    d) Destinatari ed eventuali categorie di destinatari dei dati personali
    <br /><br />
    I dati sono trattati all’interno dell’ente da soggetti autorizzati del trattamento dei dati sotto la responsabilità del Titolare per le finalità sopra riportate.
    <br />
    I dati sono memorizzati in un server ospitato da <b><?php echo $_SERVER['SERVER_NAME']; ?></b>. L'accesso al database è consentito solo agli utenti dotati dei necessari privilegi di autenticazione.
    <br />
    Terminato il periodo di raccolta, i dati anonimizzati sono memorizzati nel server e nei computer dei partecipanti alla ricerca e resi disponibili su richiesta alla comunità scientifica al fine di garantire la riproducibilità degli esperimenti. In nessun caso saranno divulgati dati in chiaro che permettano l’identificabilità degli interessati.
    <br />
    I dati potranno essere diffusi unicamente in forma anonima e/o aggregata. In nessun caso verranno diffusi risultati che rendano identificabili i partecipanti, ai sensi dell’art. 4 del regolamento UE 2016/679.
    <br />
    I dati potranno essere comunicati ai seguenti Responsabili del trattamento esterni che hanno stipulato specifici accordi, convenzioni o protocolli di intese, contratti con il titolare del trattamento.
    <br />
    Referente dell’istituto presso cui viene effettuata la sperimentazione.
    <br /><br /><br />
    e) Trasferimento dati a paese terzo
    <br /><br />
    Si informa che il titolare non intende trasferire i dati ad un paese terzo o ad un’organizzazione internazionale.
    <br /><br /><br />
    f) Periodo di conservazione dei dati
    <br /><br />
    I dati personali saranno conservati per un periodo di tempo di 6 mesi.
    <br />
    I dati sono conservati per il periodo necessario per il raggiungimento delle finalità per le quali sono stati raccolti i dati.
    <br />
    Tale tempo di conservazione deriva dall’esigenza di elaborarli in forma aggregata a fini di ricerca.
    <br /><br /><br />
    g) Diritti sui dati
    <br />
    Si precisa che, in riferimento ai suoi dati personali, può esercitare i seguenti diritti:
    <br />
    diritto di accesso ai suoi dati personali; diritto di ottenere la rettifica o la cancellazione degli stessi o la limitazione del trattamento che lo riguardano;<br />
    diritto di opporsi al trattamento;<br />
    diritto alla portabilità dei dati (diritto applicabile ai soli dati in formato elettronico), così come disciplinato dall’art. 20 del Regolamento UE 2016/679;<br />
    Si precisa che il diritto di revoca del consenso non può ovviamente riguardare i casi in cui il trattamento effettuato dal nostro ente in quanto necessario per adempiere un obbligo legale al quale è soggetto il titolare del trattamento o per l'esecuzione di un compito di interesse pubblico o connesso all'esercizio di pubblici poteri di cui è investito il nostro ente in qualità di titolare del trattamento;<br />
    <br /><br /><br />

    h) Reclamo
    <br />
    Si informa che, nel caso in cui l’Università non ottemperi alla richiesta del soggetto, è possibile proporre reclamo ai sensi dell’art.77 del GDPR all'autorità di controllo (Autorità Garante per la protezione dei dati personali indirizzo email: garante@gpdp.it; sito web: www.garanteprivacy.it) o ricorso giurisdizionale ai sensi dell’art.78 del GDPR.
    <br /><br /><br />
    i) Conferimento dei dati
    <br />
    L’interessato non è obbligato a fornire i dati. Il mancato conferimento dei dati non consentirà all’interessato di procedere al perfezionamento del procedimento.
    <br /><br /><br />
    j) Finalità diversa del trattamento
    <br />
    Il titolare del trattamento intenda trattare ulteriormente i dati personali per una finalità diversa da quella per cui essi sono stati raccolti, prima di tale ulteriore trattamento, il titolare fornirà all'interessato informazioni in merito a tale diversa finalità e ogni ulteriore informazione pertinente
    <br /><br /><br />
    k) Profilazione
    <br />
    Il titolare non utilizza processi automatizzati finalizzati alla profilazione.
    Art. 6, Liceità del Trattamento, paragrafo 1, lett.e): “il trattamento è necessario per l’esecuzione di un compito di interesse pubblico o connesso all’esercizio di pubblici poteri di cui è investito il titolare del trattamento”.
</p>
  </div>  

  


  <div class="container">
      <?php include_once('footer.php'); ?>
  </div>
 
  </body>
</html>
<?php
?>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">DIZIONARIO</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Una struttura dati chiave-valore</h2>
          <p>
            Supponiamo di aver bisogno di memorizzare <b>coppie di dati</b>, come ad esempio le distanze in KM tra Torino e le città di Milano, Genova, Grenoble. 
            <p></p>

            Ci serve una <b>struttura dati</b> che memorizzi delle coppie {chiave-valore}:<br /><br />
            CHIAVE : VALORE <br />
            "Milano" : 140 <br />
            "Genova" : 180 <br />
            "Grenoble" : 240
              <p></p>

            Si può creare così un dizionario <i>distanze</i>:<br />

            <code>distanze = {"Milano": 140, "Genova": 180 ,"Grenoble": 240}</code>
            
                        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Accedere a un dizionario</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
        Come in ogni dizionario, partendo dalla chiave si può ottenere il rispettivo valore. 
        <p></p>
        Ad esempio, per stampare il valore corrispondente a "Grenoble":<br /> 
        <code>print(distanze["Grenoble"])</code>
          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Chiavi e valori</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          In un dizionario, possiamo recuperare tutte le chiavi con i metodi <b>keys()</b> e tutti i valori con <b>values()</b>. 
      <br />

          Ad esempio, l'istruzione <b>distanze.keys()</b> restituirà la lista:  <br />
          <code>["Milano","Genova","Grenoble"]</code>
      </p><p>
          E per stampare tutti valori si può usare:

      <br />
          <code>print(distanze.values())</code>
        </p>
        </div>
    </div>
  </div>
  
  <div class="b-divider"></div>
<?php
?>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">FUNZIONI</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Risparmiare codice</h2>
          <p>
            Se vogliamo avere un codice più <b>leggibile</b> oppure abbiamo del codice che si <b>ripete molte volte</b>, possiamo creare una funzione che si possa richiamare quando serve. 
          </p>
          <p>
            Ad esempio, se vogliamo salutare possiamo creare una funzione: <br />

            <code>
              def auguri(): <br />
              &nbsp;print("Tanti auguri !") 
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
              &nbsp;print("Tanti auguri a " + n + " !") 
            </code>

             </p>
             <p>
             In questo modo, possiamo passare un nome:
             <br />
             <code>auguri("Chiara") </code> <br />
             Ottenendo in output: <br/>
             
             Tanti auguri a Chiara !

             <br />
             Per ottenere visualizzato il messaggio completo con il nome.<br />
            </p>
            <p>
             Possiamo anche aggiungere messaggi di auguri con altri nomi facilmente: <br />
             <code>
              auguri("Mario")<br />
              auguri("Franca")
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
          Possiamo anche passare più argomenti alla funzione, separandoli con una virgola:
         <p/>
         <p>
          
          <br />
          <code>
          
          def tantiAuguri(n, eta):<br />
          &nbsp;print("Tanti auguri a " + n + " per i suoi " + str(eta) + " anni !") <br /><br />
          
          tantiAuguri("Emma", 18) 
          </code>

        </p>
        </div>
    </div>
  </div>
  
  <div class="b-divider"></div>

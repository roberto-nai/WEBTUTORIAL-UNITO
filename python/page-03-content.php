<?php
?>

<div class="container" id='paragrafo-01'>
    <h2 class="text-primary">VARIABILI</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Un contenitore di dati</h2>
          <p>
            
Una variabile è come una scatola che serve a contenere un dato (di qualsiasi tipo, ad esempio un numero, una lettera, una parola). <br />

Nel computer tale "scatola" corrisponde ad una <b>locazione di memoria</b>, in cui viene registrato il dato.  </p> 

<p> Si chiama <b>variabile </b> perché il suo contenuto, durante l'esecuzione del programma, può variare.<br />

Una variabile in Python viene creata tramite l'operatore <code>=</code> con l'assegnazione di uno specifico valore/dato.<br />
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
          Nel caso delle due seguenti variabili di tipo <b>stringa:</b> <br/>
          c = "BELLA " <br/>
          d = "CIAO "<br/>

          Essendo entrambe di tipo stringa, la somma di <code> c + d </code> concatena i rispettivi valori. 
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

            Ad esempio, nel caso di:   <code> print(c + a) </code>

            <br/>Stiamo cercando di aggiungere un numero intero (1) ad una stringa ("BELLA "). Tale somma non è possibile e viene segnalato l'errore seguente: <br/>

            <code> TypeError: cannot concatenate 'str' and 'int' objects on line ... </code> 
          </p>

          <p>
            <i>Soluzione</i>: si può trasformare il tipo di dato numerico in stringa, mediante l’istruzione <b>str()</b>: <br/>

            <code>print(c + str(a)) </code><br/>

            Provare... per credere ;-)
          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

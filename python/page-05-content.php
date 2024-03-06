<?php
?>  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">CONVERTIRE I DATI</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Processare i dati</h2>
          <p>
              Le informazioni devono essere dello stesso tipo per poter essere elaborate.
              <br/>
              Ad esempio, se devo sommare due variabili numeriche, queste devono essere entrambe dello stesso tipo.
              <br/>
              Analogamente, per concaterare due parole, ciascuna variabile dev'essere in formato stringa (ovvero con le virgolette):<br />
              
              <code>
              stringa1 = "2001 Odissea " <br />
              stringa2 = "nello spazio" <br />
              print(stringa1 + stringa2) 
              </code>
              <br />
              Lo stesso vale se si tratta di numeri decimali (con una scorciatoia, che vedremo tra poco)
          </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>Convertire da numero a stringa</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
           Supponiamo di avere una variabile intera contenente l'anno di nascita:
            <br />
             <code>
              anno = 2003
             </code>

             <br />
             Vogliamo calcolare l'età della persona nel 2030. <p/>
             <p>
             Dovremo quindi svolgere l'operazione: <br />
              <code>
               eta = 2030 - anno 
               <br />
               print(eta)
              </code>
             </p>

             <p>
             Per visualizzare un messaggio con l'età della persona nel 2030, non potremmo semplicemente concaterare: 
             <br />

             <code>
              print("Avrai " + eta + " anni") 
             </code>
             <br />
             Darebbe errore, perché <i>eta</i> è un tipo di dato numerico, mentre il resto è di tipo stringa. 
             </p>

             <p>
             Occorre convertire anche il numero in stringa, con la funzione di python <i>str()</i> <br />
             <code>
              print("Avrai " + <b>str(eta)</b> + " anni") <br />
             </code>
             </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>Convertire da stringa a numero</h2>
       <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Potremmo anche avere una stringa composta soltanto da numeri:<br />
          <code>
          s = "2001" <br />
          print(s) 
          </code>
          <br />

          In questo caso, possiamo trasformare la stringa in un valore intero, con l'istruzione <b>int() </b> 
          <br />
          Ad esempio: <br />
          <code>
          print(2030 - int(s))<br />
          </code>

        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>
  
<div class="container" id='paragrafo-04'>
    <h2>Conversione tra numeri interi e decimali</h2>
       <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Se si tratta di operazioni tra numeri di diverso tipo, come ad esempio nel caso tra un numero intero e un numero decimale: <br />
          <code>
          val = 100 - 20.0  <br />
          print(val)
          </code>
          <br />
          Il risultato (la variabile di nome <i>val</i>) sarà un numero di tipo decimale: 80.0 (senza alcun messaggio di errore da parte di python)
          </p>
          <p>
          NOTA BENE: Possiamo infine controllare il tipo di variabile con l'istruzione <i>type()</i> <br />
          <code>
          print(type(val))
          </code>
        </p>
        </div>
    </div>
  </div>


  <div class="b-divider"></div>
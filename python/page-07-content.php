<?php
?>

<div class="container" id='paragrafo-01'>
    <h2 class="text-primary">FOR</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Ripetere le istruzioni </h2>
          <p>
          Se vogliamo <b>ripetere</b> una o più istruzioni molte volte, possiamo usare un ciclo FOR, seguendo una sintessi molto semplice:<br />

          <code>
          for(condizione): <br />
          &nbsp;<i>istruzioni</i>
          </code>
		  <br /> NOTA BENE: Ricordarsi che l'indentazione, ottenuta con il tasto "tab", è utile per definire il livello delle istruzioni. 
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
          <br /> &nbsp;print("ciao")
          </code>
          <br />
          Per stampare i numeri da 0 a 4, si può stampare la variabile <b>n </b> nel ciclo:
          <br />
          <code>
          for n in range(0,5):
          <br /> &nbsp;print(n)
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
        <p> 
        Supponiamo di voler stampare 4 volte i numeri da 0 a 9 (compreso) <br />
        
        <code>
        for i in range(0,4):<br />
  		&nbsp;for j in range(0,10):<br />
    	&nbsp;&nbsp;print(j)<br />
  		&nbsp;print("\n") # \n crea una riga vuota
        </code>
        </p>

        <p>
        <br/>
        NOTA BENE: aggiungendo il parametro <i>end</i> all'interno dell'istruzione <code>print</code>, il comando stampa sulla stessa riga separando i valori da uno spazio vuoto. <br />
        Provare a sostituire l'istruzione <i>print</i> nel ciclo for con questa: <br/>
        <code> print(j, end = " ") </code>
        <br />
        AVVISO: non tutte le sandbox online supportano il parametro opzionale <code>end = " "</code>.
        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

<?php
?>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary"> LISTA </h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Creare una variabile lista</h2>
          <p>
          Se abbiamo bisogno di una struttura dati che contenga diverse variabili o valori, ci serve una lista. 

          <br /> 

          La peculiarità della lista è che i dati possono essere molti, e di qualsiasi tipo.
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
          Possiamo creare una lista con una sequenza di numeri anche utilizzando l'istruzione range():  </p> 
          <p>
          Ad esempio, con l'istruzione: <br /> 

          <code>decina = list(range(0,10))<br /> 
          print(decina)
          </code> 
          
          <br /> 

          Si ottiene la lista di numeri interi compresi tra 0 e 9, ovvero: [0,1,2,3,4,5,6,7,8,9]
          
          Quale risultato si ottiene cambiando 10 in 100 ?

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
          Se vogliamo accedere ad un elemento della lista dobbiamo inserire tra <b>parentesi quadrate</b> 
          la posizione (o indice) dell'elemento desiderato. </p>
          <p>
          NOTA BENE: Il primo elemento della lista ha indice 0 </p>
          <p>
          Per stampare "Mon", nell'esempio sopra, dovremo cercare l'elemento con indice 0 
          di week, ovvero dovremo scrivere: <br/>
          <code>print(week[0]) </code> <br />
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
L'istruzione <b> len </b> permette di calcolare il numero di elementi. <br /> 

Nell'esempio sopra, len(week) restituirà come valore 7. <br /> 

<code>print(len(week))</code> <br /> 

<!--
E se vogliamo stampare l'ultimo elemento? <br /> 
<code>print(week[len[week]-1])</code> <br /> 
NOTA BENE: - 1 perché l'indice parte da 0. Senza questo accorgimento ci darebbe errore. 
-->
        </p>
        </div>
    </div>
  </div>


  <div class="b-divider"></div>

  <div class="container" id='paragrafo-04'>
    <h2> APPARTENENZA AD UNA LISTA </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p> Per verificare se un elemento è nella lista possiamo usare <code>in</code>. 
<br />
Cerchiamo "ABC" nella nostra lista: lo trova?  <br /> 

<code>print("ABC" in week)</code>   <br /> 

E se cerchiamo "Mon"?

        </p>
        </div>
    </div>
  </div>


  <div class="b-divider"></div>

<?php
?>

<div class="container" id='paragrafo-01'>
    <h2 class="text-primary">
    TIPI DI DATO
    </h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
          I dati possono essere di tipo differente: 
            <ul>
              <li> numeri, di tipo intero (<b>integer</b>) oppure decimali (<b>float</b>)
              <li> testi e stringhe alfanumeriche (<b>string</b>) 
              <li> valori booleani, con due modalità: <i>True</i> oppure <i>False</i> (<b>boolean</b>) 
            </ul>
          </p>
        </div>
    </div>
  </div>



  <div class="b-divider"></div>



  <div class="container" id='paragrafo-02'>
    <h2>ESEMPI </h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          Alcuni esempi di variabili di tipo <b>integer</b> sono i seguenti:<br/>
             <code>
          anno_nascita = 1975<br/>
          mese_nascita = 12<br/>
          giorno_nascita = 18 <br/>
          peso = 65 
             </code>
          </p>

          <p>
          Provare a svolgere la <b>somma</b>, dopo aver creato le precedenti variabili: <br/>
           <code>
          print(anno_nascita + mese_nascita)
           </code>

             </p>

             <p>
              Esempi di variabili di tipo numerico float:<br/>

               <code>
                altezza = 1.67<br/>
                peso_forma = 60.2
             </code>
          <br/>
          Svolgere:    <br/>
           <code>
          print(altezza * peso) </code>

             </p>   <p>
          Alcuni esempi di variabili di tipo <b>string</b> sono i seguenti:
          <br/>
          <code>
            nome = "Chiara"<br/>
            cognome = "Rossi"<br/>
            comune = "Torino"  
          </code>
          <br/>
          Svolgere:    <br/>
            <code>
          print(nome + " " + cognome)
           </code>

            </p>
            <p>
              Esempi di variabili di tipo numerico <b>boolean</b>:
              <br/>
              <code>
                minore = False<br/>
                piemontese = True<br/>
                sarda = False
              </code>
            <br/>
            Svolgere i seguenti confronti di uguaglianza (==) oppure di disuguaglianza (!=) 
            <br/>
            <code>
              print(piemontese == sarda)  <br/>
              print(piemontese != minore)  <br/>
            </code>
			
            <p>
            Notare la differenza tra == e = <br /> 
            <ul>
            	<li> =  si usa per l'assegnamento (ad es. con <code> v1 = 100 </code> creo una variabile di nome v1 a cui assegno il valore intero 100) </li>
            	<li> == si usa per il confronto, ad es. con <code> print(v1 == 90) </code> si confronta il valore della variabile v1 e il numero 90, stampando quindi vero o falso. In questo caso, con v1 che vale 100, stamperà <i>False</i>.</li>
            </ul>
            </p>
            
            <br/>
            
            </p>

        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-03'>
    <h2>CONVERTIRE TIPI DI DATO</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          NOTA BENE: un'operazione tra un numero intero e un numero decimale converte automaticamente il numero intero in decimale <br/>
          Ad esempio:<br/>

          <code>peso - peso_forma </code>  <br/>Converte peso in formato decimale (65.0), e poi svolge l'operazione
          </p>
          <p>
          Analogamente avviene nel calcolo seguente:
          <br/>
          <code>IMC = peso / (altezza * altezza)</code>
          </p> 

          <p>Per concatenare <b>una stringa e un numero</b>, dobbiamo convertire il numero in formato stringa:
          <br/>
          <code>print(comune + str(anno))</code>
          </p> 

          <p>

          Si può anche avere una variabile stringa, contenente un valore numerico (quindi un numero racchiuso tra virgolette) 
          <br/>

          <code>anno_matrimonio = "2001"</code>
          <br/>

          possiamo convertirlo in intero, e poi utilizzarlo nelle operazioni:
          <br/>

          <code>print(int(anno_matrimonio) - anno_nascita)</code>
          </p>

          <p>
          Si può anche svolgere il <b>confronto</b> tra espressioni e variabili: 
          <br/>
          
          Ad esempio:  <br/>
          <code> print((2022 - anno_nascita) == minore)</code><br/>
          
          Prima svolge il calcolo e poi confronta il risultato con il valore contenuto nella variabile minore:
          </p>
          <p>
          Altro esempio, confrontando due valori booleani: <br/>
          <code> print((peso &lt; 50) == False) </code> 
          <br/>
          Prima verifica se il peso è minore di 50, e questo risultato sarà False. Poi confronta tale esito con il valore booleano False: dato che è uguale (False == False), allora il print stamperà a video True.<br/>

        </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>
<?php
?>
  
  <div class="container" id='paragrafo-01'>
    <h2 class="text-primary">ISTRUZIONE IF</h2>
      <div class="panel panel-default">
        <div class="panel-body">
          <h2>Se... allora</h2>
          <p>

La <b>struttura di controllo</b> del flusso <i>if</i> verifica se una condizione logica è vera o falsa. <br />

Ad esempio, magari in base alla variabile <i>mese</i>: <br />
          
<code>mese = 12</code> <br />

Potremmo stampare il corrispondente mese dell'anno (dicembre, in questo caso): <br />
 <br />

<code>
if(mese == 12):    <br />
&nbsp;print("mese di Dicembre")
</code>
<br />
<br />  
Oppure verificare la presenza di un <b>errore</b>: <br />

<code>
mese = 12 <br />
if(mese &#60; 0 or mese &#62; 12):<br />
&nbsp;print("Errore nel numero del mese") <br />
print("Avvio del programma")<br />
</code>

          </p>
          <p>
            Attenzione! In python l'indentazione del codice è importante!!
          </p>
          <p>
            Non é soltanto un aspetto grafico! <br />
            L'indentazione permette di capire quali istruzioni svolgere
           </p>
            
            <p>Nell' esempio sopra, il messaggio di errore <i>print("Errore...") </i> è l'unica istruzione che viene eseguita all'interno dell'<i>if</i> (ovvero se la condizione dell'if risulta vera). 
            <br /> 
            Il seguente messaggio di "Avvio..." è invece visualizzato sempre, essendo al di fuori dell' <i>if</i>.
           
            </p>
        </div>
    </div>
  </div>

  <div class="b-divider"></div>

  <div class="container" id='paragrafo-02'>
    <h2>if... else</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <p>
          La struttura <i>if</i> può anche contenere l'alternativa (se la condizione non viene soddisfatta):     <br />
          <br />
          se(condizione):     <br />
          &nbsp;fai qualcosa     <br />
                           
          altrimenti:    <br />
          &nbsp;fai qualcos'altro    <br />
                           
        </p><p>
        NOTA BENE: l'operatore "diverso da" si indica con <code> != </code> 
        </p><p>
        
          Vogliamo verificare il nome del mese:    <br />
                           
          <code>
          if(mese != 12):    <br />
          &nbsp;print("Non é dicembre")    <br />
                           
          else:<br />
          &nbsp;print("Mese di dicembre")
          </code>

       </p>


        </div>
    </div>
  </div>

  <div class="b-divider"></div>


<div class="container" id='paragrafo-03'>
    <h2>elif</h2>
      <div class="panel panel-default">
        <div class="panel-body">

        <p>
          Il comando <b>elif</b> può permettere di concatenare un'altra istruzione if nell'alternativa:<br />
		  <br />
          if <i>condizione1</i> <br />
          &nbsp;fai qualcosa <br />
          altrimenti se <i>condizione2 <i><br />
          &nbsp;fai qualcos'altro <br />
          altrimenti <br />(fai altro ancora) <br />

          <code>
          if(mese == 12):<br />
          &nbsp;print("Mese di dicembre")<br />
          elif(mese == 1):<br />
          &nbsp;print("Mese di gennaio")<br />
          else:<br />
          &nbsp;print("Non è dicembre né gennaio")
          </code>
        </p>

        </div>
    </div>
  </div>

  <div class="b-divider"></div>
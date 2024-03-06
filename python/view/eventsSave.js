$(document).ready(function(){
    
     // genera un id casuale da collegare ad ogni utente
    function sessionCheck(){
        // this.enterTime = new Date();
       
        if (sessionStorage.getItem('sessionID') == '' || sessionStorage.getItem('sessionID') == null) {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for (var i = 0; i < 150; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));
                sessionStorage.setItem('sessionID', text);
            // console.log(sessionStorage.getItem('sessionID')); // debug
        }
    }

    // salva l'ingresso alla pagina
    function savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu) 
    {
        var params = {'action':'event_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'pagePara': pagePara, 'event':event, 'duration':duration, 'lang':lang, 'pageTitle':pageTitle, 'pageMenu':pageMenu};
        $.post('./controller/eventsSave.php', params, function(data)
        {
            // console.log("Params:" + params); // debug
            // console.log("Data:" + data); // debug
            if (data==1)
            {
                console.log("Saving event...OK! " + "Event: " + event + " | " + "Para: " + pagePara);
            }
            else
            {
                console.log("Saving event...ERROR! " + "Event: " + event + " | " + "Para: " + pagePara);
            }
                
        }); // fine post
    }

    // MAIN

    var enterTime = new Date();

    sessionCheck();

    var sessionID = sessionStorage.getItem('sessionID');
    
    var pagePara = "00"; // sequential point inside a single page: 00 (entire page), 01 (paragrafo01), 02 (paragrafo02), etc.
    
    var event = 'ingressoPagina';
    
    var duration = 0;

    var prevParagraph = ""; // previous paragraph

    var nPar = ""; // actual paragraph

    // 1) save page
    savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);

    // (mouseover)="saveTrack('paragrafo10','mouseOver')" (mouseout)="saveTrack('paragrafo10','mouseOut')" (mouseenter)="saveTrack('paragrafo10','mouseEnter')" (drag)="saveTrack('paragrafo10','drag')" (click)="saveTrack('paragrafo10','click')"

    // 2) save para

    // counts the event repetitions in a dictionary
    var paraCounterMouseOver = {"paragrafo-01": 0, "paragrafo-02": 0, "paragrafo-03": 0, "paragrafo-04": 0, "paragrafo-05": 0};
    var paraCounterMouseOut = {"paragrafo-01": 0, "paragrafo-02": 0, "paragrafo-03": 0, "paragrafo-04": 0, "paragrafo-05": 0};
    var paraCounterMouseEnter = {"paragrafo-01": 0, "paragrafo-02": 0, "paragrafo-03": 0, "paragrafo-04": 0, "paragrafo-05": 0};
    var paraCounterClick = {"paragrafo-01": 0, "paragrafo-02": 0, "paragrafo-03": 0, "paragrafo-04": 0, "paragrafo-05": 0};
    var paraCounterDbClick = {"paragrafo-01": 0, "paragrafo-02": 0, "paragrafo-03": 0, "paragrafo-04": 0, "paragrafo-05": 0};

    $("#paragrafo-01, #paragrafo-02, #paragrafo-03, #paragrafo-04").mouseover(function(){
        nPar = this.id; // paragraph name (this.id return the id in which the event has been created without #)
        paraCounterMouseOver[nPar]+=1;
        console.log("MouseOver (" + paraCounterMouseOver[nPar] + "): " + nPar); 

        const parts = nPar.split("-");
        let pagePara = parts[1]; // get the paragraph number (01, 02, etc.)
        
        if (nPar !== this.prevParagraph && paraCounterMouseOver[nPar] == 1) {  // se il paragrafo è diverso dal precedente ed è la prima volta salva l'evento, altrimenti no
            var event = 'mouseover';
            savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
            prevParagraph = nPar;
        }
    });

    $("#paragrafo-01, #paragrafo-02, #paragrafo-03, #paragrafo-04").mouseout(function(){
        nPar = this.id; // paragraph name (this.id return the id in which the event has been created without #)
        paraCounterMouseOut[nPar]+=1;
        console.log("MouseOut (" + paraCounterMouseOut[nPar] + "): " + nPar); 

        const parts = nPar.split("-");
        let pagePara = parts[1]; // get the paragraph number (01, 02, etc.)
        
        if (nPar !== this.prevParagraph && paraCounterMouseOut[nPar] == 1) {  // se il paragrafo è diverso dal precedente ed è la prima volta salva l'evento, altrimenti no
            var event = 'mouseout';
            savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
            prevParagraph = nPar;
        }
    });

    $("#paragrafo-01, #paragrafo-02, #paragrafo-03, #paragrafo-04").mouseenter(function(){
        nPar = this.id; // paragraph name (this.id return the id in which the event has been created without #)
        paraCounterMouseEnter[nPar]+=1;
        console.log("MouseEnter (" + paraCounterMouseEnter[nPar] + "): " + nPar); 

        const parts = nPar.split("-");
        let pagePara = parts[1]; // get the paragraph number (01, 02, etc.)
        
        if (nPar !== this.prevParagraph && paraCounterMouseEnter[nPar] == 1) {  // se il paragrafo è diverso dal precedente ed è la prima volta salva l'evento, altrimenti no
            var event = 'mouseenter';
            savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
            prevParagraph = nPar;
        }
    });

    $("#paragrafo-01, #paragrafo-02, #paragrafo-03, #paragrafo-04").click(function(){
        nPar = this.id;
        paraCounterClick[nPar]+=1;
        console.log("Click (" + paraCounterClick[this.id] + "): " + this.id);
        
        const parts = nPar.split("-");
        let pagePara = parts[1];

        if (nPar !== this.prevParagraph && paraCounterClick[nPar] == 1) {
            var event = 'click';
            savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
            prevParagraph = nPar;
        }
    });

    $("#paragrafo-01, #paragrafo-02, #paragrafo-03, #paragrafo-04").dblclick(function(){
        nPar = this.id;
        paraCounterDbClick[nPar]+=1;
        console.log("Click (" + paraCounterDbClick[this.id] + "): " + this.id);
        
        const parts = nPar.split("-");
        let pagePara = parts[1];

        if (nPar !== this.prevParagraph && paraCounterDbClick[nPar] == 1) {
            var event = 'dbclick';
            savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
            prevParagraph = nPar;
        }
    });

    $("#btnNext").click(function(){
        //calcolo la durata su ogni singola pagina e salvo su DB
        let timespan = new Date().getTime() - enterTime.getTime();
        var milliseconds = Math.floor((timespan % 1000) / 100),
        seconds = Math.floor((timespan / 1000) % 60),
        minutes = Math.floor((timespan / (1000 * 60)) % 60),
        hours = Math.floor((timespan / (1000 * 60 * 60)) % 24);
        var event = 'uscitaPagina';
        var duration = minutes + ':' + seconds;
        savePage(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
    });


}); // fine ready()
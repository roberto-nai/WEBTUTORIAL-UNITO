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
    function pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu)
    {
        var params = {'action':'event_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'pagePara': pagePara, 'event':event, 'duration':duration, 'lang':lang, 'pageTitle':pageTitle, 'pageMenu':pageMenu};
        // console.log("Params: \n"); // debug
        // console.log(params); // debug
        $.post('./controller/eventsSave.php', params, function(data)
        {
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

    // salva la risposta
    function surveySave()
    {
        var datastring = $("#survey_form").serialize();

        // var params = {'action':'survey_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'answerNum':answerNum, 'answerCorrect':answerCorrect, 'lang':lang};
        // console.log("Params: \n"); // debug
        // console.log(params); // debug
        $.post('./controller/eventsSave.php', datastring, function(data)
        {
            // console.log("Data:" + data); // debug
            if (data==1)
            {
                console.log("Saving event...OK! " + "Event: surveySave" + " | " + "Page: " + pageName);
                $("#survey_form :input").attr("disabled", true); // disable the form elements
                quizFeedback(1);
            }
            else
            {
                console.log("Saving event...ERROR! " + "Event: surveySave" + " | " + "Page: " + pageName);
                quizFeedback(2);
            }
                
        }); // fine post
    }

    function quizFeedback(case_feedback)
    {
        if (case_feedback == 0){
            $( "#answer_correct").hide();
            $( "#answer_wrong").hide();
            $( "#answer_empty").hide();
        }
        if (case_feedback == 1){
            $( "#answer_correct").show();
            $( "#answer_wrong").hide();
            $( "#answer_empty").hide();
        }
        if (case_feedback == 2){
            $( "#answer_correct").hide();
            $( "#answer_wrong").show();
            $( "#answer_empty").hide();
        }
        if (case_feedback == 3){
            $( "#answer_correct").hide();
            $( "#answer_wrong").hide();
            $( "#answer_empty").show();
        }
    }

    function saveData()
    {
        //calcolo la durata su ogni singola pagina e salvo su DB
        let timespan = new Date().getTime() - enterTime.getTime();
        var milliseconds = Math.floor((timespan % 1000) / 100),
        seconds = Math.floor((timespan / 1000) % 60),
        minutes = Math.floor((timespan / (1000 * 60)) % 60),
        hours = Math.floor((timespan / (1000 * 60 * 60)) % 24);
        var event = 'uscitaPagina';
        var duration = minutes + ':' + seconds;
        pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
        surveySave();
    }


    // MAIN

    quizFeedback(0);

    var enterTime = new Date();

    sessionCheck();

    var sessionID = sessionStorage.getItem('sessionID');
    
    var pagePara = "00"; // sequential point inside a single page: 00 (entire page), 01 (paragrafo01), 02 (paragrafo02), etc.
    
    var event = 'ingressoPagina';
    
    var duration = 0;

    // set the hidden (for serializing)

    $("#projectID").val(projectID);
    $("#sessionID").val(sessionID);
    $("#lang").val(lang);
    $("#menu").val(pageMenu);

    $("#survey_form").submit(function(e) // avoid page refresh after submit
    {
        e.preventDefault();
    });

    $('form').on('submit', saveData); // function to be executed onsubmit
   

     // 1) save page
    pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);

    /*
    $("#btnSubmit").click(function(){
        //calcolo la durata su ogni singola pagina e salvo su DB
        let timespan = new Date().getTime() - enterTime.getTime();
        var milliseconds = Math.floor((timespan % 1000) / 100),
        seconds = Math.floor((timespan / 1000) % 60),
        minutes = Math.floor((timespan / (1000 * 60)) % 60),
        hours = Math.floor((timespan / (1000 * 60 * 60)) % 24);
        var event = 'uscitaPagina';
        var duration = minutes + ':' + seconds;
        pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang);
        surveySave();
    });
    */

    //2024-02-16: link to google form
    var url = google_form + sessionStorage.getItem('sessionID');
    var linkText = ">> INIZIA IL QUESTIONARIO DI GRADIMENTO <<";

    // Creazione del link dinamico
    var link = $("<a style=\"font-size: 28px;\">")
        .attr("href", url)
        .attr("target", google_form_target)
        .text(linkText);

    // Aggiunta del link al contenitore desiderato
    $("#googleContainer").append(link);

}); // fine ready()
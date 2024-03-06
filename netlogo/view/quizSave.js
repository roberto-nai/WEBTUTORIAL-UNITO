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
    function pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang)
    {
        var params = {'action':'event_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'pagePara': pagePara, 'event':event, 'duration':duration, 'lang':lang};
        console.log("Params: \n"); // debug
        console.log(params); // debug
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
    function quizSave(projectID, sessionID, pageName, pageOrder, answerNum, answerCorrect, lang)
    {
        var params = {'action':'quiz_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'answerNum':answerNum, 'answerCorrect':answerCorrect, 'lang':lang};
        // console.log("Params: \n"); // debug
        // console.log(params); // debug
        $.post('./controller/eventsSave.php', params, function(data)
        {
            // console.log("Data:" + data); // debug
            if (data==1)
            {
                console.log("Saving event...OK! " + "Event: quizSave" + " | " + "Page: " + pageName);
            }
            else
            {
                console.log("Saving event...ERROR! " + "Event: quizSave" + " | " + "Page: " + pageName);
            }
                
        }); // fine post
    }


    function quizCheck(pageLevel, answer)
    {
        var params = {'action':'quiz_check', 'page_level':pageLevel, 'answer':answer};
        // console.log("Params: \n"); // debug
        // console.log(params); // debug
        $.post('./controller/eventsSave.php', params, function(data)
        {
            // console.log("Data:" + data); // debug
            if (data==1)
            {
                $('#btnNext').prop('disabled', false);
                $string = "./page-"+ "0" + (parseInt(pageLevel)+1).toString() + ".php";
                $('#aNext').attr("href", $string);
                $('#btnSubmit').prop('disabled', true);
                $('input[name="quizRadios"]').prop('disabled', true);
                console.log("Quiz check...CORRECT answer! " + "Event: quizCheck" + " | " + "Para: " + pagePara);
                quizFeedback(1);
                quizSave(projectID, sessionID, pageName, pageOrder, answer, 1, lang);
            }
            else
            {
                $('#btnNext').prop('disabled', true);
                $('#aNext').attr("href", "#");
                console.log("Quiz event...WRONG answer! " + "Event: quizCheck" + " | " + "Para: " + pagePara);
                quizFeedback(2);
                quizSave(projectID, sessionID, pageName, pageOrder, answer, 0, lang);
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

    // MAIN

    $('#btnNext').prop('disabled', true);

    quizFeedback(0);

    var enterTime = new Date();

    sessionCheck();

    var sessionID = sessionStorage.getItem('sessionID');
    
    var pagePara = "00"; // sequential point inside a single page: 00 (entire page), 01 (paragrafo01), 02 (paragrafo02), etc.
    
    var event = 'ingressoPagina';
    
    var duration = 0;

     // 1) save page
    pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang);

    $("#btnSubmit").click(function(){
        var radioValue = $("input[name='quizRadios']:checked").val(); // get the value of selected radio
        if(radioValue){
            console.log("Answer n.: " + radioValue);
            quizCheck(pageLevel, parseInt(radioValue));
        }
        else{
            quizFeedback(3);
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
        pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang);
    });

}); // fine ready()
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
    function quizSave(projectID, sessionID, pageName, pageOrder, answerNum, answerCorrect, lang, pageTitle, pageMenu)
    {
        var params = {'action':'quiz_save', 'projectID':projectID, 'sessionID':sessionID, 'pageName':pageName, 'pageOrder':pageOrder, 'answerNum':answerNum, 'answerCorrect':answerCorrect, 'lang':lang, 'pageTitle':pageTitle, 'pageMenu':pageMenu};
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


    function quizCheck(pageLevel, answer, quiz_mandatory, pageNext, pageName)
    {
        var params = {'action':'quiz_check', 'page_level':pageLevel, 'answer':answer, 'quiz_mandatory': quiz_mandatory, 'page_name':pageName};
        // console.log("Params: \n"); // debug
        // console.log(params); // debug
        $.post('./controller/eventsSave.php', params, function(data)
        {
            
            /*
            if (parseInt(pageLevel)+1 >= 10)
            {
                $string = "./page-" + (parseInt(pageLevel)+1).toString() + ".php";
            }
            else
            {
                $string = "./page-"+ "0" + (parseInt(pageLevel)+1).toString() + ".php";
            }
            */
            
            // console.log("Data:" + data); // debug
            if (data==1)
            {
                $('#btnNext').prop('disabled', false);
                $('#aNext').attr("href", pageNext);
                $('#btnSubmit').prop('disabled', true);
                $('input[name="quizRadios"]').prop('disabled', true);
                console.log("Quiz check...CORRECT answer! " + "Event: quizCheck" + " | " + "Para: " + pagePara);
                quizFeedback(1);
                quizSave(projectID, sessionID, pageName, pageOrder, answer, 1, lang, pageTitle, pageMenu);
            }
            else
            {
                $('#btnSubmit').prop('disabled', true);
                $('input[name="quizRadios"]').prop('disabled', true);
                if (quiz_mandatory == 1)
                {
                    // $('#btnNext').prop('disabled', true);
                    // $('#aNext').attr("href", "#");
                    // 18/02/2023: also if mandatory the next is clickable
                    $('#btnNext').prop('disabled', false);
                    $('#aNext').attr('href', pageNext);
                }
                else
                {
                    $('#btnNext').prop('disabled', false);
                    $('#aNext').attr("href", pageNext);
                }
                console.log("Quiz event...WRONG answer! " + "Event: quizCheck" + " | " + "Para: " + pagePara);
                quizFeedback(2);
                quizSave(projectID, sessionID, pageName, pageOrder, answer, 0, lang, pageTitle, pageMenu);
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

    // $('#btnNext').prop('disabled', true);
    if (quiz_mandatory == 1)
    {
        $('#btnNext').prop('disabled', true);
    }
    else
    {
        $('#btnNext').prop('disabled', false);
        /*
        if (parseInt(pageLevel)+1 >= 10)
        {
            $string = "./page-" + (parseInt(pageLevel)+1).toString() + ".php";
        }
        else
        {
            $string = "./page-"+ "0" + (parseInt(pageLevel)+1).toString() + ".php";
        }
        */
        $('#aNext').attr("href", pageNext);
    }

    quizFeedback(0);

    var enterTime = new Date();

    sessionCheck();

    var sessionID = sessionStorage.getItem('sessionID');
    
    var pagePara = "00"; // sequential point inside a single page: 00 (entire page), 01 (paragrafo01), 02 (paragrafo02), etc.
    
    var event = 'ingressoPagina';
    
    var duration = 0;

     // 1) save page
    pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);

    $("#btnSubmit").click(function(){
        var radioValue = $("input[name='quizRadios']:checked").val(); // get the value of selected radio
        if(radioValue){
            console.log("Answer n.: " + radioValue);
            quizCheck(pageLevel, parseInt(radioValue), quiz_mandatory, pageNext, pageName);
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
        pageSave(projectID, sessionID, pageName, pageOrder, pagePara, event, duration, lang, pageTitle, pageMenu);
        // quizCheck(pageLevel, 0, quiz_mandatory, pageNext, pageName); // check the quiz with answer 0 (in case of not mandatory quiz)
    });

}); // fine ready()
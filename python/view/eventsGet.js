$(document).ready(function(){


    function renderTableEvents(data){

        var count = 0; // numero di righe estratte (visualizzate)
		var table = $("<table id=\"tblData\" class=\"display\" style=\"width:100%\">");
		// table.append("<thead><tr><th>Event ID (db)</th><th>Project ID</th><th>Session ID</th><th>Language</th><th>Page file</th><th>Page order</th><th>Paragraph</th><th>Event</th><th>Duration</th><th>Timestamp</th></thead>");
        table.append("<thead><tr><th>Event ID (db)</th><th>Session ID</th><th>Language</th><th>File</th><th>Title</th><th>Order</th><th>Paragraph</th><th>Event</th><th>Duration</th><th>Timestamp</th></thead>");
		table.append("<tbody>");
		var tr;
        $.each(data, function(i, row)
			{
				if (row!=null)
				{
					tr = $("<tr>");
					tr.append("<td style=\"text-align: center; width: 10%;\">" + row.idEvent + "</td>");
					// tr.append("<td style=\"text-align: center;\">" + row.projectID + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.sessionIDMin + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lang + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageName + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageTitle + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageOrder + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pagePara + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.event + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.duration + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lastUpdate + "</td>");
					tr.append("</tr>");
					table.append(tr);
					count++;
				}
			}); // fine each()
		table.append("</tbody>");
		table.append("</table>");
		$("#tableRes").html(table);
        $("#tableLen").html(count);

        $('#tblData').DataTable({
            "paging":   true,
            "pageLength": 100,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
            "info":     true,
            // "order": [[ 0, "asc" ], [ 1, "asc" ]],
            "order": [ 0, "desc" ]
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }); // fine DataTable

    }

    function renderTableQuiz(data)
    {

        var count = 0; // numero di righe estratte (visualizzate)
		var table = $("<table id=\"tblData\" class=\"display\" style=\"width:100%\">");
	    table.append("<thead><tr><th>Event ID (db)</th><th>Session ID</th><th>Language</th><th>File</th><th>Title</th><th>Order</th><th>Answer</th><th>Correct?</th><th>Timestamp</th></thead>");
		table.append("<tbody>");
		var tr;
        $.each(data, function(i, row)
			{
				if (row!=null)
				{
					tr = $("<tr>");
					tr.append("<td style=\"text-align: center; width: 10%;\">" + row.idEvent + "</td>");
					// tr.append("<td style=\"text-align: center;\">" + row.projectID + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.sessionIDMin + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lang + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageName + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageTitle + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.pageOrder + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer + "</td>");
                    if (row.answerCorrect == 0)
                        tr.append("<td style=\"text-align: center;\" class = \"quiz_wrong\">" + row.answerCorrect + "</td>");
                    else
                    tr.append("<td style=\"text-align: center;\" class = \"quiz_correct\">" + row.answerCorrect + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lastUpdate + "</td>");
					tr.append("</tr>");
					table.append(tr);
					count++;
				}
			}); // fine each()
		table.append("</tbody>");
		table.append("</table>");
		$("#tableRes").html(table);
        $("#tableLen").html(count);

        $('#tblData').DataTable({
            "paging":   true,
            "pageLength": 100,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
            "info":     true,
            // "order": [[ 0, "asc" ], [ 1, "asc" ]],
            "order": [ 0, "desc" ]
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }); // fine DataTable
    }

    function renderTableSurvey(data)
    {

        var count = 0; // numero di righe estratte (visualizzate)
		var table = $("<table id=\"tblData\" class=\"display\" style=\"width:100%\">");
	    table.append("<thead><tr><th>Event ID (db)</th><th>Session ID</th><th>Language</th><th>A 1</th><th>A 2</th><th>A 3</th><th>A 4</th><th>A 5</th><th>A 6</th><th>A 7</th><th>A 8</th><th>A 9</th><th>A 10</th><th>A 11</th><th>Timestamp</th></thead>");
		table.append("<tbody>");
		var tr;
        $.each(data, function(i, row)
			{
				if (row!=null)
				{
					tr = $("<tr>");
					tr.append("<td style=\"text-align: center; width: 10%;\">" + row.idSurvey + "</td>");
					// tr.append("<td style=\"text-align: center;\">" + row.projectID + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.sessionIDMin + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lang + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_1 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_2 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_3 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_4 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_5 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_6 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_7 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_8 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_9 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_10 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.answer_11 + "</td>");
                    tr.append("<td style=\"text-align: center;\">" + row.lastUpdate + "</td>");
					tr.append("</tr>");
					table.append(tr);
					count++;
				}
			}); // fine each()
		table.append("</tbody>");
		table.append("</table>");
		$("#tableRes").html(table);
        $("#tableLen").html(count);

        $('#tblData').DataTable({
            "paging":   true,
            "pageLength": 100,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
            "info":     true,
            // "order": [[ 0, "asc" ], [ 1, "asc" ]],
            "order": [ 0, "desc" ]
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }); // fine DataTable

    }

    function loadEvents(table, projectID)
    {
        if (table == "")
        {
            action = "event_get";
        }
        
        if (table == "events")
        {
            action = "event_get";
        }
            
        if (table == "quiz")
        {
            action = "quiz_get";
        }
            
        if (table == "survey")
        {
            action = "survey_get";
        }
            
        params = {'action':action, 'project_id':projectID};

        // console.log("Params:");
        // console.log(params); // debug

        $.post("../controller/eventsGet.php", params, function(data, status)
        {
            if (status=="success" && action == "event_get") 
            {
                // console.log(data); // debug
                renderTableEvents(data);
                // console.log(data);
            }
            if (status=="success" && action == "quiz_get") 
            {
                renderTableQuiz(data);
                // console.log(data);
            }
            if (status=="success" && action == "survey_get") 
            {
                renderTableSurvey(data);
                // console.log(data);
            }
            
            if (status!="success") 
            {
                alert("Errore in loadEvents()!");
            }
        }, "json");
    }

    // MAIN

    $("#projectID").html(projectID);
    $("#projectname").html(projectName);

    loadEvents("",projectID);

     $("#table_db").change(function(){
        table_db = this.value; // get the selected value and store to the global variable table_db
        console.log(table_db); // debug
        loadEvents(table_db, projectID);
    });

    $("#imgCSV").click(function()
    {
        if (table_db == "events")
        {
            window.open('eventsCSV.php', '_blank');
        }

        if (table_db == "quiz")
        {
            window.open('quizCSV.php', '_blank');
        }

        if (table_db == "survey")
        {
            window.open('surveyCSV.php', '_blank');
        }
        
     })
    

}); // fine ready()
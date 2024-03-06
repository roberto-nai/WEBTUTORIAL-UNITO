<?php

    include "../settings.php";

    include "../model/connectDB.php";

    $table = "survey";

	$query = "SELECT * ";
	$query .= "FROM survey ";
	$query .= "WHERE projectID = ? ";
	$query .= "ORDER BY idSurvey DESC;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$project_id]);
	// $results = $stmt->fetchAll(); 
	// $json = json_encode($results, JSON_INVALID_UTF8_SUBSTITUTE); // json_encode trasforma le righe estratte in json
	// echo $json;
	
    // CSV
    $delimiter = ";"; 
    $filename = $project_id ."_" . $project_name. "_log_". $table ."_". date('Y-m-d_h-i-s') . ".csv"; 
	
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    
    // Set column headers 
    $fields = array('idSurvey', 'projectID', 'sessionID', 'lang', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'answer_5', 'answer_6', 'answer_7', 'answer_8', 'answer_9', 'answer_10', 'answer_11', 'lastUpdate'); 
    fputcsv($f, $fields, $delimiter); 

    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $lineData = array($row['idSurvey'], $row['projectID'], $row['sessionID'], $row['lang'], $row['answer_1'], $row['answer_2'], $row['answer_3'], $row['answer_4'], $row['answer_5'], $row['answer_6'], $row['answer_7'], $row['answer_8'], $row['answer_9'], $row['answer_10'], $row['answer_11'], $row['lastUpdate']);
        fputcsv($f, $lineData, $delimiter); 
    } 

    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 

    exit

?>
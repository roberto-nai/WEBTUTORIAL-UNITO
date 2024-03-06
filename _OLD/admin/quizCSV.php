<?php

    include "../settings.php";

    include "../model/connectDB.php";

    $table = "quiz";

	$query = "SELECT * ";
	$query .= "FROM quiz ";
	$query .= "WHERE projectID = ? ";
	$query .= "ORDER BY idEvent DESC;";
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
    $fields = array('idEvent', 'projectID', 'sessionID', 'lang', 'pageName', 'pageTitle', 'pageOrder', 'answer', 'answerCorrect', 'lastUpdate'); 
    fputcsv($f, $fields, $delimiter); 

    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $lineData = array($row['idEvent'], $row['projectID'], $row['sessionID'], $row['lang'], $row['pageName'], $row['pageTitle'], $row['pageOrder'], $row['answer'], $row['answerCorrect'], $row['lastUpdate']);
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
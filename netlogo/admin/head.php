<?php
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NetLogo Tutorial</title>
  <link rel="icon" type="image/x-icon" href="../../favicon.ico">
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/css/style.css" rel="stylesheet">
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../assets/DataTables/datatables.min.css"/>
  <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>
  <script type="text/javascript">
      var projectID = "<?php echo $project_id;?>";
      var projectName = "<?php echo $project_name;?>";
      var table_db = "events"; // default table for data retrieving
  </script>

<style> 
.quiz_correct {background: #98FB98;} 
.quiz_wrong {background: #FF5733;} 
</style>

</head>
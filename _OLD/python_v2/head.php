<?php
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $project_name;?> Tutorial</title>
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript">
      var projectID = "<?php echo $project_id;?>";
      var pageName = "<?php echo $page_name;?>";
      console.log("Project ID: "+ projectID);
      console.log("Page name: "+ pageName);
      // const splitParts1 = pageName.split("-");
      // const splitParts2 = splitParts1[1].split(".");
      // pageOrder: sequential number of the page: 01, 02, 03, etc.
      // var pageOrder = splitParts2[0]; // get the page number (page-01.php -> 01, etc.) 
      var pageOrder = "<?php echo $page_order;?>"; // get the page number (page-01.php -> 01, etc.) 
      console.log("Page order: "+ pageOrder.toString());
      var pageLevel = "<?php echo $page_level;?>";
      console.log("Page level: "+ pageLevel.toString());
      var lang = "<?php echo $lang;?>";
      console.log("Language: "+ lang.toString());
      var quiz_mandatory = "<?php echo $quiz_mandatory;?>";
      console.log("Quiz mandatory: "+ quiz_mandatory.toString());
  </script>
</head>
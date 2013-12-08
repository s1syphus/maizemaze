<!DOCTYPE html>

<!--


	This is where you can delete/edit questions or whatever


-->

<html>

<head>

<title> Check the questions </title>

<link type="text/css" rel="stylesheet" href="css/mainSS.css">
<link type="text/css" rel="stylesheet" href="css/subSS.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

<?php include("header.php"); ?>

<div id="content">
  <div id="cHeader">
	<h2> Questions are displayed below </h2>
  </div>
<?php 


   // connects to mysql server 
   $db = mysql_connect("localhost", "root", "root");

   // variable for the db name 
   $db_name = "maizeMazeQuestions";

   // attempt to access the db 
   mysql_select_db($db_name, $db);

   // error check 
   if(!mysql_select_db($db_name, $db)){
   die('Database not found!');
   }

   // variable for the sql query 
   $query = sprintf("SELECT * FROM questions ORDER BY subject ASC");

   // results variable for the sql query 
   $result = mysql_query($query);
   
   // error check 
   if(!$result) {
   $message = 'Invalid query: ' . mysql_error() . "\n";
   $message .= 'Whole query: ' . $query;
   die($message);
   }

   // display results 
   while ($row = mysql_fetch_assoc($result)){
   echo $row['subject'];
   echo "<br>";
   echo $row['question'];
   echo "?";
   echo "<br>";
   echo $row['ansCorrect'];
   echo " : ";
   echo $row['ans2'];
   echo " : ";
   echo $row['ans3'];
   echo " : ";
   echo $row['ans4'];
   echo "<br>";
   echo "<br>";
   }
 
   mysql_free_result($result);

?>

	<form method="link" action="index.php">
		<input type="submit" value="Back to main menu"/>
	</form>
</div>
<?php include("footer.php"); ?>
</body>

</html>

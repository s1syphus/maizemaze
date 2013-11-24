<!DOCTYPE html>

<!--


	This is where you can delete/edit questions or whatever


-->

<html>

<head>

<title> Check the questions </title>

</head>

<body>


	<h2> Questions are displayed below </h2>

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
   $query = sprintf("SELECT * FROM questions");

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
   echo $row['question'];
   echo "?";
   echo "<br>";
   echo $row['correctAns'];
   echo " : ";
   echo $row['wrongAns1'];
   echo " : ";
   echo $row['wrongAns2'];
   echo " : ";
   echo $row['wrongAns3'];
   echo "<br>";
   echo "<br>";

   }
 
   mysql_free_result($result);

?>

	<form method="link" action="index.html">
		<input type="submit" value="Back to main menu"/>
	</form>

</body>

</html>

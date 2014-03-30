<?php
  header('refresh:1; ' . $_SERVER['HTTP_REFERER']);
?>

<?php

   $qArr = array();
   foreach($_POST as $name => $value) {
      array_push($qArr, $value);
   }

   //print_r($qArr); //for testing
	
   //This will be inserted into it's own php-----
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
   //This will be inserted into it's own php-----End

   //column names for now is id, question, ansCorrect, ans2, ans3, ans4, subject, level, corAttempts, attempts //subject, level, corAttempts, attempts are ignored for now
   $qListArr = array(array("id", "question", "ansCorrect", "ans2", "ans3", "ans4", "subject", "level", "corAttempts", "attempts"));

   //get the last id
   $lastId = 0;
   while ($row = mysql_fetch_assoc($result)){
   	 $lastId = $row['id'];
   }
   $lastId += 1;


   $query = "INSERT INTO questions (id, question, ansCorrect, ans2, ans3, ans4, subject, level, corAttempts, attempts) VALUES ('$lastId','$_POST[questionEntered]', '$_POST[correctAnswer]', '$_POST[wrongAnswer1]', '$_POST[wrongAnswer2]', '$_POST[wrongAnswer3]', '$_POST[subject]', '$_POST[level]', 0, 0)";

   mysql_query($query);

   echo "1 record added"; 

?>
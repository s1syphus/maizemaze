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

   $query = "DELETE FROM questions WHERE id='$_POST[editId]'";

   mysql_query($query);

   echo "1 record deleted"; 

?>
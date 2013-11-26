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

   $columnCheck= 0;
   foreach ($qListArr as $colName){
   	   if(strcmp($colName, $_POST[editColumn]) == 0)
	   	      $columnCheck=1;
   }

   if($columnCheck != 1){
   	echo "Column name not found";
   } else {
     //check id

     $idCheck = 0;

     while ($row = mysql_fetch_assoc($result)){
   	 $idNum = $row['id'];
/*
	 echo $idNum;
	 echo " ";
	 echo $_POST[editId];
	 echo "<br>";
*/
	 if(intval($idNum) == intval($_POST[editId])){
	 	$idCheck = 1;
	 }
     }
     //echo $idCheck;
     //echo "<br>";
     if($idCheck != 1){
     		echo "Question ID not found";
     } else {

          $query = "UPDATE questions SET ".$_POST[editColumn]."='$_POST[editChange]' WHERE id='$_POST[editId]'";
/*
       	  echo $_POST[editChange];
	  echo "<br>";
       	  echo $query;
	  echo "<br>";
*/
	  mysql_query($query);

	  echo "entry has been edited"; 
     }
   }

?>
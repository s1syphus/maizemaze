<?php

	$qArr = array();
	foreach($_POST as $name => $value) {
		array_push($qArr, $value);
/*
		echo $name;
		echo " : ";
		echo $value;
		echo "<br>";
*/
	}
	//print_r($qArr);
	
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

   //column names for now is id, question, correctAns, wrongAns1, wrongAns2, wrongAns3
   $qListArr = array(array("id", "question", "correctAns", "wrongAns1", "wrongAns2", "wrongAns3"));

   $lastId = 0;
   while ($row = mysql_fetch_assoc($result)){
   	 $lastId = $row['id'];
   }
$lastId += 1;

$query = "INSERT INTO questions (id, question, correctAns, wrongAns1, wrongAns2, wrongAns3, level) VALUES ('$lastId','$_POST[questionEntered]', '$_POST[correctAnswer]', '$_POST[wrongAnswer1]', '$_POST[wrongAnswer2]', '$_POST[wrongAnswer3]', 0)";

mysql_query($query);

/*
if (!mysqli_query($db, $query)){
   die('Error: ' . mysqli_error($db));
   }
*/
   echo "1 record added";	

?>
<!DOCTYPE html>

<html>

<head>

<title>You're not suppose to be here</title>

</head>

<body>

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

   // getting results

   //column names for now is id, question, correctAns, wrongAns1, wrongAns2, wrongAns3
   $qListArr = array(array("id", "question", "correctAns", "wrongAns1", "wrongAns2", "wrongAns3"));

   while ($row = mysql_fetch_assoc($result)){
   //$qArr = array($row['id']);
   echo $row['id'];
   echo ',';

   //array_push($qArr, $row['question']);
   echo $row['question'];
   echo ',';

   //array_push($qArr, $row['ansCorrect']);
   echo $row['ansCorrect'];
   echo ',';

   //array_push($qArr, $row['ans2']);
   echo $row['ans2'];
   echo ',';

   //array_push($qArr, $row['ans3']);
   echo $row['ans3'];
   echo ',';

   //array_push($qArr, $row['ans4']);
   echo $row['ans4'];
   echo ',';

   //array_push($qListArr, $qArr);
   echo $row['subject'];
   echo ',';

   echo $row['level'];
   echo ',';

   echo $row['corAttempts'];
   echo ',';

   echo $row['attempts'];
   echo ',';
   }

   

   //print_r($qListArr);

   //$jsonVar = json_encode($qListArr);

   print_r($jsonVar);

   mysql_free_result($result);

?>

</body>

</html>

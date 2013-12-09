<!DOCTYPE html>

<!--

	This is where the magic happens (not really but I'm not in charge of the php/DB stuff.

	-Mike

	-->


<html>

<head>

<title> Enter Questions </title>

<link type="text/css" rel="stylesheet" href="css/mainSS.css">
<link type="text/css" rel="stylesheet" href="css/enterQSS.css">
<link type="text/css" rel="stylesheet" href="css/subSS.css">
<!-- <link href="css/styles-mediaquery-reporter.css" rel="stylesheet"> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>


<?php include("header.php"); ?>

<body>
<div id="content">
	<div id="cHeader">
		<h2> Enter Questions </h2>
	</div>

<form method="post"
      enctype="application/x-www-form-urlencode"
      action="addToDB.php"
      name="WSORform" novalidate>

		<fieldset>
			<!--Add alignment stuff soon-->

			<label>Subject:</label>
			<input type="text" style="width:30%;" name="subject"
				placeholder="Subject" required>

			<label>Difficulty Level (1-120):</label>
			<input type="number" style="width:10%;" name="level"
			       placeholder="1" min="1" max="120" required>

			<br>

			<label>Question:</label>
			<input type="text" name="questionEntered"
				placeholder="Type your question" required>

				<br>
			<label>Correct Answer:</label>
			<input type="text" name="correctAnswer"
				placeholder="Enter Correct answer" required>
				<br>
			<label>Wrong Answer 1:</label>
			<input type="text" name="wrongAnswer1"
				placeholder="Enter possible answer" required>
				<br>
			<label>Wrong Answer 2:</label>
			<input type="text" name="wrongAnswer2"
				placeholder="Enter possible answer" required>
				<br>
			<label>Wrong Answer 3:</label>
			<input type="text" name="wrongAnswer3"
				placeholder="Enter possible answer" required>
				<br>
		</fieldset>
		<input type="submit" value="Add the question"/>
</form>

<form method="link" action="index.php">
  <input type="submit" value="Return to the Main Menu"/>
</form>
</div>
<?php include("footer.php"); ?>

</body>

</html>

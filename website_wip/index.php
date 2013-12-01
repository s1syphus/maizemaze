<!DOCTYPE html>

<!--

	Mockup of the web question interface

	My html is probably terrible, I'll fix it up later. I have a few pages linking together just for organizational purposes. We should discuss the right way to do things soon.

	Click on the Add questions button to see the interface we discussed, it's messy but I think it looks roughly the way it should

	-Mike
	

-->



<html>

<head>

<title>Maize Maze Web</title>

<link type="text/css" rel="stylesheet" href="css/mainSS.css">
<link type="text/css" rel="stylesheet" href="css/styles-mediaquery-reporter.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
/*----------------------------------------New Code Miguel*/
$(document).ready(function(){

//$(".mButton").delay(400).slideToggle();

});

/*----------------------------------------New Code Miguel end*/


</script>


</head>

<body>

<!-- header -->
<?php include("header.php"); ?>

<!--  <h1> Welcome to MaizeMaze's Web Interface </h1> -->

<img src="images/maizeMazeLogoB.jpg" />
<br>

<a href="enterQuestions.php">
<div class="mButton">
  <p>Add Questions to the Database</p>
</div>
</a>

<a href="examineQuestions.php">
<div class="mButton">
  <p>Examine Database Questions</p>
</div>
</a>

<a href="editDB.php">
<div class="mButton">
  <p>Edit Database Questions</p>
</div>
</a>

<a href="prettyAnalytics.php">
<div class="mButton">
  <p>Analytical Data</p>
</div>
</a>

<!--
<form method="link" action="enterQuestions.php">
<input type="submit" value="Add Questions to Database"/>
</form>

<form method="link" action="examineQuestions.php">
	<input type="submit" value="Examine Database Questions"/>
</form>

<form method="link" action="editDB.php">
	<input type="submit" value="Edit The Database Questions"/>
</form>

<form method="link" action="prettyAnalytics.php">
	<input type="submit" value="Show me the Pretty Analytics"/>
</form>
-->
<!-- footer -->
<?php include("footer.php"); ?>

</body>


</html>



